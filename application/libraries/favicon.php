<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Favicon
{
    function favicon()
    {
        $data['id'] = $this->db->get('tbl_identitaswebsite');
        return $data;
    }
}
