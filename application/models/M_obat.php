<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_obat extends CI_Model
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

    public function data_obat_pasien($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('REKAMMEDIS', $table.'.ID_REKAM_MEDIS = REKAMMEDIS.ID_REKAM_MEDIS');
        $this->db->join('PEMERIKSAAN', 'REKAMMEDIS.ID_PEMERIKSAAN = PEMERIKSAAN.ID_PEMERIKSAAN');
        $this->db->join('ANTRIAN', 'PEMERIKSAAN.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->join('OBAT', $table.'.ID_OBAT = OBAT.ID_OBAT');
        $this->db->where($table.'.ID_REKAM_MEDIS', $id);
        return $this->db->get();
    }

    public function resepobat($table)
    {
        $this->db->select('NAMA_PASIEN,NO_ANTRIAN,DIAGNOSA,TGL_CHECKUP,UMUR_PASIEN,ID_RESEP_OBAT,REKAMMEDIS.ID_REKAM_MEDIS');
        $this->db->from($table);
        $this->db->join('REKAMMEDIS', $table.'.ID_REKAM_MEDIS = REKAMMEDIS.ID_REKAM_MEDIS');
        $this->db->join('PEMERIKSAAN', 'REKAMMEDIS.ID_PEMERIKSAAN = PEMERIKSAAN.ID_PEMERIKSAAN');
        $this->db->join('ANTRIAN', 'PEMERIKSAAN.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        // $this->db->group_by($table.'.ID_REKAM_MEDIS');
        $this->db->order_by('ID_RESEP_OBAT', 'ASC');
        $this->db->limit(1);
        return $this->db->get();
    }

    public function resepobat_now($table)
    {
        $this->db->select('NAMA_PASIEN,NO_ANTRIAN,DIAGNOSA,TGL_CHECKUP,UMUR_PASIEN,ID_RESEP_OBAT,REKAMMEDIS.ID_REKAM_MEDIS');
        $this->db->from($table);
        $this->db->join('REKAMMEDIS', $table.'.ID_REKAM_MEDIS = REKAMMEDIS.ID_REKAM_MEDIS');
        $this->db->join('PEMERIKSAAN', 'REKAMMEDIS.ID_PEMERIKSAAN = PEMERIKSAAN.ID_PEMERIKSAAN');
        $this->db->join('ANTRIAN', 'PEMERIKSAAN.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        // $this->db->group_by($table.'.ID_REKAM_MEDIS');
        $this->db->order_by('ID_RESEP_OBAT', 'ASC');
        $this->db->where('ANTRIAN.TGL_CHECKUP', strtoupper(date('d-M-y')));
        $this->db->limit(1);
        return $this->db->get();
    }

    public function detail_obat($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('REKAMMEDIS', $table.'.ID_REKAM_MEDIS = REKAMMEDIS.ID_REKAM_MEDIS');
        $this->db->join('PEMERIKSAAN', 'REKAMMEDIS.ID_PEMERIKSAAN = PEMERIKSAAN.ID_PEMERIKSAAN');
        $this->db->join('ANTRIAN', 'PEMERIKSAAN.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->join('OBAT', $table.'.ID_OBAT = OBAT.ID_OBAT');
        // $this->db->order_by('id_resep_obat', 'ASC');
        $this->db->where($table.'.ID_REKAM_MEDIS', $id);
        return $this->db->get();
    }

    public function cek_pasien($table,$id)
    {
        $this->db->select('NIK_PASIEN,NAMA_PASIEN,UMUR_PASIEN,JENIS_KELAMIN,ID_REKAM_MEDIS');
        $this->db->from($table);
        $this->db->join('PEMERIKSAAN', $table.'.ID_PEMERIKSAAN = PEMERIKSAAN.ID_PEMERIKSAAN');
        $this->db->join('ANTRIAN', 'PEMERIKSAAN.ID_ANTRIAN = ANTRIAN.ID_ANTRIAN');
        $this->db->join('PASIEN', 'ANTRIAN.ID_PASIEN = PASIEN.ID_PASIEN');
        $this->db->where($table.'.ID_REKAM_MEDIS', $id);
        return $this->db->get();
    }

    public function data_ready($table)
    {
        return $this->db->get_where($table, array('STOK_OBAT >' => 0));
    }

    public function detail($table,$id)
    {
        return $this->db->get_where($table, array('ID_OBAT' => $id));
    }

    public function detail_resep($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('OBAT', $table.'.ID_OBAT = OBAT.ID_OBAT');
        $this->db->where($table.'.ID_RESEP_OBAT', $id);
        return $this->db->get();
        // return $this->db->get_where($table, array('id_resep_obat' => $id));
    }
    
    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data,array('ID_OBAT' => $id));
    }
    
    public function hapus($table,$id)
    {
        return $this->db->delete($table,array('ID_OBAT' => $id));
    }
    
    public function hapus_resep($table,$id)
    {
        return $this->db->delete($table,array('ID_RESEP_OBAT' => $id));
    }
}
