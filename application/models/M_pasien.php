<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pasien extends CI_Model
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
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('ID_PASIEN', 'DESC');
        return $this->db->get();
    }

    public function rekam_medis($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('ANTRIAN', $table.'.ID_PASIEN = ANTRIAN.ID_PASIEN');
        $this->db->join('PEMERIKSAAN', 'ANTRIAN.ID_ANTRIAN = PEMERIKSAAN.ID_ANTRIAN');
        $this->db->join('REKAMMEDIS', 'PEMERIKSAAN.ID_PEMERIKSAAN = REKAMMEDIS.ID_PEMERIKSAAN');
        $this->db->where($table.'.ID_PASIEN', $id);
        return $this->db->get();
    }

    public function detail($table,$id)
    {
        return $this->db->get_where($table, array('ID_PASIEN' => $id));
    }

    public function detail_nik($table,$nik)
    {
        return $this->db->get_where($table, array('NIK_PASIEN' => $nik));
    }
    
    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data,array('ID_PASIEN' => $id));
    }
    
    public function hapus($table,$id)
    {
        return $this->db->delete($table,array('ID_PASIEN' => $id));
    }
}
