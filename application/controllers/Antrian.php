<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_pasien','m_antrian']);
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
        elseif ($level != "administrator" && $level != "petugas") {
            $this->session->set_flashdata('gagal', 'Akses dilarang!');
            redirect('beranda');
        }
    }

    public function index()
    {
        $nik = $this->input->post('nik');
        $level = $this->session->userdata('level');
        $cari = $this->m_pasien->detail_nik('PASIEN',$nik)->row();
        
        if ($level=="administrator") {
            $antrian = $this->m_antrian->data('ANTRIAN')->result();
        }else{
            $antrian = $this->m_antrian->data_now('ANTRIAN')->result();            
        }

        if (isset($_GET['cari'])) {
            if ($cari=="") {
                $this->session->set_flashdata('cari_pasien','Data Tidak Ditemukan!');
                redirect('antrian');
            }
        }

        $data = array(
            'title'        => 'User',
            'antrian'        => $antrian,
            'cari'        => $cari,
            'isi'        => 'petugas/v_antrian',
        );

        // echo "<pre>";
        // print_r($antrian);
        // echo "</pre>";
        $this->load->view('layout/wrapper', $data);


    }


    public function tambah($id=null)
    {
        if ($id=="") show_404();

        $cek = $this->m_antrian->cek('ANTRIAN')->row();

        if ($cek->NO_ANTRIAN=="") {
            $no_antrian = 'K0001';
        }
        else{
            $urut = (int) substr($cek->NO_ANTRIAN, 1, 4);
            $urut++;
            $no_antrian = sprintf("K%04s", $urut);
        }

        $today = strtoupper(date('d-M-y'));
        $cek_today = $this->m_antrian->cek_pasien('ANTRIAN',$id,$today)->num_rows();

        if ($cek_today>0) {
            $this->session->set_flashdata('cari_pasien', 'Pasien Tersebut Sudah Terdaftar Hari Ini!');
            redirect(base_url('antrian'));
        }
        else{
            $data_antrian = array(
                'NO_ANTRIAN'        => $no_antrian,
                'ID_PASIEN'        => $id,
                'ID_USER'        => $this->session->userdata('id_user'),
                'TGL_CHECKUP'        => $today,
                'STATUS_ANTRIAN'        => 'antrian'
            );

            $this->m_antrian->tambah('ANTRIAN', $data_antrian);

            $this->session->set_flashdata('antrian_pasien', 'Antrian '.$no_antrian.' Berhasil Ditambahkan!');
            redirect(base_url('antrian'));
        }
        // $id_antrian = $this->db->insert_id();

        // $data_pemeriksaan = array(
        //     'id_antrian'        => $id_antrian,
        //     'tekanan_darah'        => '',
        //     'suhu_badan'        => '',
        //     'keluhan'        => '',
        // );

        // $this->m_antrian->tambah('pemeriksaan', $data_antrian);
        // $id_pemeriksaan = $this->db->insert_id();

        // $data_rekam_medis = array(
        //     'id_pemeriksaan'        => $id_pemeriksaan,
        //     'id_user'        => '',
        //     'diagnosa'        => '',
        //     'tindakan'        => '',
        //     'rujukan'        => '',
        // );


        // $this->m_pasien->tambah('pasien', $data);


    }


    public function periksa($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        
        $valid->set_rules(
            'tekanan_darah',
            'Tekanan Darah',
            'required',
            array(
                'required'                       => 'Tekanan Darah harus diisi'
            )
        );

        $valid->set_rules(
            'suhu_badan',
            'Suhu Badan',
            'required',
            array(
                'required'                       => 'Suhu Badan harus diisi'
            )
        );

        $valid->set_rules(
            'keluhan',
            'Keluhan',
            'required',
            array(
                'required'                       => 'Keluhan harus diisi'
            )
        );
        
        


        if ($valid->run() === false) {
            $cek_pemeriksaan = $this->m_antrian->cek_pemeriksaan('PEMERIKSAAN',$id)->num_rows();

            if ($cek_pemeriksaan>0) {
                $this->session->set_flashdata('gagal', 'Pasien sudah diperiksa oleh petugas!');
                redirect(base_url('antrian'));
            }
            else{

                $this->session->set_flashdata('gagal', validation_errors());

                $edit_status = array(
                    'STATUS_ANTRIAN' => 'pemeriksaan',
                    'ID_USER' => $this->session->userdata('id_user')
                );

                $this->m_antrian->edit('ANTRIAN',$edit_status,$id);

                $data_pasien = $this->m_antrian->cek_data_pasien('ANTRIAN',$id)->row();

                $data = array(
                    'title'        => 'Pemeriksaan',
                    'data'        => $data_pasien,
                    'isi'        => 'petugas/v_pemeriksaan',
                );

                // echo "<pre>";
                // print_r($data_pasien);
                // echo "</pre>";
                // die();
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


    // public function hapus($id=null)
    // {
    //     if($id=="") show_404();

    //     $this->m_pasien->hapus('pasien', $id);

    //     $this->session->set_flashdata('sukses', 'Pasien Berhasil Dihapus!');
    //     redirect(base_url('pasien'));

    // }
}
