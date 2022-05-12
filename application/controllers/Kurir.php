<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
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
        $data['title'] = 'Kurir';
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/kurir/index', $data);
    }

    public function form_kurir()
    {
        $data['title'] = 'Tambah Agen Kurir';
        $this->template->load('layout_admin', 'admin/kurir/form_add', $data);
    }

    public function action_kurir()
    {
        $this->form_validation->set_rules('namaKurir', 'namaKurir', 'trim|required|is_unique[tbl_kurir.namaKurir]', [
            'required' => 'Nama Agen Kurir Wajib diisi',
            'is_unique' => 'Nama Agen Kurir sudah tersedia'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Agen Kurir';
            $this->template->load('layout_admin', 'admin/kurir/form_add', $data);
        } else {
            $kurir = $this->input->post('namaKurir');

            $dataInsert = array(
                'namaKurir' => $kurir
            );

            $this->Mcrud->insert('tbl_kurir', $dataInsert);
            $this->session->set_flashdata('flash', 'Agen Kurir berhasil ditambahkan');
            redirect('Kurir');
        }
    }

    public function edit_kurir($id)
    {
        $data['title'] = 'Edit Agen Kurir';
        $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', array('idKurir' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/kurir/form_edit', $data);
    }

    public function action_edit()
    {
        $id = $this->input->post('idKurir');
        $this->form_validation->set_rules('namaKurir', 'namaKurir', 'trim|required|is_unique[tbl_kurir.namaKurir]', [
            'required' => 'Nama Agen Kurir Wajib diisi',
            'is_unique' => 'Nama Agen Kurir sudah tersedia'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Agen Kurir';
            $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', array('idKurir' => $id))->row_object();
            $this->template->load('layout_admin', 'admin/kurir/form_edit', $data);
        } else {
            $kurir = $this->input->post('namaKurir');

            $dataInsert = array(
                'namaKurir' => $kurir
            );

            $this->Mcrud->update('tbl_kurir', $dataInsert, 'idKurir', $id);
            $this->session->set_flashdata('flash', 'Agen Kurir berhasil diedit');
            redirect('Kurir');
        }
    }

    public function hapus($id)
    {
        $this->Mcrud->delete('tbl_kurir', $id, 'idKurir');
        $this->session->set_flashdata('flash', 'Agen Kurir berhasil dihapus');
        redirect('Kurir');
    }
}
