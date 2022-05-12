<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir extends CI_Controller
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
        $data['title'] = 'Ongkir';
        $data['ongkir'] = $this->db->query('SELECT * FROM tbl_ongkir o INNER JOIN tbl_kota ka on o.idKotaTujuan=ka.idKota INNER JOIN tbl_kurir k on o.idKurir=k.idKurir ')->result();
        $this->template->load('layout_admin', 'admin/ongkir/index', $data);
    }

    public function form_ongkir()
    {
        $data['title'] = 'Tambah Ongkir';
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_admin', 'admin/ongkir/form_add', $data);
    }

    public function action_ongkir()
    {
        $kurir = $this->input->post('kurir');
        $kota = $this->input->post('kota');
        $biaya = $this->input->post('biaya');

        $dataInsert = array(
            'idKurir' => $kurir,
            'idKotaTujuan' => $kota,
            'biaya' => $biaya
        );

        $this->Mcrud->insert('tbl_ongkir', $dataInsert);
        $this->session->set_flashdata('flash', 'Ongkir berhasil ditambahkan');
        redirect('Ongkir');
    }

    public function edit_ongkir($id)
    {
        $data['title'] = 'Edit Ongkir';
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $data['ongkir'] = $this->Mcrud->get_by_id('tbl_ongkir', array('idBiayaKirim' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/ongkir/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('idOngkir');
        $kurir = $this->input->post('kurir');
        $kota = $this->input->post('kota');
        $biaya = $this->input->post('biaya');

        $dataUpdate = array(
            'idKurir' => $kurir,
            'idKotaTujuan' => $kota,
            'biaya' => $biaya
        );

        $this->Mcrud->update('tbl_ongkir', $dataUpdate, 'idBiayaKirim', $id);
        $this->session->set_flashdata('flash', 'Ongkir berhasil diedit');
        redirect('Ongkir');
    }

    public function hapus($id)
    {
        $this->Mcrud->delete('tbl_ongkir', $id, 'idBiayaKirim');
        $this->session->set_flashdata('flash', 'Ongkir berhasil dihapus');
        redirect('Ongkir');
    }
}
