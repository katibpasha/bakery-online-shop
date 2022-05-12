<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if (!$this->session->logged_in) {
            redirect('Adminpanel');
        }
        if ($this->session->userdata('roleAdmin') == '2') {
            $this->session->set_flashdata('flash-user', 'Hanya Owner atau admin utama yang bisa mengakses menu user');
            redirect('Adminpanel/dashboard');
        }
    }

    public function index()
    {
        $data['title'] = 'User Admin';
        $data['admin'] = $this->db->get_where('tbl_admin', array('roleAdmin' => '2'))->result();
        $this->template->load('layout_admin', 'admin/user/index', $data);
    }

    public function form_user()
    {
        $data['title'] = 'Tambah User';
        $this->template->load('layout_admin', 'admin/user/form_add', $data);
    }

    public function action_user()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required' => 'Nama wajib diisi'
        ]);

        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[tbl_admin.emailAdmin]|valid_email', [
            'required' => 'Email wajib diisi',
            'is_unique' => 'Email yang anda masukan sudah tersedia',
            'valid_email' => 'Gunakan email valid'
        ]);

        $this->form_validation->set_rules('password', 'password', 'trim|required|matches[password2]', [
            'required' => 'Password wajib diisi',
            'matches' => 'Password yang anda masukan tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'password2', 'trim|required|matches[password]', [
            'required' => 'Confirm Password wajib diisi',
            'matches' => 'Password yang anda masukan tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah User';
            $this->template->load('layout_admin', 'admin/user/form_add', $data);
        } else {
            $nama = $this->input->post('nama', TRUE);
            $email = $this->input->post('email', TRUE);
            $pass =  password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT);
            $role = $this->input->post('level', TRUE);

            $dataInsert = array(
                'emailAdmin' => $email,
                'passAdmin' => $pass,
                'namaAdmin' => $nama,
                'roleAdmin' => $role
            );

            $this->Mcrud->insert('tbl_admin', $dataInsert);
            $this->session->set_flashdata('flash', 'User Admin berhasil ditambahkan');
            redirect('User');
        }
    }

    public function edit_user($id)
    {
        $data['title'] = 'Edit User Admin';
        $data['user'] = $this->Mcrud->get_by_id('tbl_admin', array('idAdmin' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/user/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
            'required' => 'Nama wajib diisi'
        ]);

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', [
            'required' => 'Email wajib diisi',
            'valid_email' => 'Gunakan email valid'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit User Admin';
            $data['user'] = $this->Mcrud->get_by_id('tbl_admin', array('idAdmin' => $id))->row_object();
            $this->template->load('layout_admin', 'admin/user/form_edit', $data);
        } else {
            $nama = $this->input->post('nama', TRUE);
            $pass = $this->input->post('pass');
            $email = $this->input->post('email', TRUE);
            $role = $this->input->post('level', TRUE);

            $dataUpdate = array(
                'emailAdmin' => $email,
                'passAdmin' => $pass,
                'namaAdmin' => $nama,
                'roleAdmin' => $role
            );

            $this->Mcrud->update('tbl_admin', $dataUpdate, 'idAdmin', $id);
            $this->session->set_flashdata('flash', 'User Admin berhasil ditambahkan');
            redirect('User');
        }
    }

    public function hapus($id)
    {
        $this->Mcrud->delete('tbl_admin', $id, 'idAdmin');
        $this->session->set_flashdata('flash', 'User Admin berhasil dihapus');
        redirect('User');
    }
}
