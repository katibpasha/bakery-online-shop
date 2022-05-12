<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $data['id'] = $this->Mcrud->get_all_data('tbl_identitaswebsite')->row_object();
        if (!$this->session->logged_in) {
            redirect('Adminpanel');
        }
    }

    public function index()
    {
        $data['title'] = 'Identitas Website';
        $this->template->load('layout_admin', 'admin/identitas', $data);
    }

    public function banner()
    {
        $data['title'] = 'Banner Website';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $this->template->load('layout_admin', 'admin/banner', $data);
    }

    public function form_banner()
    {
        $data['title'] = 'Tambah Banner';
        $this->template->load('layout_admin', 'admin/form_banner', $data);
    }

    public function identitas_action()
    {
        $this->form_validation->set_rules('kontak', 'kontak', 'trim|required', [
            'required' => 'Kontak toko wajib diisi'
        ]);

        $this->form_validation->set_rules('email', 'email', 'trim|required', [
            'required' => 'Email toko wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Identitas Website';
            $data['id'] = $this->Mcrud->get_all_data('tbl_identitaswebsite')->row_object();
            $this->template->load('layout_admin', 'admin/identitas', $data);
        } else {
            $id = 1;
            $kontak = $this->input->post('kontak');
            $email = $this->input->post('email');
            $fb = $this->input->post('fb');
            $ig = $this->input->post('ig');

            $config['upload_path']          = './assets/admin/banner/img';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2024; //maksimal ukuran
            $config['max_width']            = 2024; //lebar maksimal
            $config['max_height']           = 2024; //tinggi maksimal
            $config['overwrite']            = TRUE;
            $config['file_name']            = 'favicon.jpg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('favicon')) {
                $this->session->set_flashdata('flash-gagal', 'Logo gagal di upload');
                redirect('Identitas');
            } else {
                $favicon = $this->upload->data('file_name');
                $dataUpdate = array(
                    'favicon' => $favicon,
                    'contact' => $kontak,
                    'mail' => $email,
                    'fb' => $fb,
                    'instagram' => $ig
                );

                $this->Mcrud->update('tbl_identitaswebsite', $dataUpdate, 'idIDWeb', $id);
                $this->session->set_flashdata('flash', 'Identitas Website Berhasil DiUpdate, Tekan f5 untuk refresh page');
                redirect('Identitas');
            }
        }
    }

    public function banner_action()
    {
        $this->form_validation->set_rules('harga', 'harga', 'trim|required', [
            'required' => 'Harga wajib diisi'
        ]);

        $this->form_validation->set_rules('text1', 'text1', 'trim|required', [
            'required' => 'Text1 wajib diisi'
        ]);

        $this->form_validation->set_rules('text2', 'text2', 'trim|required', [
            'required' => 'Text2 wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Banner';
            $this->template->load('layout_admin', 'admin/form_banner', $data);
        } else {
            $cek = $this->Mcrud->get_all_data('tbl_banner')->num_rows();

            if ($cek > 4) {
                $this->session->set_flashdata('flash-gagal', 'Banner maksimal 5');
                redirect('Identitas/banner');
            } else {
                $text1 = $this->input->post('text1');
                $text2 = $this->input->post('text2');
                $text3 = $this->input->post('text3');
                $text4 = $this->input->post('text4');
                $harga = $this->input->post('harga');

                $config['upload_path']          = './assets/admin/banner/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5024; //maksimal ukuran
                $config['max_width']            = 2024; //lebar maksimal
                $config['max_height']           = 2024; //tinggi maksimal
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('banner')) {
                    $this->session->set_flashdata('flash-gagal', 'Banner Gagal DiUpload');
                    redirect('Identitas/form_banner');
                } else {
                    $banner = $this->upload->data('file_name');
                    $dataInsert = array(
                        'banner' => $banner,
                        'text1' => $text1,
                        'text2' => $text2,
                        'text3' => $text3,
                        'text4' => $text4,
                        'harga' => $harga
                    );

                    $this->Mcrud->insert('tbl_banner', $dataInsert);
                    $this->session->set_flashdata('flash', 'Banner berhasil ditambahkan');
                    redirect('Identitas/banner');
                }
            }
        }
    }

    public function hapus_banner($id)
    {
        $this->Mcrud->delete('tbl_banner', $id, 'idBanner');
        $this->session->set_flashdata('flash', 'Berhasil dihapus');
        redirect('Identitas/banner');
    }
}
