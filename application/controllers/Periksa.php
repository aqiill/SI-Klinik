<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_periksa','m_obat','m_antrian','m_pembayaran']);
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
        elseif ($level == "apoteker") {
            $this->session->set_flashdata('gagal', 'Akses dilarang!');
            redirect('beranda');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $level = $this->session->userdata('level');

        if ($level=="petugas") {
            $periksa = $this->m_periksa->data_petugas('PEMERIKSAAN',$id_user)->result();
        }
        elseif ($level =="dokter" ) {
            $periksa = $this->m_periksa->data_dokter('PEMERIKSAAN')->result();            
        }
        elseif ($level =="administrator" || $level =="dokter" ) {
            $periksa = $this->m_periksa->data('PEMERIKSAAN')->result();            
        }


        $data = array(
            'title'        => 'Pemeriksaan',
            'periksa'        => $periksa,
            'isi'        => 'petugas/v_data_pemeriksaan'
        );

        $this->load->view('layout/wrapper', $data);


    }

    public function pembayaran()
    {
        $level = $this->session->userdata('level');
        $id_user = $this->session->userdata('id_user');
        if ($level !='administrator') {
            $pembayaran = $this->m_pembayaran->data_pembayaran_petugas('PEMBAYARAN',$id_user)->result();
     
            $data = array(
                'title'        => 'Pembayaran',
                'pembayaran'        => $pembayaran,
                'isi'        => 'petugas/v_pembayaran'
            );
        }
        else{
            $pembayaran = $this->m_pembayaran->data('PEMBAYARAN')->result();
     
            $data = array(
                'title'        => 'Pembayaran',
                'pembayaran'        => $pembayaran,
                'isi'        => 'petugas/v_pembayaran'
            );
        }
        $this->load->view('layout/wrapper', $data);


    }

    public function proses_bayar($id_antrian,$status,$id)
    {
        if ($id_antrian=="" || $status=="" || $id=="") show_404();

        if ($status=="y") {
            $status_bayar = "lunas";
            $status_antrian = "selesai";
        }
        elseif ($status=="n") {
            $status_bayar = "pending";
            $status_antrian = "pemeriksaan";
        }

        $data = array(
            'ID_USER' => $this->session->userdata('id_user'),
            'STATUS_BAYAR' => $status_bayar
        );
        $this->m_pembayaran->bayar('PEMBAYARAN', $data,$id);

        $data = array(
            'STATUS_ANTRIAN' => $status_antrian
        );
        $this->m_antrian->edit('ANTRIAN', $data,$id_antrian);
        
        $this->session->set_flashdata('suskes', 'Status Pembayaran diubah!');
        redirect(base_url('periksa/pembayaran'));


    }


    public function dokter($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        
        $valid->set_rules(
            'diagnosa',
            'Diagnosa',
            'required',
            array(
                'required'                       => 'Diagnosa harus diisi'
            )
        );

        $valid->set_rules(
            'tindakan',
            'Tindakan',
            'required',
            array(
                'required'                       => 'Tindakan harus diisi'
            )
        );

        
        if ($valid->run() === false) {

            $cek_pemeriksaan = $this->m_antrian->cek_pemeriksaan_dokter('REKAMMEDIS',$id)->num_rows();

            if ($cek_pemeriksaan>0) {
                $this->session->set_flashdata('gagal', 'Pasien sudah diperiksa oleh dokter!');
                redirect(base_url('periksa'));
            }
            else{
                $this->session->set_flashdata('gagal', validation_errors());

                $edit_status = array(
                    'STATUS_PEMERIKSAAN' => 'dokter'
                );

                $this->m_periksa->edit('PEMERIKSAAN',$edit_status,$id);

                $pasien = $this->m_periksa->cek_pasien('PEMERIKSAAN',$id)->row();

                $data = array(
                    'title'        => 'Pemeriksaan',
                    'pasien'        => $pasien,
                    'isi'        => 'dokter/v_tindakan',
                );

                $this->load->view('layout/wrapper', $data);
            }

        } else {

            $i = $this->input;

            $id_antrian      = $id;
            $tekanan_darah     = $i->post('tekanan_darah');
            $suhu_badan     = $i->post('suhu_badan');
            $keluhan     = $i->post('keluhan');

            $data = array(
                'ID_ANTRIAN'        => $id_antrian,
                'TEKANAN_DARAH'        => $tekanan_darah,
                'SUHU_BADAN'        => $suhu_badan,
                'KELUHAN'        => $keluhan,
                'STATUS_PEMERIKSAAN'        => 'petugas'
            );

            $this->m_antrian->tambah('PEMERIKSAAN', $data);

            $this->session->set_flashdata('sukses', 'Pemeriksaan Oleh Petugas Selesai');
            redirect(base_url('antrian'));

        }
    }


    public function tindakan($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        
        $valid->set_rules(
            'diagnosa',
            'Diagnosa',
            'required',
            array(
                'required'                       => 'Diagnosa harus diisi'
            )
        );

        $valid->set_rules(
            'tindakan',
            'Tindakan',
            'required',
            array(
                'required'                       => 'Tindakan harus diisi'
            )
        );
    


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('periksa/dokter/'.$id);
        } else {

            $i = $this->input;

            $diagnosa     = $i->post('diagnosa');
            $tindakan     = $i->post('tindakan');
            $rujukan     = $i->post('rujukan');

            $data = array(
                'ID_PEMERIKSAAN'        => $id,
                'ID_USER'        => $this->session->userdata('id_user'),
                'DIAGNOSA'        => $diagnosa,
                'TINDAKAN'        => $tindakan,
                'RUJUKAN'        => $rujukan
            );

            $this->m_periksa->tambah('REKAMMEDIS', $data);
            $id_rekam_medis = $this->m_periksa->last_id()->row()->ID;

            $data_pembayaran = array(
                'ID_REKAM_MEDIS'        => $id_rekam_medis,
                'ID_USER'        => $this->session->userdata('id_user'),
                'TGL_BAYAR'        => strtoupper(date('d-M-y')),
                // harga jasa 
                'TOTAL_BAYAR'        => 100000,
                'STATUS_BAYAR'        => 'pending'
            );

            $this->m_periksa->tambah('PEMBAYARAN', $data_pembayaran);


            $this->session->set_flashdata('sukses', 'Obat untuk Pasien?');
            redirect(base_url('obat/pasien/'.$id_rekam_medis));

        }
    }


    // public function hapus($id=null)
    // {
    //     if($id=="") show_404();

    //     $this->m_pasien->hapus('pasien', $id);

    //     $this->session->set_flashdata('sukses', 'Pasien Berhasil Dihapus!');
    //     redirect(base_url('pasien'));

    // }
}
