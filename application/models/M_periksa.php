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
        $this->db->select('nama_pasien,umur_pasien,jenis_kelamin,suhu_badan,keluhan,tekanan_darah,no_antrian,nama_user,id_pemeriksaan,status_pemeriksaan');
        $this->db->from($table);
        $this->db->join('antrian', $table.'.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->join('user', 'user.id_user = antrian.id_user');
        $this->db->order_by('antrian.id_antrian', 'ASC');
        $this->db->where('antrian.id_user', $id_user);
        return $this->db->get();
    }

    public function data($table)
    {
        $this->db->select('nama_pasien,umur_pasien,jenis_kelamin,suhu_badan,keluhan,tekanan_darah,no_antrian,nama_user,id_pemeriksaan,status_pemeriksaan');
        $this->db->from($table);
        $this->db->join('antrian', $table.'.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->join('user', 'user.id_user = antrian.id_user');
        $this->db->order_by('antrian.id_antrian', 'ASC');
        return $this->db->get();
    }

    public function cek_pasien($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('antrian', $table.'.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->where($table.'.id_pemeriksaan', $id);
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



    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data, array('id_pemeriksaan' => $id));
    }

}
