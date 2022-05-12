<?php

class Mcrud extends CI_Model
{

    public function get_all_data($tabel)
    {
        return $this->db->get($tabel);
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id, $pk)
    {
        $this->db->where($pk, $id);
        $this->db->delete($tabel);
    }

    public function pemasukan($dari, $sampai)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_member m', 't.idMember = m.idMember');
        $this->db->join('tbl_rekening r', 't.idRekening = r.id');
        $this->db->where("t.tglTransaksi BETWEEN '$dari' AND '$sampai'", null);
        $this->db->where_in('t.status', array('Diterima', 'Dikirim'));
        $query = $this->db->get();
        return $query;
    }

    public function pengeluaran($dari, $sampai)
    {
        $this->db->select('*');
        $this->db->from('tbl_outcome');
        $this->db->where("tglPengeluaran BETWEEN '$dari' AND '$sampai'", null);
        $query = $this->db->get();
        return $query;
    }

    public function Konfirmasi($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_konfirmasi k');
        $this->db->join('tbl_transaksi t', 'k.idTransaksi = t.idTransaksi');
        $this->db->where('k.idTransaksi', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getOrder($idMember, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->where('idMember', $idMember);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

    public function cek_kodeBarang()
    {
        $this->db->select('RIGHT(tbl_produk.idProduk,4) as kode_produk', FALSE);
        $this->db->order_by('kode_produk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_produk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_produk) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = "PR" . $batas;
        return $kodetampil;
    }

    public function jointabel($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_testimoni');
        $this->db->join('tbl_produk', 'tbl_testimoni.idProduk = tbl_produk.idProduk');
        $this->db->join('tbl_member', 'tbl_testimoni.idMember = tbl_member.idMember');
        $this->db->where('tbl_testimoni.idProduk', $id);
        $query = $this->db->get();
        return $query;
    }

    public function wishlist($id)
    {
        $this->db->select('w.idProduk as id, p.idProduk as idProduk, p.namaProduk as namaProduk, k.namaKat as namaKat, p.harga as harga, p.foto as foto, p.diskon as diskon');
        $this->db->from('tbl_wishlist w');
        $this->db->join('tbl_produk p', 'w.idProduk = p.idProduk');
        $this->db->join('tbl_member m', 'w.idMember = m.idMember');
        $this->db->join('tbl_kategori k', 'p.idKat = k.idKat');
        $this->db->where('m.idMember', $id);
        $this->db->order_by('w.idWishlist DESC');
        $query = $this->db->get();
        return $query;
    }

    public function transaksi($id)
    {
        $this->db->select('t.idTransaksi,m.namaKonsumen,r.noRekening,r.namaRekening,t.tglTransaksi,t.alamatPengiriman,t.totalBelanja,bk.biaya, t.status');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_member m', 't.idMember = m.idMember');
        $this->db->join('tbl_rekening r', 't.idRekening = r.id');
        $this->db->join('tbl_ongkir bk', 't.idBiayaKirim = bk.idBiayaKirim');
        $this->db->where('t.idTransaksi', $id);
        $query = $this->db->get();
        return $query;
    }

    public function detailTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_detailtransaksi dt');
        $this->db->join('tbl_produk p', 'dt.idProduk = p.idProduk');
        $this->db->where('dt.idTransaksi', $id);
        $query = $this->db->get();
        return $query;
    }

    public function cek_kodeMember()
    {
        $this->db->select('RIGHT(tbl_member.idMember,4) as kode_member', FALSE);
        $this->db->order_by('kode_member', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_member');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_member) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = "M" . $batas;
        return $kodetampil;
    }

    public function kode_invoice()
    {
        $this->db->select('RIGHT(tbl_transaksi.idTransaksi,4) as invoice', FALSE);
        $this->db->order_by('invoice', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_transaksi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->invoice) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = "INV-" . date('ymd') . $batas;
        return $kodetampil;
    }

    public function find($id)
    {
        $result = $this->db->where('idProduk', $id)
            ->limit(1)
            ->get('tbl_produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
