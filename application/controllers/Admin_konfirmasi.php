<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_konfirmasi extends CI_Controller
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
        $data['title'] = 'Manajemen Invoice';
        $data['transaksi'] = $this->db->query('SELECT * FROM tbl_transaksi t INNER JOIN tbl_rekening r ON t.idRekening=r.id INNER JOIN tbl_member m ON t.idMember = m.idMember ORDER BY t.tglTransaksi DESC')->result();
        $this->template->load('layout_admin', 'admin/invoice/index', $data);
    }

    public function detail_konfirmasi($invoice)
    {
        $data['title'] = 'Detail Konfirmasi';
        $data['konfirmasi'] = $this->Mcrud->get_by_id('tbl_konfirmasi', array('idTransaksi' => $invoice))->row_object();
        $this->template->load('layout_admin', 'admin/invoice/detail', $data);
    }

    public function terima($id)
    {
        $cek = $this->Mcrud->get_by_id('tbl_detailtransaksi', array('idTransaksi' => $id))->result();

        foreach ($cek as $item) {
            $ambilProduk = $this->Mcrud->get_by_id('tbl_produk', array('idProduk' => $item->idProduk))->row_array();
            $dinamisqty = $ambilProduk['stok'] - $item->qty;
            $this->db->set('stok', $dinamisqty);
            $this->db->where('idProduk', $item->idProduk);
            $this->db->update('tbl_produk');
        }

        $this->db->set('status', 'Dikirim');
        $this->db->where('idTransaksi', $id);
        $this->db->update('tbl_transaksi');

        $this->db->set('validasi', 'Valid');
        $this->db->where('idTransaksi', $id);
        $this->db->update('tbl_konfirmasi');

        $this->session->set_flashdata('flash', 'Bukti Transfer Diterima silahkan kemas dan kirim barang !');
        redirect('Admin_konfirmasi');
    }

    public function tolak($id)
    {
        $this->db->set('status', 'Ditolak');
        $this->db->where('idTransaksi', $id);
        $this->db->update('tbl_transaksi');

        $this->session->set_flashdata('flash', 'Bukti Transfer Berhasil Ditolak');
        redirect('Admin_konfirmasi');
    }


    public function hapus($id)
    {
        $this->Mcrud->delete('tbl_transaksi', $id, 'idTransaksi');
        $this->session->set_flashdata('flash', 'Data Invoice berhasil dihapus');
        redirect('Admin_konfirmasi');
    }
}
