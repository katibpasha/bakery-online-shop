<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
        $this->load->model('Mcrud');
    }

    public function aksiLogin()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $pass = htmlspecialchars($this->input->post('password', true));

        $cek = $this->Mlogin->cek_login($email)->row_array();

        if ($cek) {
            if (password_verify($pass, $cek['passAdmin'])) {
                $userdata = array(
                    'idAdmin' => $cek['idAdmin'],
                    'namaAdmin' => $cek['namaAdmin'],
                    'status' => 'Online',
                    'roleAdmin' => $cek['roleAdmin'],
                    'logged_in' => true
                );
                $this->session->set_userdata($userdata);
                redirect('Adminpanel/dashboard');
            } else {
                $this->session->set_flashdata('flash', 'Login Password Gagal');
                redirect('Adminpanel');
            }
        } else {
            $this->session->set_flashdata('flash', 'Login Email Gagal');
            redirect('Adminpanel');
        }
    }

    public function aksiLoginMember()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', [
            'required' => 'Email wajib diisi',
            'valid_email' => 'Masukan Email yang valid'
        ]);

        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required' => 'Password wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign In';
            $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
            $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
            $this->template->load('layout_home', 'front-end/signin', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $pass = htmlspecialchars($this->input->post('password'));

            $cek = $this->Mlogin->login_member($email)->row_array();

            if ($cek) {

                if ($cek['statusAktif'] == 'aktif') {
                    if (password_verify($pass, $cek['password'])) {
                        $dataSession = array(
                            'idMember' => $cek['idMember'],
                            'namaKonsumen' => $cek['namaKonsumen'],
                            'email' => $cek['email'],
                            'telpon' => $cek['telpon'],
                            'alamat' => $cek['alamat'],
                            'status' => 'Online'
                        );

                        $this->session->set_userdata($dataSession);
                        redirect('Member/dashboard');
                    } else {
                        $this->session->set_flashdata('flash-gagal', 'Password Salah !!');
                        redirect('Home/signin');
                    }
                } else {
                    $this->session->set_flashdata('flash-gagal', 'Account Belum Aktif Silahkan Cek Email Anda !');
                    redirect('Home/signin');
                }
            } else {
                $this->session->set_flashdata('flash-gagal', 'Email Tidak Terdaftar');
                redirect('Home/signin');
            }
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('Adminpanel');
    }
}
