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
        $this->db->join('rekammedis', $table.'.id_rekam_medis = rekammedis.id_rekam_medis');
        $this->db->join('pemeriksaan', 'rekammedis.id_pemeriksaan = pemeriksaan.id_pemeriksaan');
        $this->db->join('antrian', 'pemeriksaan.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->join('obat', $table.'.id_obat = obat.id_obat');
        $this->db->where($table.'.id_rekam_medis', $id);
        return $this->db->get();
    }

    public function resepobat($table)
    {
        $this->db->select('nama_pasien,no_antrian,diagnosa,tgl_checkup,umur_pasien,id_resep_obat,rekammedis.id_rekam_medis');
        $this->db->from($table);
        $this->db->join('rekammedis', $table.'.id_rekam_medis = rekammedis.id_rekam_medis');
        $this->db->join('pemeriksaan', 'rekammedis.id_pemeriksaan = pemeriksaan.id_pemeriksaan');
        $this->db->join('antrian', 'pemeriksaan.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->group_by($table.'.id_rekam_medis');
        $this->db->order_by('id_resep_obat', 'ASC');
        // $this->db->where($table.'.id_rekam_medis', $id);
        return $this->db->get();
    }

    public function resepobat_now($table)
    {
        $this->db->select('nama_pasien,no_antrian,diagnosa,tgl_checkup,umur_pasien,id_resep_obat,rekammedis.id_rekam_medis');
        $this->db->from($table);
        $this->db->join('rekammedis', $table.'.id_rekam_medis = rekammedis.id_rekam_medis');
        $this->db->join('pemeriksaan', 'rekammedis.id_pemeriksaan = pemeriksaan.id_pemeriksaan');
        $this->db->join('antrian', 'pemeriksaan.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->group_by($table.'.id_rekam_medis');
        $this->db->order_by('id_resep_obat', 'ASC');
        $this->db->where('antrian.tgl_checkup', date('Y-m-d'));
        return $this->db->get();
    }

    public function detail_obat($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('rekammedis', $table.'.id_rekam_medis = rekammedis.id_rekam_medis');
        $this->db->join('pemeriksaan', 'rekammedis.id_pemeriksaan = pemeriksaan.id_pemeriksaan');
        $this->db->join('antrian', 'pemeriksaan.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->join('obat', $table.'.id_obat = obat.id_obat');
        // $this->db->order_by('id_resep_obat', 'ASC');
        $this->db->where($table.'.id_rekam_medis', $id);
        return $this->db->get();
    }

    public function cek_pasien($table,$id)
    {
        $this->db->select('nik_pasien,nama_pasien,umur_pasien,jenis_kelamin,id_rekam_medis');
        $this->db->from($table);
        $this->db->join('pemeriksaan', $table.'.id_pemeriksaan = pemeriksaan.id_pemeriksaan');
        $this->db->join('antrian', 'pemeriksaan.id_antrian = antrian.id_antrian');
        $this->db->join('pasien', 'antrian.id_pasien = pasien.id_pasien');
        $this->db->where($table.'.id_rekam_medis', $id);
        return $this->db->get();
    }

    public function data_ready($table)
    {
        return $this->db->get_where($table, array('stok_obat >' => 0));
    }

    public function detail($table,$id)
    {
        return $this->db->get_where($table, array('id_obat' => $id));
    }

    public function detail_resep($table,$id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('obat', $table.'.id_obat = obat.id_obat');
        $this->db->where($table.'.id_resep_obat', $id);
        return $this->db->get();
        // return $this->db->get_where($table, array('id_resep_obat' => $id));
    }
    
    public function tambah($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function edit($table,$data,$id)
    {
        return $this->db->update($table,$data,array('id_obat' => $id));
    }
    
    public function hapus($table,$id)
    {
        return $this->db->delete($table,array('id_obat' => $id));
    }
    
    public function hapus_resep($table,$id)
    {
        return $this->db->delete($table,array('id_resep_obat' => $id));
    }
}
