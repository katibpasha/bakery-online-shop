<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if (empty($this->session->userdata('namaKonsumen'))) {
            redirect('Home/signin');
        }
    }

    public function index($idInvoice)
    {
        $data['title'] = 'Konfirmasi Pembayaran';
        $data['invoice'] = $idInvoice;
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
        $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
        $this->template->load('layout_home', 'front-end/konfirmasi', $data);
    }

    public function action_konfirmasi()
    {
        $invoice = $this->input->post('id');

        $config['upload_path']          = './assets/front-end/konfirmasi/img';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 15024; //maksimal ukuran
        $config['overwrite']            = TRUE;
        $config['file_name']            = date('d-m-Y') . $invoice . ".jpg";

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bayar')) {
            $this->session->set_flashdata('flash-gagal', 'Foto gagal di upload');
            redirect('Konfirmasi/index/' . $invoice);
        } else {
            $foto = $this->upload->data('file_name');
            $dataInput = array(
                'idTransaksi' => $invoice,
                'buktiTransfer' => $foto,
                'validasi' => 'Reject'
            );
            $cek = $this->Mcrud->get_by_id('tbl_konfirmasi', array('idTransaksi' => $invoice))->row_array();

            if ($cek) {
                $this->Mcrud->update('tbl_konfirmasi', $dataInput, 'idTransaksi', $invoice);
            } else {
                $this->Mcrud->insert('tbl_konfirmasi', $dataInput);
            }

            $this->db->set('status', 'Dalam Pengecekan');
            $this->db->where('idTransaksi', $invoice);
            $this->db->update('tbl_transaksi');
            $this->session->set_flashdata('flash', 'Data Konfirmasi Berhasil Di Upload');
            redirect('Member/detail_order/' . $invoice);
        }
    }

    public function batalkan($invoice)
    {
        $this->db->set('status', 'Dibatalkan');
        $this->db->where('idTransaksi', $invoice);
        $this->db->update('tbl_transaksi');
        $this->session->set_flashdata('flash', 'Transaksi Dibatalkan');
        redirect('Member/detail_order/' . $invoice);
    }
}
