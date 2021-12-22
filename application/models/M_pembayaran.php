<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }


    public function detail($table,$id)
    {
        return $this->db->get_where($table, array('id_rekam_medis' => $id));
    }

    public function pembayaran($table,$data,$id)
    {
        return $this->db->update($table,$data, array('id_rekam_medis' => $id));
    }

    public function cek_pembayaran($table,$id)
    {
        return $this->db->get_where($table, array('id_rekam_medis' => $id));
    }

}
