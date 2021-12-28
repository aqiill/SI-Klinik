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


    public function data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('REKAMMEDIS', $table.'.ID_REKAM_MEDIS = REKAMMEDIS.ID_REKAM_MEDIS');
        // $this->db->join('PENGGUNA', $table.'.ID_USER = PENGGUNA.ID_USER');
        $this->db->join('PEMERIKSAAN', 'REKAMMEDIS.ID_PEMERIKSAAN = PEMERIKSAAN.ID_PEMERIKSAAN');
        $this->db->join('ANTRIAN', 'PEMERIKSAAN.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->join('PENGGUNA', 'ANTRIAN.ID_USER = PENGGUNA.ID_USER');
        return $this->db->get();
    }

    public function data_pembayaran_petugas($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('REKAMMEDIS', $table.'.ID_REKAM_MEDIS = REKAMMEDIS.ID_REKAM_MEDIS');
        // $this->db->join('PENGGUNA', $table.'.ID_USER = PENGGUNA.ID_USER');
        $this->db->join('PEMERIKSAAN', 'REKAMMEDIS.ID_PEMERIKSAAN = PEMERIKSAAN.ID_PEMERIKSAAN');
        $this->db->join('ANTRIAN', 'PEMERIKSAAN.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->join('PENGGUNA', 'ANTRIAN.ID_USER = PENGGUNA.ID_USER');
        $this->db->where('ANTRIAN.ID_USER', $id);
        return $this->db->get();
    }

    public function detail($table,$id)
    {
        return $this->db->get_where($table, array('ID_REKAM_MEDIS' => $id));
    }

    public function pembayaran($table,$data,$id)
    {
        return $this->db->update($table,$data, array('ID_REKAM_MEDIS' => $id));
    }

    public function bayar($table,$data,$id)
    {
        return $this->db->update($table,$data, array('ID_PEMBAYARAN' => $id));
    }

    public function cek_pembayaran($table,$id)
    {
        return $this->db->get_where($table, array('ID_REKAM_MEDIS' => $id));
    }

    public function jlm_pendapatan($table)
    {
        return $this->db->get_where($table, array('STATUS_BAYAR' => 'lunas'));
    }

}
