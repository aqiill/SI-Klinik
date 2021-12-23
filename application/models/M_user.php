<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    //Login
    public function data($table)
    {
        return $this->db->get($table);
    }

    public function detail($table,$id)
    {
        return $this->db->get_where($table, array('id_user' => $id));
    }

    public function jlm_dokter($table)
    {
        return $this->db->get_where($table, array('level' => "dokter"));
    }
    
    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data,array('id_user' => $id));
    }
    
    public function hapus($table,$id)
    {
        return $this->db->delete($table,array('id_user' => $id));
    }
}
