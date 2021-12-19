<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_obat']);
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $obat = $this->m_obat->data('obat')->result();
        $data = array(
            'title'        => 'User',
            'obat'        => $obat,
            'isi'        => 'admin/v_obat',
        );

        $this->load->view('layout/wrapper', $data);
    }


    public function tambah()
    {
        $valid = $this->form_validation;
        
        $valid->set_rules(
            'masa_berlaku',
            'Masa Berlaku',
            'required',
            array(
                'required'                       => 'Masa Berlaku harus diisi'
            )
        );
        
        $valid->set_rules(
            'jenis_obat',
            'Jenis Obat',
            'required',
            array(
                'required'                       => 'Jenis Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'nama_obat',
            'Nama Obat',
            'required',
            array(
                'required'                       => 'Nama Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'tahun_produksi',
            'Tahun Produksi',
            'required',
            array(
                'required'                       => 'Tahun Produksi harus diisi'
            )
        );
        
        $valid->set_rules(
            'stok_obat',
            'Stok Obat',
            'required',
            array(
                'required'                       => 'Stok Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'merk_obat',
            'Merk Obat',
            'required',
            array(
                'required'                       => 'Merk Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'harga_obat',
            'Harga Obat',
            'required',
            array(
                'required'                       => 'Harga Obat harus diisi'
            )
        );


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('obat');
        } else {

            $i = $this->input;

            $masa_berlaku      = $i->post('masa_berlaku');
            $jenis_obat     = $i->post('jenis_obat');
            $nama_obat     = $i->post('nama_obat');
            $tahun_produksi     = $i->post('tahun_produksi');
            $stok_obat     = $i->post('stok_obat');
            $merk_obat     = $i->post('merk_obat');
            $harga_obat     = $i->post('harga_obat');

            $data = array(
                'masa_berlaku'        => $masa_berlaku,
                'jenis_obat'        => $jenis_obat,
                'nama_obat'        => $nama_obat,
                'tahun_produksi'        => $tahun_produksi,
                'stok_obat'        => $stok_obat,
                'merk_obat'        => $merk_obat,
                'harga_obat'        => $harga_obat
            );

            $this->m_obat->tambah('obat', $data);

            $this->session->set_flashdata('sukses', 'Obat Berhasil Ditambahkan!');
            redirect(base_url('obat'));

        }
    }


    public function edit($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        $valid->set_rules(
            'masa_berlaku',
            'Masa Berlaku',
            'required',
            array(
                'required'                       => 'Masa Berlaku harus diisi'
            )
        );
        
        $valid->set_rules(
            'jenis_obat',
            'Jenis Obat',
            'required',
            array(
                'required'                       => 'Jenis Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'nama_obat',
            'Nama Obat',
            'required',
            array(
                'required'                       => 'Nama Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'tahun_produksi',
            'Tahun Produksi',
            'required',
            array(
                'required'                       => 'Tahun Produksi harus diisi'
            )
        );
        
        $valid->set_rules(
            'stok_obat',
            'Stok Obat',
            'required',
            array(
                'required'                       => 'Stok Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'merk_obat',
            'Merk Obat',
            'required',
            array(
                'required'                       => 'Merk Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'harga_obat',
            'Harga Obat',
            'required',
            array(
                'required'                       => 'Harga Obat harus diisi'
            )
        );


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('obat');
        } else {

            $i = $this->input;

            $masa_berlaku      = $i->post('masa_berlaku');
            $jenis_obat     = $i->post('jenis_obat');
            $nama_obat     = $i->post('nama_obat');
            $tahun_produksi     = $i->post('tahun_produksi');
            $stok_obat     = $i->post('stok_obat');
            $merk_obat     = $i->post('merk_obat');
            $harga_obat     = $i->post('harga_obat');

            $data = array(
                'masa_berlaku'        => $masa_berlaku,
                'jenis_obat'        => $jenis_obat,
                'nama_obat'        => $nama_obat,
                'tahun_produksi'        => $tahun_produksi,
                'stok_obat'        => $stok_obat,
                'merk_obat'        => $merk_obat,
                'harga_obat'        => $harga_obat
            );

            $this->m_obat->edit('obat', $data, $id);

            $this->session->set_flashdata('sukses', 'Obat Berhasil diubah!');
            redirect(base_url('obat'));

        }
    }


    public function hapus($id=null)
    {
        if($id=="") show_404();

        $this->m_obat->hapus('obat', $id);

        $this->session->set_flashdata('sukses', 'Obat Berhasil Dihapus!');
        redirect(base_url('obat'));

    }
}
