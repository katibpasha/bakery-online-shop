<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $this->template->load('layout_admin', 'admin/kategori/index', $data);
    }

    public function form_kategori()
    {
        $data['title'] = 'Tambah Kategori';
        $this->template->load('layout_admin', 'admin/kategori/form_add', $data);
    }

    public function action_kategori()
    {
        $this->form_validation->set_rules('namaKategori', 'namaKategori', 'trim|required|is_unique[tbl_kategori.namaKat]', [
            'required' => 'Nama Kategori Wajib diisi',
            'is_unique' => 'Nama kategori sudah tersedia'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Kategori';
            $this->template->load('layout_admin', 'admin/kategori/form_add', $data);
        } else {
            $kat = $this->input->post('namaKategori');

            $dataInsert = array(
                'namaKat' => $kat
            );

            $this->Mcrud->insert('tbl_kategori', $dataInsert);
            $this->session->set_flashdata('flash', 'Kategori berhasil ditambahkan');
            redirect('Kategori');
        }
    }

    public function edit_kategori($id)
    {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->Mcrud->get_by_id('tbl_kategori', array('idKat' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/kategori/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('idKat');
        $this->form_validation->set_rules('namaKategori', 'namaKategori', 'trim|required|is_unique[tbl_kategori.namaKat]', [
            'required' => 'Nama Kategori Wajib diisi',
            'is_unique' => 'Nama kategori sudah tersedia'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Kategori';
            $data['kategori'] = $this->Mcrud->get_by_id('tbl_kategori', array('idKat' => $id))->row_object();
            $this->template->load('layout_admin', 'admin/kategori/form_edit', $data);
        } else {
            $kat = $this->input->post('namaKategori');

            $dataInsert = array(
                'namaKat' => $kat
            );

            $this->Mcrud->update('tbl_kategori', $dataInsert, 'idKat', $id);
            $this->session->set_flashdata('flash', 'Kategori berhasil diedit');
            redirect('Kategori');
        }
    }

    public function hapus($id)
    {
        $this->Mcrud->delete('tbl_kategori', $id, 'idKat');
        $this->session->set_flashdata('flash', 'Kategori berhasil dihapus');
        redirect('Kategori');
    }
}
