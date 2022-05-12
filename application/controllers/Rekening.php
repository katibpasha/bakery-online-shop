<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Rekening extends CI_Controller
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
        $data['title'] = 'Rekening';
        $data['rekening'] = $this->Mcrud->get_all_data('tbl_rekening')->result();
        $this->template->load('layout_admin', 'admin/rekening/index', $data);
    }

    public function form_rekening()
    {
        $data['title'] = 'Tambah Rekening';
        $this->template->load('layout_admin', 'admin/rekening/form_add', $data);
    }

    public function action_rekening()
    {
        $no = $this->input->post('noRekening');
        $nama = $this->input->post('nama');
        $bank = $this->input->post('bank');

        $dataInsert = array(
            'noRekening' => $no,
            'namaRekening' => $nama,
            'bank' => $bank
        );

        $this->Mcrud->insert('tbl_rekening', $dataInsert);
        $this->session->set_flashdata('flash', 'Rekening berhasil ditambahkan');
        redirect('Rekening');
    }

    public function edit_rekening($id)
    {
        $data['title'] = 'Edit Rekening';
        $data['rekening'] = $this->Mcrud->get_by_id('tbl_rekening', array('id' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/rekening/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $no = $this->input->post('noRekening');
        $nama = $this->input->post('nama');
        $bank = $this->input->post('bank');

        $dataUpdate = array(
            'noRekening' => $no,
            'namaRekening' => $nama,
            'bank' => $bank
        );

        $this->Mcrud->update('tbl_rekening', $dataUpdate, 'id', $id);
        $this->session->set_flashdata('flash', 'Rekening berhasil diupdate');
        redirect('Rekening');
    }

    public function hapus($id)
    {
        $this->Mcrud->delete('tbl_rekening', $id, 'id');
        $this->session->set_flashdata('flash', 'Rekening berhasil dihapus');
        redirect('Rekening');
    }
}
