<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_pasien','m_user','m_pembayaran']);
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
        elseif ($level != "administrator" && $level != "dokter" && $level != "petugas" && $level != "apoteker") {
            $this->session->set_flashdata('gagal', 'Akses dilarang!');
            redirect('beranda');
        }
    }

    public function index()
    {
        $pasien = $this->m_pasien->data('pasien')->num_rows();
        $dokter = $this->m_user->jlm_dokter('user')->num_rows();
        $pendapatan = $this->m_pembayaran->jlm_pendapatan('pembayaran')->result();
        $jlm_pendapatan = 0;
        foreach ($pendapatan as $value) {
            $jlm_pendapatan += $value->total_bayar;
        }
        $data = array(
            'title'        => 'Beranda',
            'pasien'        => $pasien,
            'dokter'        => $dokter,
            'jlm_pendapatan'        => $jlm_pendapatan,
            'isi'        => 'admin/v_beranda',
        );

        $this->load->view('layout/wrapper', $data);
    }

    public function pasien_add()
    {
        $data = array(
            'title'        => 'Pasien',
            'isi'        => 'admin/v_pasien_add',
        );
        $this->load->view('layout/wrapper', $data);
    }
}
