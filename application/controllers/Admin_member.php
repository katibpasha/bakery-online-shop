<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if (!$this->session->logged_in) {
            redirect('Adminpanel');
        }
    }

    public function index()
    {
        $data['title'] = 'Member List';
        $data['member'] = $this->Mcrud->get_all_data('tbl_member')->result();
        $this->template->load('layout_admin', 'admin/member/index', $data);
    }

    public function activated($id)
    {
        $this->db->set('statusAktif', 'aktif');
        $this->db->where('idMember', $id);
        $this->db->update('tbl_member');

        $this->session->set_flashdata('flash', 'Member berhasil diaktifkan');
        redirect('Admin_member');
    }

    public function deactivated($id)
    {
        $this->db->set('statusAktif', 'tidak');
        $this->db->where('idMember', $id);
        $this->db->update('tbl_member');

        $this->session->set_flashdata('flash', 'Member berhasil dinonaktifkan');
        redirect('Admin_member');
    }

    public function hapus($id)
    {
        $dataId = array('idMember' => $id);


        $this->Mcrud->delete('tbl_member', $id, 'idMember');
        $this->session->set_flashdata('flash', 'Akun member berhasil dihapus');
        redirect('Admin_member');
    }
}
