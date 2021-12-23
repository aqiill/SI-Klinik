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
        $this->db->join('rekammedis', $table.'.id_rekam_medis = rekammedis.id_rekam_medis');
        // $this->db->join('user', $table.'.id_user = user.id_user');
        $this->db->join('pemeriksaan', 'rekammedis.id_pemeriksaan = pemeriksaan.id_pemeriksaan');
        $this->db->join('antrian', 'pemeriksaan.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->join('user', 'antrian.id_user = user.id_user');
        return $this->db->get();
    }

    public function data_pembayaran_petugas($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('rekammedis', $table.'.id_rekam_medis = rekammedis.id_rekam_medis');
        // $this->db->join('user', $table.'.id_user = user.id_user');
        $this->db->join('pemeriksaan', 'rekammedis.id_pemeriksaan = pemeriksaan.id_pemeriksaan');
        $this->db->join('antrian', 'pemeriksaan.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->join('user', 'antrian.id_user = user.id_user');
        $this->db->where('antrian.id_user', $id);
        return $this->db->get();
    }

    public function detail($table,$id)
    {
        return $this->db->get_where($table, array('id_rekam_medis' => $id));
    }

    public function pembayaran($table,$data,$id)
    {
        return $this->db->update($table,$data, array('id_rekam_medis' => $id));
    }

    public function bayar($table,$data,$id)
    {
        return $this->db->update($table,$data, array('id_pembayaran' => $id));
    }

    public function cek_pembayaran($table,$id)
    {
        return $this->db->get_where($table, array('id_rekam_medis' => $id));
    }

    public function jlm_pendapatan($table)
    {
        return $this->db->get_where($table, array('status_bayar' => 'lunas'));
    }

}
