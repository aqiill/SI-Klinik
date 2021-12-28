<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_periksa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
    }

    //Login
    // public function cek($table)
    // {
    //     $this->db->select_max('no_antrian');
    //     $this->db->from($table);
    //     return $this->db->get();
    // }

    public function data_petugas($table,$id_user)
    {
        $this->db->select('NAMA_PASIEN,UMUR_PASIEN,JENIS_KELAMIN,SUHU_BADAN,KELUHAN,TEKANAN_DARAH,NO_ANTRIAN,NAMA_USER,ID_PEMERIKSAAN,STATUS_PEMERIKSAAN');
        $this->db->from($table);
        $this->db->join('ANTRIAN', $table.'.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'PASIEN.ID_PASIEN = ANTRIAN.ID_PASIEN');
        $this->db->join('PENGGUNA', 'PENGGUNA.ID_USER = ANTRIAN.ID_USER');
        $this->db->order_by('ANTRIAN.ID_ANTRIAN', 'ASC');
        $this->db->where('ANTRIAN.ID_USER', $id_user);
        return $this->db->get();
    }

    public function data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('ANTRIAN', $table.'.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'PASIEN.ID_PASIEN = ANTRIAN.ID_PASIEN');
        $this->db->join('PENGGUNA', 'PENGGUNA.ID_USER = ANTRIAN.ID_USER');
        $this->db->order_by('ANTRIAN.ID_ANTRIAN', 'ASC');
        return $this->db->get();
    }

    public function data_dokter($table)
    {
        $this->db->select('NAMA_PASIEN,UMUR_PASIEN,JENIS_KELAMIN,SUHU_BADAN,KELUHAN,TEKANAN_DARAH,NO_ANTRIAN,NAMA_USER,ID_PEMERIKSAAN,STATUS_PEMERIKSAAN');
        $this->db->from($table);
        $this->db->join('ANTRIAN', $table.'.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'PASIEN.ID_PASIEN = ANTRIAN.ID_PASIEN');
        $this->db->join('PENGGUNA', 'PENGGUNA.ID_USER = ANTRIAN.ID_USER');
        $this->db->order_by('ANTRIAN.ID_ANTRIAN', 'ASC');
        $this->db->where('ANTRIAN.TGL_CHECKUP', strtoupper(date('d-M-y')));
        return $this->db->get();
    }

    public function cek_pasien($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('ANTRIAN', $table.'.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->where($table.'.ID_PEMERIKSAAN', $id);
        return $this->db->get();
    }

    // public function cek_data_pasien($table,$id)
    // {
    //     $this->db->select('id_antrian,no_antrian,pasien.id_pasien,user.id_user,tgl_checkup,status_antrian,nik_pasien,nama_pasien,umur_pasien,alamat_pasien, jenis_kelamin, nama_user');
    //     $this->db->from($table);
    //     $this->db->join('pasien', $table.'.id_pasien = pasien.id_pasien');
    //     $this->db->join('user', $table.'.id_user = user.id_user');
    //     $this->db->where('id_antrian',$id);
    //     return $this->db->get();
    // }

    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function last_id()
    {
        return $this->db->query("SELECT MAX(ID_REKAM_MEDIS) as ID FROM REKAMMEDIS");
    }


    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data, array('ID_PEMERIKSAAN' => $id));
    }

}
