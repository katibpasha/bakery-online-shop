<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if (empty($this->session->userdata('namaKonsumen'))) {
            redirect('Home/signin');
        }
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard Member';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
        $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
        $this->template->load('layout_home', 'front-end/dashboard', $data);
    }

    public function order()
    {
        $id = $this->session->userdata('idMember');
        $config['base_url'] = site_url('Member/order');
        $config['total_rows'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $id))->num_rows();
        $config['per_page'] = 3;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<div class="u-s-p-y-60"><ul class="shop-p__pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['next_tag_link'] = '<span class="fas fa-angle-right"></span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_link'] = '<span class="fas fa-angle-right"></span>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="is-active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_tag_link'] = 'Last';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_link'] = 'First';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['display'] = false;
        $this->pagination->initialize($config);
        $mulai = $this->uri->segment(3);
        $data['title'] = 'Order';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $id))->num_rows();
        $data['transaksi'] = $this->Mcrud->getOrder($id, $config['per_page'], $mulai)->result();
        $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $id, 'status' => 'Dibatalkan'))->num_rows();
        $this->template->load('layout_home', 'front-end/orders', $data);
    }

    public function my_wishlist()
    {
        $id = $this->session->userdata('idMember');
        $data['title'] = 'Wishlist';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->wishlist($id)->result();
        $this->template->load('layout_home', 'front-end/wishlist', $data);
    }

    public function wishlist($id)
    {
        $idProduk = $id;
        $idMember = $this->session->userdata('idMember');
        $date = date('Y-m-d');

        $dataInsert = array(
            'idMember' => $idMember,
            'idProduk' => $idProduk,
            'tanggal' => $date
        );

        $cek = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $idMember, 'idProduk' => $idProduk))->row_array();

        if ($cek) {
            $this->session->set_flashdata('flash-gagal', 'Produk sudah di tambahkan ke wishlist');
            redirect('Home');
        } else {
            $this->Mcrud->insert('tbl_wishlist', $dataInsert);
            $this->session->set_flashdata('flash', 'Produk berhasil di tambahkan ke wishlist');
            redirect('Home');
        }
    }

    public function testimoni()
    {
        $idMember = $this->session->userdata('idMember');
        $testi = $this->input->post('testi');

        $dataInsert = array(
            'idMember' => $idMember,
            'Review' => $testi
        );

        $this->Mcrud->insert('tbl_review', $dataInsert);
        $this->session->set_flashdata('flash', 'Testimonials berhasil di tambahkan');
        redirect('Home');
    }

    public function review($id)
    {
        $idMember = $this->session->userdata('idMember');
        $testi = $this->input->post('testi');

        $dataInsert = array(
            'idProduk' => $id,
            'idMember' => $idMember,
            'testi' => $testi
        );

        $this->Mcrud->insert('tbl_testimoni', $dataInsert);
        $this->session->set_flashdata('flash', 'Review berhasil di tambahkan');
        redirect('Home/detail_produk/' . $id);
    }

    public function edit_profile($id)
    {
        $data['title'] = 'Edit Profile Member';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
        $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
        $data['member'] = $this->Mcrud->get_by_id('tbl_member', array('idMember' => $id))->row_object();
        $this->template->load('layout_home', 'front-end/edit_profile', $data);
    }

    public function edit_email($id)
    {
        $data['title'] = 'Edit Profile Member';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
        $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
        $data['member'] = $this->Mcrud->get_by_id('tbl_member', array('idMember' => $id))->row_object();
        $this->template->load('layout_home', 'front-end/edit_email', $data);
    }

    public function edit_password($id)
    {
        $data['title'] = 'Edit Email Member';
        $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
        $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
        $data['member'] = $this->Mcrud->get_by_id('tbl_member', array('idMember' => $id))->row_object();
        $this->template->load('layout_home', 'front-end/edit_password', $data);
    }

    public function action_edit($type)
    {
        $id = $this->input->post('id');

        if ($type == 'profile') {
            $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
                'required' => 'Nama Lengkap wajib diisi'
            ]);
            $this->form_validation->set_rules('telpon', 'telpon', 'trim|required', [
                'required' => 'No Hp wajib diisi'
            ]);
            $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
                'required' => 'Alamat wajib diisi'
            ]);
        } else if ($type == 'email') {
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[tbl_member.email]', [
                'required' => 'Email wajib diisi',
                'valid_email' => 'Masukan email yang valid',
                'is_unique' => 'Email sudah digunakan'
            ]);
        } else {
            $this->form_validation->set_rules('pass1', 'pass1', 'trim|required|matches[pass2]', [
                'required' => 'Password wajib diisi',
                'matches' => 'Password tidak sama',
            ]);
            $this->form_validation->set_rules('pass2', 'pass2', 'trim|required|matches[pass1]', [
                'required' => 'Confirm Password wajib diisi',
                'matches' => 'Password tidak sama',
            ]);
        }

        if ($this->form_validation->run() == false) {
            if ($type == 'profile') {
                $data['title'] = 'Edit Profile Member';
                $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
                $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
                $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
                $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
                $data['member'] = $this->Mcrud->get_by_id('tbl_member', array('idMember' => $id))->row_object();
                $this->template->load('layout_home', 'front-end/edit_profile', $data);
            } else if ($type == 'email') {
                $data['title'] = 'Edit Email Member';
                $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
                $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
                $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
                $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
                $data['member'] = $this->Mcrud->get_by_id('tbl_member', array('idMember' => $id))->row_object();
                $this->template->load('layout_home', 'front-end/edit_email', $data);
            } else {
                $data['title'] = 'Edit Email Member';
                $data['banner'] = $this->Mcrud->get_all_data('tbl_banner')->result();
                $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
                $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $this->session->userdata('idMember')))->num_rows();
                $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $this->session->userdata('idMember'), 'status' => 'Dibatalkan'))->num_rows();
                $data['member'] = $this->Mcrud->get_by_id('tbl_member', array('idMember' => $id))->row_object();
                $this->template->load('layout_home', 'front-end/edit_password', $data);
            }
        } else {

            if ($type == 'profile') {
                $nama = $this->input->post('nama');
                $telpon = $this->input->post('telpon');
                $alamat = $this->input->post('alamat');

                $this->db->set('namaKonsumen', $nama);
                $this->db->set('alamat', $alamat);
                $this->db->set('telpon', $telpon);
                $this->db->where('idMember', $id);
                $this->db->update('tbl_member');

                $dataUpdateSession = array(
                    'namaKonsumen' => $nama,
                    'alamat' => $alamat,
                    'telpon' => $telpon
                );

                $this->session->set_userdata($dataUpdateSession);
                $this->session->set_flashdata('flash', 'Profil berhasil diedit');
                redirect('Member/dashboard');
            } else if ($type == 'email') {
                $email = $this->input->post('email');

                $this->db->set('email', $email);
                $this->db->where('idMember', $id);
                $this->db->update('tbl_member');
                $this->session->set_userdata('email', $email);
                $this->session->set_flashdata('flash', 'Email berhasil diedit');
                redirect('Member/dashboard');
            } else {
                $pass = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
                $this->db->set('password', $pass);
                $this->db->where('idMember', $id);
                $this->db->update('tbl_member');
                $this->session->set_flashdata('flash', 'Password berhasil diedit');
                redirect('Member/dashboard');
            }
        }
    }

    public function detail_order($idInvoice)
    {
        $id = $this->session->userdata('idMember');
        $data['title'] = 'Detail Order';
        $data['identitas'] = $this->Mcrud->get_by_id('tbl_identitaswebsite', array('idIDWeb' => 1))->row_object();
        $data['wishlist'] = $this->Mcrud->get_by_id('tbl_wishlist', array('idMember' => $id))->num_rows();
        $data['order'] = $this->Mcrud->get_by_id('tbl_transaksi', array('idMember' => $id, 'status' => 'Dibatalkan'))->num_rows();
        $data['transaksi'] = $this->Mcrud->transaksi($idInvoice)->row_object();
        $data['detail'] = $this->Mcrud->detailTransaksi($idInvoice)->result();
        $this->template->load('layout_home', 'front-end/detail_order', $data);
    }

    public function pesanan_diterima($invoice)
    {
        $this->db->set('status', 'Diterima');
        $this->db->where('idTransaksi', $invoice);
        $this->db->update('tbl_transaksi');

        $this->session->set_flashdata('flash', 'Terima Kasih Telah Berbelanja ! Silahkan beri testimoni di bawah');
        redirect('Member/detail_order/' . $invoice);
    }

    public function hapus($id)
    {
        $idMember = $this->session->userdata('idMember');
        $this->db->where('idProduk', $id);
        $this->db->where('idMember', $idMember);
        $this->db->delete('tbl_wishlist');
        $this->session->set_flashdata('flash', 'Wishlist berhasil dihapus');
        redirect('Member/my_wishlist');
    }


    public function clear()
    {
        $idMember = $this->session->userdata('idMember');

        $this->db->where('idMember', $idMember);
        $this->db->delete('tbl_wishlist');
        redirect('Member/my_wishlist');
    }


    public function logout()
    {
        session_destroy();
        redirect('Home');
    }
}
