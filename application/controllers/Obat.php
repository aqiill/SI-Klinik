<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_obat','m_pembayaran']);
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


    public function pasien($id=null)
    {
        if($id=="") show_404();

        $obat_pasien = $this->m_obat->data_obat_pasien('resepobat',$id)->result();
        $pasien = $this->m_obat->cek_pasien('rekammedis',$id)->row();
        $list_obat = $this->m_obat->data_ready('obat',$id)->result();

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

            $pilihan_obat = $this->m_obat->detail('obat', $id_obat)->row();
            $sisa = $pilihan_obat->stok_obat - $jumlah_obat;
            if ($sisa>0) {

                $data = array(
                    'id_rekam_medis'        => $id,
                    'id_obat'        => $id_obat,
                    'jumlah_obat'        => $jumlah_obat,
                    'keterangan'        => $keterangan
                );
                $this->m_obat->tambah('resepobat',$data);

                $kurang = array('stok_obat' => $sisa);
                $this->m_obat->edit('obat',$kurang,$id_obat);

                $harga_obat = $jumlah_obat * $pilihan_obat->harga_obat;

                $cek_pembayaran = $this->m_pembayaran->detail('pembayaran',$id)->row();
                $total_pembayaran = $cek_pembayaran->total_bayar + $harga_obat;

                $data_pembayaran = array('total_bayar' => $total_pembayaran);

                $this->m_pembayaran->pembayaran('pembayaran',$data_pembayaran,$id);

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

        $cek_resep = $this->m_obat->detail_resep('resepobat',$id)->row();

        $tambah_obat = $cek_resep->stok_obat + $cek_resep->jumlah_obat;
        $data_obat = array('stok_obat' => $tambah_obat);
        $this->m_obat->edit('obat', $data_obat, $cek_resep->id_obat);

        $kurang_harga = $cek_resep->jumlah_obat * $cek_resep->harga_obat;

        $cek_pembayaran = $this->m_pembayaran->cek_pembayaran('pembayaran', $cek_resep->id_rekam_medis)->row();
        $total = $cek_pembayaran->total_bayar - $kurang_harga;
        $data_pembayaran = array('total_bayar' => $total);
        $this->m_pembayaran->pembayaran('pembayaran', $data_pembayaran, $cek_resep->id_rekam_medis);


        $this->m_obat->hapus_resep('resepobat', $id);

        $this->session->set_flashdata('sukses', 'Obat Pasien Berhasil Dihapus!');
        redirect(base_url('obat/pasien/'.$cek_resep->id_rekam_medis));
    }    


}
