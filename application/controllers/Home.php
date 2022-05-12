<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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

        if ($type == 'verifikasi') {
            $this->email->subject('Verifikasi Account');
            $data['link'] = base_url() . 'Home/verifikasipassword?email=' . $this->input->post('email') . '&token=' . urlencode($token);
            $this->email->message($this->load->view('admin/emailTemplate/verify', $data, true));
        } else {
            $this->email->subject('Forgot Password');
            $data['link'] = base_url() . 'Home/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token);
            $this->email->message($this->load->view('admin/emailTemplate/forgot', $data, true));
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function index()
    {
        $data['title'] = 'Home';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['produk'] = $this->db->query('SELECT * FROM tbl_produk p INNER JOIN tbl_kategori k ON p.idKat = k.idKat ORDER BY p.idProduk DESC')->result();
        $data['terbaru'] = $this->db->query('SELECT * FROM tbl_produk p INNER JOIN tbl_kategori k ON p.idKat = k.idKat ORDER BY p.idProduk DESC LIMIT 4')->result();
        $data['review'] = $this->db->query('SELECT * FROM tbl_review r INNER JOIN tbl_member m ON r.idMember = m.idMember ORDER BY r.idReview DESC LIMIT 3')->result();
        $this->template->load('layout_home', 'front-end/home', $data);
    }

    public function detail_produk($id)
    {
        $data['title'] = 'Detail Produk';
        $data['id'] = $id;
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['produk'] = $this->Mcrud->get_by_id('tbl_produk', array('idProduk' => $id))->row_object();
        $data['testi'] = $this->Mcrud->get_by_id('tbl_testimoni', array('idProduk' => $id))->num_rows();
        $data['review'] = $this->Mcrud->jointabel($id)->result();

        $this->template->load('layout_home', 'front-end/detail_produk', $data);
    }

    public function signup()
    {
        $data['title'] = 'Sign Up';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $this->template->load('layout_home', 'front-end/signup', $data);
    }

    public function signin()
    {
        $data['title'] = 'Sign In';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $this->template->load('layout_home', 'front-end/signin', $data);
    }

    public function action_signup()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required' => 'Nama wajib diisi'
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[tbl_member.email]', [
            'required' => 'Email wajib diisi',
            'valid_email' => 'Masukan email yang valid',
            'is_unique' => 'Email telah digunakan'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'trim|required', [
            'required' => 'No Telepon wajib diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
            'required' => 'Alamat wajib diisi'
        ]);
        $this->form_validation->set_rules('password1', 'password1', 'trim|required|matches[password2]', [
            'required' => 'Password wajib diisi',
            'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'password2', 'trim|required|matches[password1]', [
            'required' => 'Confirm Password wajib diisi',
            'matches' => 'Password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign Up';
            $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
            $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
            $this->template->load('layout_home', 'front-end/signup', $data);
        } else {
            $kodeMember = $this->Mcrud->cek_kodeMember();
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $alamat = $this->input->post('alamat');
            $pass = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

            $dataInput = array(
                'idMember' => $kodeMember,
                'email' => $email,
                'password' => $pass,
                'namaKonsumen' => $nama,
                'alamat' => $alamat,
                'telpon' => $telepon,
                'statusAktif' => 'tidak'
            );
            $token = base64_encode(random_bytes(32));

            $user_token = array(
                'email' => $email,
                'token' => $token,
                'dataCreated' => time()
            );

            $this->Mcrud->insert('tbl_usertoken', $user_token);
            $this->Mcrud->insert('tbl_member', $dataInput);
            $this->session->set_flashdata('flash', 'Registrasi Berhasil, Silahkan cek Email untuk Aktivasi !!!');
            $this->_sendEmail($token, 'verifikasi');
            redirect('Home/signin');
        }
    }

    public function verifikasipassword()
    {
        $token = $this->input->get('token');
        $email = $this->input->get('email');

        $cek = $this->Mcrud->get_by_id('tbl_member', array('email' => $email))->row_array();

        if ($cek) {
            $user_token = $this->Mcrud->get_by_id('tbl_usertoken', array('token' => $token))->row_array();
            if ($user_token) {
                $set = 'aktif';
                $this->db->set('statusAktif', $set);
                $this->db->where('email', $email);
                $this->db->update('tbl_member');
                $this->session->set_flashdata('flash', 'Akun telah aktif, Silahkan Login !');
                redirect('Home/signin');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Token Tidak Terdaftar');
                redirect('Home/signup');
            }
        } else {
            $this->session->set_flashdata('flash-gagal', 'Email Tidak Terdaftar');
            redirect('Home/signup');
        }
    }

    public function keranjang()
    {
        if (empty($this->session->userdata('username'))) {
            $this->session->set_flashdata('gagal', 'Login untuk menambahkan produk ke keranjang');
            redirect('Home');
        }

        $data['title'] = 'Keranjang Belanja';
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $this->template->load('front-end/layout_home', 'front-end/keranjang', $data);
    }

    public function tambah_keranjang($id, $qty)
    {
        if (empty($this->session->userdata('namaKonsumen'))) {
            redirect('Home/signin');
        }

        if ($this->input->post('qty') > 1) {
            $qty = $this->input->post('qty');
        }

        $data = $this->Mcrud->find($id);

        $data = array(
            'id'      => $data->idProduk,
            'qty'     => $qty,
            'price'   => $data->harga - $data->diskon,
            'name'    => $data->namaProduk,
            'foto'    => $data->foto,
        );

        $this->cart->insert($data);
        $this->session->set_flashdata('flash', 'Produk telah ditambahkan ke keranjang');
        redirect('Home');
    }

    public function hapus_keranjang($rowid)
    {
        if ($rowid == 'all') {
            $this->cart->destroy();
            redirect('Home/keranjang');
        } else {
            $this->cart->remove($rowid);
            redirect('Home/keranjang');
        }
    }

    public function forgot()
    {
        $data['title'] = 'Forgot Password';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $this->template->load('layout_home', 'front-end/forgotpassword', $data);
    }

    public function action_forgot()
    {
        $email = $this->input->post('email', TRUE);
        $cek = $this->db->get_where('tbl_member', array('email' => $email))->row_array();

        if ($cek) {
            $token = base64_encode(random_bytes(32));

            $user_token = array(
                'email' => $email,
                'token' => $token,
                'dataCreated' => time()
            );

            $this->Mcrud->insert('tbl_usertoken', $user_token);
            $this->_sendEmail($token, 'forgot');
            $this->session->set_flashdata('flash', 'Link reset password telah di kirimkan ke email anda');
            redirect('Home/forgot');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Email tidak terdaftar');
            redirect('Home/forgot');
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $cek = $this->db->get_where('tbl_member', array('email' => $email))->row_array();

        if ($cek) {
            $user_token = $this->db->get_where('tbl_usertoken', array('token' => $token))->row_array();

            if ($user_token) {
                $this->session->set_userdata('member_email', $email);
                $data['title'] = 'Change Password';
                $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
                $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
                $this->template->load('layout_home', 'front-end/resetpassword', $data);
            } else {
                $this->session->set_flashdata('flash-gagal;', 'Token Invalid !!');
                redirect('Adminpanel');
            }
        } else {
            $this->session->set_flashdata('flash-gagal', 'Reset password failed !, wrong email');
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
            $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
            $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
            $this->template->load('layout_home', 'front-end/resetpassword', $data);
        } else {
            $pass = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('member_email');

            $this->db->set('password', $pass);
            $this->db->where('email', $email);
            $this->db->update('tbl_member');

            $this->session->unset_userdata('member_email');
            $this->session->set_flashdata('flash', 'Password berhasil direset');
            redirect('Home/signin');
        }
    }
}
