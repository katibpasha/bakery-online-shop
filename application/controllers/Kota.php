<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
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
        $data['title'] = 'Kota';
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_admin', 'admin/kota/index', $data);
    }

    public function form_kota()
    {
        $data['title'] = 'Tambah Kota';
        $this->template->load('layout_admin', 'admin/kota/form_add', $data);
    }

    public function action_kota()
    {
        $this->form_validation->set_rules('namaKota', 'namaKota', 'trim|required|is_unique[tbl_kota.namaKota]', [
            'required' => 'Nama Kota Wajib diisi',
            'is_unique' => 'Nama Kota sudah tersedia'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Kota';
            $this->template->load('layout_admin', 'admin/kota/form_add', $data);
        } else {
            $kota = $this->input->post('namaKota');

            $dataInsert = array(
                'namaKota' => $kota
            );

            $this->Mcrud->insert('tbl_kota', $dataInsert);
            $this->session->set_flashdata('flash', 'Kota berhasil ditambahkan');
            redirect('Kota');
        }
    }

    public function edit_kota($id)
    {
        $data['title'] = 'Edit Kota';
        $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', array('idKota' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/kota/form_edit', $data);
    }

    public function action_edit()
    {
        $id = $this->input->post('idKota');
        $this->form_validation->set_rules('namaKota', 'namaKota', 'trim|required|is_unique[tbl_kota.namaKota]', [
            'required' => 'Nama Kota Wajib diisi',
            'is_unique' => 'Nama Kota sudah tersedia'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Kota';
            $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', array('idKota' => $id))->row_object();
            $this->template->load('layout_admin', 'admin/kota/form_edit', $data);
        } else {
            $kota = $this->input->post('namaKota');

            $dataInsert = array(
                'namaKota' => $kota
            );

            $this->Mcrud->update('tbl_kota', $dataInsert, 'idKota', $id);
            $this->session->set_flashdata('flash', 'Kota berhasil diedit');
            redirect('Kota');
        }
    }

    public function hapus($id)
    {
        $this->Mcrud->delete('tbl_kota', $id, 'idKota');
        $this->session->set_flashdata('flash', 'Kota berhasil dihapus');
        redirect('Kota');
    }
}
