<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_obat','m_pembayaran']);
        $this->load->helper(array('form', 'url'));
        $this->cek_login();
    }

    public function cek_login()
    {
        $level = $this->session->userdata('level');

        if ($this->session->userdata('nik') == "") {
            $this->session->set_flashdata('sukses', 'Lengkapi Profile Anda!');
            redirect('setting');
        }
        elseif ($this->session->userdata('username') == "") {
            $this->session->set_flashdata('gagal', 'Silahkan Login!');
            redirect('login');
        }
        elseif ($level == "petugas") {
            $this->session->set_flashdata('gagal', 'Akses dilarang!');
            redirect('beranda');
        }
    }

    public function index()
    {
        $obat = $this->m_obat->data('OBAT')->result();
        $data = array(
            'title'        => 'User',
            'obat'        => $obat,
            'isi'        => 'admin/v_obat',
        );

        $this->load->view('layout/wrapper', $data);
    }

    public function pengambilan()
    {
        if ($this->session->userdata('level')!="administrator") {
            $resep = $this->m_obat->resepobat_now('RESEPOBAT')->result();
        }
        else{
            $resep = $this->m_obat->resepobat('RESEPOBAT')->result();
        }

        if ($this->uri->segment(3) !="") {
            $id_resep = $this->uri->segment(3);
            $detail_obat = $this->m_obat->detail_obat('RESEPOBAT',$id_resep)->result();
            $data = array(
                'title'        => 'Pengambilan Obat',
                'resep'        => $resep,
                'detail_obat'        => $detail_obat,
                'isi'        => 'apoteker/v_pengambilan_obat',
            );
        }
        else{
            $data = array(
                'title'        => 'Pengambilan Obat',
                'resep'        => $resep,
                'isi'        => 'apoteker/v_pengambilan_obat',
            );
        }


        // echo "<pre>";
        // print_r($resep);
        // echo "<pre>";
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
                'MASA_BERLAKU'        => $masa_berlaku,
                'JENIS_OBAT'        => $jenis_obat,
                'NAMA_OBAT'        => $nama_obat,
                'TAHUN_PRODUKSI'        => $tahun_produksi,
                'STOK_OBAT'        => $stok_obat,
                'MERK_OBAT'        => $merk_obat,
                'HARGA_OBAT'        => $harga_obat
            );

            $this->m_obat->tambah('OBAT', $data);

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
                'MASA_BERLAKU'        => $masa_berlaku,
                'JENIS_OBAT'        => $jenis_obat,
                'NAMA_OBAT'        => $nama_obat,
                'TAHUN_PRODUKSI'        => $tahun_produksi,
                'STOK_OBAT'        => $stok_obat,
                'MERK_OBAT'        => $merk_obat,
                'HARGA_OBAT'        => $harga_obat
            );

            $this->m_obat->edit('OBAT', $data, $id);

            $this->session->set_flashdata('sukses', 'Obat Berhasil diubah!');
            redirect(base_url('obat'));

        }
    }


    public function hapus($id=null)
    {
        if($id=="") show_404();

        $this->m_obat->hapus('OBAT', $id);

        $this->session->set_flashdata('sukses', 'Obat Berhasil Dihapus!');
        redirect(base_url('obat'));

    }


    public function pasien($id=null)
    {
        if($id=="") show_404();

        $obat_pasien = $this->m_obat->data_obat_pasien('RESEPOBAT',$id)->result();
        $pasien = $this->m_obat->cek_pasien('REKAMMEDIS',$id)->row();
        $list_obat = $this->m_obat->data_ready('OBAT',$id)->result();

        $data = array(
            'title'        => 'Obat Pasien',
            'obat'        => $obat_pasien,
            'pasien'        => $pasien,
            'list_obat'        => $list_obat,
            'isi'        => 'dokter/v_obat_pasien',
        );

        $this->load->view('layout/wrapper', $data);

    }

    public function tambah_obat_pasien($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        $valid->set_rules(
            'obat',
            'Obat',
            'required|numeric',
            array(
                'required'                       => 'Obat harus diisi',
                'numeric'                       => 'Obat tidak valid!'
            )
        );
        
        $valid->set_rules(
            'jumlah_obat',
            'Jumlah Obat',
            'required',
            array(
                'required'                       => 'Jumlah Obat harus diisi'
            )
        );
        
        $valid->set_rules(
            'keterangan',
            'Keterangan',
            'required',
            array(
                'required'                       => 'Keterangan harus diisi'
            )
        );
        


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('obat/pasien/'.$id);
        } else {

            $i = $this->input;

            $id_obat      = $i->post('obat');
            $jumlah_obat     = $i->post('jumlah_obat');
            $keterangan     = $i->post('keterangan');

            $pilihan_obat = $this->m_obat->detail('OBAT', $id_obat)->row();
            $sisa = $pilihan_obat->STOK_OBAT - $jumlah_obat;
            if ($sisa>0) {

                $data = array(
                    'ID_REKAM_MEDIS'        => $id,
                    'ID_OBAT'        => $id_obat,
                    'JUMLAH_OBAT'        => $jumlah_obat,
                    'KETERANGAN'        => $keterangan
                );
                $this->m_obat->tambah('RESEPOBAT',$data);

                $kurang = array('STOK_OBAT' => $sisa);
                $this->m_obat->edit('OBAT',$kurang,$id_obat);

                $harga_obat = $jumlah_obat * $pilihan_obat->HARGA_OBAT;

                $cek_pembayaran = $this->m_pembayaran->detail('PEMBAYARAN',$id)->row();
                $total_pembayaran = $cek_pembayaran->TOTAL_BAYAR + $harga_obat;

                $data_pembayaran = array('TOTAL_BAYAR' => $total_pembayaran);

                $this->m_pembayaran->pembayaran('PEMBAYARAN',$data_pembayaran,$id);

                $this->session->set_flashdata('sukses', 'Obat Berhasil ditambahkan!');
                redirect(base_url('obat/pasien/'.$id));
            }
            else{
                $this->session->set_flashdata('gagal', 'Stok Obat Kurang!');
                redirect(base_url('obat/pasien/'.$id));
            }

        }
    }

    public function hapus_resep($id=null)
    {
        if($id=="") show_404();

        $cek_resep = $this->m_obat->detail_resep('RESEPOBAT',$id)->row();

        $tambah_obat = $cek_resep->STOK_OBAT + $cek_resep->JUMLAH_OBAT;
        $data_obat = array('STOK_OBAT' => $tambah_obat);
        $this->m_obat->edit('OBAT', $data_obat, $cek_resep->ID_OBAT);

        $kurang_harga = $cek_resep->JUMLAH_OBAT * $cek_resep->HARGA_OBAT;

        $cek_pembayaran = $this->m_pembayaran->cek_pembayaran('pembayaran', $cek_resep->ID_REKAM_MEDIS)->row();
        $total = $cek_pembayaran->TOTAL_BAYAR - $kurang_harga;
        $data_pembayaran = array('TOTAL_BAYAR' => $total);
        $this->m_pembayaran->pembayaran('PEMBAYARAN', $data_pembayaran, $cek_resep->ID_REKAM_MEDIS);


        $this->m_obat->hapus_resep('RESEPOBAT', $id);

        $this->session->set_flashdata('sukses', 'Obat Pasien Berhasil Dihapus!');
        redirect(base_url('obat/pasien/'.$cek_resep->ID_REKAM_MEDIS));
    }    


}
