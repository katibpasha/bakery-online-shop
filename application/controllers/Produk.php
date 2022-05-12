<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
        $data['title'] = 'Produk';
        $data['produk'] = $this->db->query('SELECT * FROM tbl_produk p INNER JOIN tbl_kategori k ON p.idKat = k.idKat ORDER BY p.idProduk ASC')->result();
        $this->template->load('layout_admin', 'admin/produk/index', $data);
    }

    public function form_produk()
    {
        $data['kode_barang'] = $this->Mcrud->cek_kodeBarang();
        $data['title'] = 'Tambah Produk';
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $this->template->load('layout_admin', 'admin/produk/form_add', $data);
    }

    public function action_produk()
    {
        $idProduk = $this->input->post('idProduk');
        $kategori = $this->input->post('kategori');
        $namaProduk = $this->input->post('namaProduk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $berat = $this->input->post('berat');
        $diskon = $this->input->post('diskon');
        $deskripsi = $this->input->post('deskripsi');

        $config['upload_path']          = './assets/admin/produk/img';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 15024; //maksimal ukuran

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fotoProduk')) {
            $this->session->set_flashdata('flash-gagal', 'Foto gagal di upload');
            redirect('Produk/form_produk');
        } else {
            $foto = $this->upload->data('file_name');

            $dataInsert = array(
                'idProduk' => $idProduk,
                'idKat' => $kategori,
                'namaProduk' => $namaProduk,
                'foto' => $foto,
                'harga' => $harga,
                'stok' => $stok,
                'berat' => $berat,
                'diskon' => $diskon,
                'deskripsiProduk' => $deskripsi
            );

            $this->Mcrud->insert('tbl_produk', $dataInsert);
            $this->session->set_flashdata('flash', 'Produk berhasil ditambahkan');
            redirect('Produk');
        }
    }

    public function edit_produk($id)
    {
        $dataEdit = array('idProduk' => $id);
        $data['title'] = 'Edit Produk';
        $data['produk'] = $this->Mcrud->get_by_id('tbl_produk', $dataEdit)->row_object();
        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $this->template->load('layout_admin', 'admin/produk/form_edit', $data);
    }

    public function edit()
    {
        $idProduk = $this->input->post('idProduk');
        $kategori = $this->input->post('kategori');
        $namaProduk = $this->input->post('namaProduk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $berat = $this->input->post('berat');
        $diskon = $this->input->post('diskon');
        $deskripsi = $this->input->post('deskripsi');

        $oldFoto = $this->input->post('oldProduk');
        $newFoto = $_FILES['fotoProduk']['name'];

        if ($newFoto == TRUE) {

            $config['upload_path']          = './assets/admin/produk/img';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 15024; //maksimal ukuran

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fotoProduk')) {
                $this->session->set_flashdata('flash-gagal', 'Foto gagal di upload');
                redirect('Produk/edit_produk/' . $idProduk);
            } else {
                $foto = $newFoto;
                if (file_exists('./assets/admin/produk/img/' . $oldFoto)) {
                    unlink('./assets/admin/produk/img/' . $oldFoto);
                }
            }
        } else {
            $foto = $oldFoto;
        }
        $dataInsert = array(
            'idProduk' => $idProduk,
            'idKat' => $kategori,
            'namaProduk' => $namaProduk,
            'foto' => $foto,
            'harga' => $harga,
            'stok' => $stok,
            'berat' => $berat,
            'diskon' => $diskon,
            'deskripsiProduk' => $deskripsi
        );

        $this->Mcrud->update('tbl_produk', $dataInsert, 'idProduk', $idProduk);
        $this->session->set_flashdata('flash', 'Produk berhasil diupdate');
        redirect('Produk');
    }

    public function hapus($id)
    {
        $dataId = array('idProduk' => $id);
        $image = $this->Mcrud->get_by_id('tbl_produk', $dataId)->row();

        if ($image) {
            $data = $image;
            if (file_exists('./assets/admin/produk/img/' . $data->foto)) {
                unlink('./assets/admin/produk/img/' . $data->foto);
            }
            $this->Mcrud->delete('tbl_produk', $id, 'idProduk');
            $this->session->set_flashdata('flash', 'Produk berhasil dihapus');
            redirect('Produk');
        }
    }
}
