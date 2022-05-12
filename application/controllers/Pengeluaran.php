<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
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
        $data['title'] = 'Pengeluaran';
        $data['pengeluaran'] = $this->Mcrud->get_all_data('tbl_outcome')->result();
        $this->template->load('layout_admin', 'admin/pengeluaran/index', $data);
    }

    public function form_pengeluaran()
    {
        $data['title'] = 'Tambah Pengeluaran';
        $this->template->load('layout_admin', 'admin/pengeluaran/form_add', $data);
    }

    public function action_pengeluaran()
    {
        $nama = $this->input->post('namaItem');
        $tanggal = $this->input->post('tanggal');
        $satuan = $this->input->post('satuan');
        $kuantitas = $this->input->post('kuantitas');
        $harga = $this->input->post('harga');

        $config['upload_path']          = './assets/admin/pengeluaran/img';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti')) {
            $this->session->set_flashdata('flash-gagal', 'Bukti foto gagal diupload');
            redirect('Pengeluaran/form_pengeluaran');
        } else {
            $bukti = $this->upload->data('file_name');

            $dataInsert = array(
                'namaItem' => $nama,
                'tglPengeluaran' => date('Y-m-d', strtotime($tanggal)),
                'qty' => $kuantitas,
                'hargaSatuan' => $harga,
                'buktiNota' => $bukti,
                'satuan' => $satuan
            );

            $this->Mcrud->insert('tbl_outcome', $dataInsert);
            $this->session->set_flashdata('flash', 'Pengeluaran berhasil ditambahkan');
            redirect('Pengeluaran');
        }
    }

    public function edit_pengeluaran($id)
    {
        $data['title'] = 'Edit Pengeluaran';
        $data['pengeluaran'] = $this->Mcrud->get_by_id('tbl_outcome', array('idPengeluaran' => $id))->row_object();
        $this->template->load('layout_admin', 'admin/pengeluaran/form_edit', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('namaItem');
        $tanggal = $this->input->post('tanggal');
        $kuantitas = $this->input->post('kuantitas');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');

        $oldBukti = $this->input->post('oldBukti');
        $newBukti = $_FILES['bukti']['name'];

        if ($newBukti) {

            if (file_exists('./assets/admin/pengeluaran/img/' . $oldBukti)) {
                unlink('./assets/admin/pengeluaran/img/' . $oldBukti);
            }

            $config['upload_path']          = './assets/admin/pengeluaran/img';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti')) {
                $this->session->set_flashdata('flash-gagal', 'Bukti gagal di upload');
                redirect('Pengeluaran/edit_pengeluaran/' . $id);
            } else {
                $bukti = $newBukti;
            }
        } else {
            $bukti = $oldBukti;
        }

        $dataUpdate = array(
            'namaItem' => $nama,
            'tglPengeluaran' => date('Y-m-d', strtotime($tanggal)),
            'qty' => $kuantitas,
            'hargaSatuan' => $harga,
            'buktiNota' => $bukti,
            'satuan' => $satuan
        );


        $this->Mcrud->update('tbl_outcome', $dataUpdate, 'idPengeluaran', $id);
        $this->session->set_flashdata('flash', 'Pengeluaran berhasil diupdate');
        redirect('Pengeluaran');
    }

    public function hapus($id)
    {

        $cek = $this->Mcrud->get_by_id('tbl_outcome', array('idPengeluaran' => $id))->row();

        if ($cek) {
            $data = $cek;
            if (file_exists('./assets/admin/pengeluaran/img/' . $data->buktiNota)) {
                unlink('./assets/admin/pengeluaran/img/' . $data->buktiNota);
            }
        }
        $this->Mcrud->delete('tbl_outcome', $id, 'idPengeluaran');
        $this->session->set_flashdata('flash', 'Pengeluaran berhasil dihapus');
        redirect('Pengeluaran');
    }
}
