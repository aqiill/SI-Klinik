<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_antrian extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    //Login
    public function cek($table)
    {
        $this->db->select_max('NO_ANTRIAN');
        $this->db->from($table);
        return $this->db->get();
    }

    public function cek_pasien($table,$id_pasien,$today)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('ID_PASIEN', $id_pasien);
        $this->db->where('TGL_CHECKUP', $today);
        $this->db->where('STATUS_ANTRIAN !=', 'selesai');
        return $this->db->get();
    }

    public function data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('PASIEN', $table.'.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->order_by('ID_ANTRIAN','ASC');
        return $this->db->get();
    }

    public function data_now($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('PASIEN', $table.'.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->order_by('ID_ANTRIAN','ASC');
        $this->db->where('TGL_CHECKUP', strtoupper(date('d-M-y')));
        return $this->db->get();
    }

    public function cek_data_pasien($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('PASIEN', $table.'.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->join('PENGGUNA', $table.'.ID_USER = PENGGUNA.ID_USER');
        $this->db->where('ID_ANTRIAN',$id);
        return $this->db->get();
    }

    public function cek_pemeriksaan($table,$id)
    {
        return $this->db->get_where($table,array('ID_ANTRIAN' => $id));
    }

    public function cek_pemeriksaan_dokter($table,$id)
    {
        return $this->db->get_where($table,array('ID_PEMERIKSAAN' => $id));
    }

    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data, array('ID_ANTRIAN' => $id));
    }

}
