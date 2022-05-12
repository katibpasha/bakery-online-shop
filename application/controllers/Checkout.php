<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if (empty($this->session->userdata('namaKonsumen'))) {
            redirect('Home/signin');
        }
        if (empty($this->cart->contents())) {
            redirect('Home');
        }
    }

    private function _sendEmail($idInvoice, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'vickyir300401@gmail.com',
            'smtp_pass' => 'ngzmplqguryatvxy',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];

        $this->load->library('email', $config);
        $this->email->from('vickyir300401@gmail.com', 'Vicky Irwanto');
        $this->email->to($this->session->userdata('email'));

        if ($type == 'invoice') {
            $this->email->subject('Tagihan Invoice');
            $data['transaksi'] = $this->Mcrud->transaksi($idInvoice)->row_object();
            $data['detail'] = $this->Mcrud->detailTransaksi($idInvoice)->result();
            $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
            $data['link'] = base_url() . 'Konfirmasi/index/' . $idInvoice;
            $this->email->message($this->load->view('admin/emailTemplate/invoice', $data, true));
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function index()
    {
        $data['title'] = 'Checkout';
        $data['invoice'] = $this->Mcrud->kode_invoice();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['rekening'] = $this->Mcrud->get_all_data('tbl_rekening')->result();
        $data['ongkir'] = $this->db->query('SELECT o.idBiayaKirim, o.biaya, r.namaKurir, k.namaKota as kotaTujuan FROM tbl_ongkir o INNER JOIN tbl_kurir r ON o.idKurir=r.idKurir INNER JOIN tbl_kota k ON o.idKotaTujuan = k.idKota ')->result();
        $this->template->load('layout_home', 'front-end/checkout', $data);
    }

    public function action_checkout()
    {
        $idMember = $this->session->userdata('idMember');
        $ongkir = $this->input->post('ongkir');
        $total = substr(str_replace('.', '', $this->input->post('total')), 2);
        $alamat = $this->input->post('alamat');
        $rekening = $this->input->post('rekening');
        $idInvoice = $this->input->post('id');
        if ($ongkir == 'gagal' || $rekening == 'gagal') {
            redirect('Checkout');
        }
        $this->form_validation->set_rules('total', 'total', 'trim|required', [
            'required' => 'Harap Pilih Ongkir'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
            'required' => 'Alamat Wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Checkout';
            $data['invoice'] = $this->Mcrud->kode_invoice();
            $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
            $data['rekening'] = $this->Mcrud->get_all_data('tbl_rekening')->result();
            $data['ongkir'] = $this->db->query('SELECT o.idBiayaKirim, o.biaya, r.namaKurir, k.namaKota as kotaTujuan FROM tbl_ongkir o INNER JOIN tbl_kurir r ON o.idKurir=r.idKurir INNER JOIN tbl_kota k ON o.idKotaTujuan = k.idKota ')->result();
            $this->template->load('layout_home', 'front-end/checkout', $data);
        } else {
            $dataInput = array(
                'idTransaksi' => $idInvoice,
                'idMember' => $idMember,
                'idRekening' => $rekening,
                'idBiayaKirim' => $ongkir,
                'alamatPengiriman' => $alamat,
                'totalBelanja' => $total,
                'tglTransaksi' => date('Y-m-d'),
                'status' => 'Belum Bayar',
                'createAt' => date('Y-m-d'),
                'updateAt' => date('Y-m-d')
            );

            $this->Mcrud->insert('tbl_transaksi', $dataInput);
            foreach ($this->cart->contents() as $item) {
                $idTransaksi = $idInvoice;
                $idProduk = $item['id'];
                $qty = $item['qty'];
                $subHarga = $item['subtotal'];

                $dataInsert = array(
                    'idTransaksi' => $idTransaksi,
                    'idProduk' => $idProduk,
                    'qty' => $qty,
                    'subHarga' => $subHarga
                );

                $this->Mcrud->insert('tbl_detailtransaksi', $dataInsert);
            }
            $this->_sendEmail($idInvoice, 'invoice');
            $this->cart->destroy();
            $this->session->set_flashdata('flash', 'Invoice telah dikirimkan ke email, silahkan lakukan pembayaran');
            redirect('Member/order');
        }
    }

    public function hapus_keranjang($rowid)
    {
        if ($rowid == 'all') {
            $this->cart->destroy();
            redirect('Home/keranjang');
        } else {
            $this->cart->remove($rowid);
            redirect('Checkout');
        }
    }
}
