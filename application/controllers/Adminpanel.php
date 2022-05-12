<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'vickyir300401@gmail.com',
            'smtp_pass' => 'ngzmplqguryatvxy',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];



        $this->load->library('email', $config);
        $this->email->from('vickyir300401@gmail.com', 'Vicky Irwanto');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Forgot Password');
            $data['link'] = base_url() . 'Adminpanel/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token);
            $this->email->message($this->load->view('admin/emailTemplate/forgot', $data, true));
        }



        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function dashboard()
    {
        if (empty($this->session->userdata('namaAdmin'))) {
            redirect('Adminpanel');
        }

        $data['title'] = 'Dashboard';
        $this->template->load('layout_admin', 'admin/dashboard', $data);
    }

    public function index()
    {
        $data['title'] = 'Login Admin';
        $this->template->load('layout_auth', 'admin/login', $data);
    }

    public function profile()
    {
        if (empty($this->session->userdata('namaAdmin'))) {
            redirect('Adminpanel');
        }

        $id = $this->session->userdata('idAdmin');
        $data['title'] = 'Profile';
        $data['user'] = $this->Mcrud->get_by_id('tbl_admin', array('idAdmin' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/profile', $data);
    }

    public function update_profile()
    {
        $id = $this->session->userdata('idAdmin');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role = $this->input->post('role');

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', [
            'required' => 'Email wajib diisi',
            'valid_email' => 'Isikan dengan email yang valid',
        ]);

        if ($this->form_validation->run() == false) {
            $id = $this->session->userdata('idAdmin');
            $data['title'] = 'Profile';
            $data['user'] = $this->Mcrud->get_by_id('tbl_admin', array('idAdmin' => $id))->row_object();
            $this->template->load('layout_admin', 'admin/profile', $data);
        } else {
            $dataUpdate = array(
                'emailAdmin' => $email,
                'passAdmin' => $password,
                'namaAdmin' => $nama,
                'roleAdmin' => $role
            );

            $this->Mcrud->update('tbl_admin', $dataUpdate, 'idAdmin', $id);
            $this->session->set_userdata(array('namaAdmin' => $nama));
            $this->session->set_flashdata('flash', 'Admin berhasil diupdate');
            redirect('Adminpanel/profile');
        }
    }

    public function forgot_password()
    {
        $data['title'] = 'Forgot Password';
        $this->template->load('layout_auth', 'admin/forgot_password', $data);
    }

    public function action_forgot()
    {
        $email = $this->input->post('email', TRUE);
        $cek = $this->db->get_where('tbl_admin', array('emailAdmin' => $email))->row_array();

        if ($cek) {
            $token = base64_encode(random_bytes(32));

            $user_token = array(
                'email' => $email,
                'token' => $token,
                'dataCreated' => time()
            );

            $this->Mcrud->insert('tbl_usertoken', $user_token);
            $this->_sendEmail($token, 'forgot');
            $this->session->set_flashdata('flash-success', 'Link reset password telah di kirimkan ke email anda');
            redirect('Adminpanel/forgot_password');
        } else {
            $this->session->set_flashdata('flash', 'Email tidak terdaftar');
            redirect('Adminpanel/forgot_password');
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $cek = $this->db->get_where('tbl_admin', array('emailAdmin' => $email))->row_array();

        if ($cek) {
            $user_token = $this->db->get_where('tbl_usertoken', array('token' => $token))->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $data['title'] = 'Change Password';
                $this->template->load('layout_auth', 'admin/resetpassword', $data);
            } else {
                $this->session->set_flashdata('flash', 'Token Invalid !!');
                redirect('Adminpanel');
            }
        } else {
            $this->session->set_flashdata('flash', 'Reset password failed !, wrong email');
            redirect('Adminpanel');
        }
    }

    public function changePassword()
    {
        $this->form_validation->set_rules('pass1', 'pass1', 'trim|required|min_length[5]|matches[pass2]', [
            'required' => 'Password wajib diisi',
            'min_length' => 'Panjang password min 5 character atau angka',
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('pass2', 'pass2', 'trim|required|min_length[5]|matches[pass1]', [
            'required' => 'Password wajib diisi',
            'min_length' => 'Panjang password min 5 character atau angka',
            'matches' => 'Password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->template->load('layout_auth', 'admin/resetpassword', $data);
        } else {
            $pass = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('passAdmin', $pass);
            $this->db->where('emailAdmin', $email);
            $this->db->update('tbl_admin');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('flash-success', 'Password berhasil direset');
            redirect('Adminpanel');
        }
    }
}
