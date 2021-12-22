<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periksa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_periksa','m_obat']);
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $level = $this->session->userdata('level');

        if ($level=="petugas") {
            $periksa = $this->m_periksa->data_petugas('pemeriksaan',$id_user)->result();
        }
        elseif ($level =="administrator" || $level =="dokter" ) {
            $periksa = $this->m_periksa->data('pemeriksaan')->result();            
        }


        $data = array(
            'title'        => 'Pemeriksaan',
            'periksa'        => $periksa,
            'isi'        => 'petugas/v_data_pemeriksaan'
        );

        $this->load->view('layout/wrapper', $data);


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
            $this->session->set_flashdata('gagal', validation_errors());

            $edit_status = array(
                'status_pemeriksaan' => 'dokter'
            );

            $this->m_periksa->edit('pemeriksaan',$edit_status,$id);

            $pasien = $this->m_periksa->cek_pasien('pemeriksaan',$id)->row();

            $data = array(
                'title'        => 'Pemeriksaan',
                'pasien'        => $pasien,
                'isi'        => 'dokter/v_tindakan',
            );

            $this->load->view('layout/wrapper', $data);
        } else {

            $i = $this->input;

            $id_antrian      = $id;
            $tekanan_darah     = $i->post('tekanan_darah');
            $suhu_badan     = $i->post('suhu_badan');
            $keluhan     = $i->post('keluhan');

            $data = array(
                'id_antrian'        => $id_antrian,
                'tekanan_darah'        => $tekanan_darah,
                'suhu_badan'        => $suhu_badan,
                'keluhan'        => $keluhan,
                'status_pemeriksaan'        => 'petugas'
            );

            $this->m_antrian->tambah('pemeriksaan', $data);

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
                'id_pemeriksaan'        => $id,
                'id_user'        => $this->session->userdata('id_user'),
                'diagnosa'        => $diagnosa,
                'tindakan'        => $tindakan,
                'rujukan'        => $rujukan
            );

            $this->m_periksa->tambah('rekammedis', $data);
            $id_rekam_medis = $this->db->insert_id();

            $data_pembayaran = array(
                'id_rekam_medis'        => $id_rekam_medis,
                'id_user'        => $this->session->userdata('id_user'),
                'tgl_bayar'        => date('Y-m-d'),
                // harga jasa 
                'total_bayar'        => 100000,
                'status_bayar'        => 'pending'
            );

            $this->m_periksa->tambah('pembayaran', $data_pembayaran);


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
