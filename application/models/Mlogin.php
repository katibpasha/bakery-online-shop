<?php

class Mlogin extends CI_Model
{

    public function cek_login($e)
    {
        $q = $this->db->get_where('tbl_admin', array('emailAdmin' => $e));
        return $q;
    }

    public function cek_login2($e, $p)
    {
        $q = $this->db->get_where('tbl_kasir', array('emailKasir' => $e, 'passKasir' => $p));
        return $q;
    }

    public function login_member($e)
    {
        return $this->db->get_where('tbl_member', array('email' => $e));
    }

    // public function cek_login_member($u, $p)
    // {
    //     $q = $this->db->get_where('tbl_member', array('username' => $u, 'password' => $p, 'statusAktif'));
    //     return $q;
    // }

    // public function hak_akses($user)
    // {
    //     return $this->db->where('tbl_admin', $user);
    // }
}
