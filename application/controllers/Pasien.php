<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_pasien']);
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
        $pasien = $this->m_pasien->data('PASIEN')->result();
        $data = array(
            'title'        => 'User',
            'pasien'        => $pasien,
            'isi'        => 'admin/v_pasien',
        );

        $this->load->view('layout/wrapper', $data);
    }

    public function rekam_medis($id)
    {
        if ($id=="") show_404();

        $pasien = $this->m_pasien->detail('PASIEN',$id)->row();
        $rekam_medis = $this->m_pasien->rekam_medis('PASIEN',$id)->result();
        $data = array(
            'title'        => 'Rekam Medis',
            'pasien'        => $pasien,
            'rekam_medis'        => $rekam_medis,
        );

        $this->load->view('admin/v_rekam_medis', $data);
    }


    public function tambah()
    {
        $valid = $this->form_validation;
        
        $valid->set_rules(
            'nik_pasien',
            'NIK',
            'required|min_length[16]|is_unique[PASIEN.NIK_PASIEN]',
            array(
                'required'                       => 'NIK harus diisi',
                'min_length'                       => 'NIK minimal 16 digit!',
                'is_unique'                       => 'Pasien dengan NIK '.$this->input->post('nik_pasien').' sudah terdaftar!'
            )
        );
        
        $valid->set_rules(
            'nama_pasien',
            'Nama pasien',
            'required',
            array(
                'required'                       => 'Nama pasien harus diisi'
            )
        );
        
        $valid->set_rules(
            'umur_pasien',
            'Umur Pasien',
            'required|numeric',
            array(
                'required'                       => 'Umur Pasien harus diisi',
                'numeric'                       => 'Umur Pasien harus diisi bilangan bulat!'
            )
        );
        
        $valid->set_rules(
            'alamat_pasien',
            'Alamat Pasien',
            'required',
            array(
                'required'                       => 'Alamat Pasien harus diisi'
            )
        );
        
        $valid->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required|in_list[laki-laki,perempuan]',
            array(
                'required'                       => 'Jenis Kelamin harus diisi',
                'in_list'                       => 'Pilihan Jenis Kelamin hanya Laki-laki/Perempuan'
            )
        );
        


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('pasien');
        } else {

            $i = $this->input;

            $nik_pasien      = $i->post('nik_pasien');
            $nama_pasien     = $i->post('nama_pasien');
            $umur_pasien     = $i->post('umur_pasien');
            $alamat_pasien     = $i->post('alamat_pasien');
            $jenis_kelamin     = $i->post('jenis_kelamin');

            $data = array(
                'NIK_PASIEN'        => $nik_pasien,
                'NAMA_PASIEN'        => $nama_pasien,
                'UMUR_PASIEN'        => $umur_pasien,
                'ALAMAT_PASIEN'        => $alamat_pasien,
                'JENIS_KELAMIN'        => $jenis_kelamin
            );

            $this->m_pasien->tambah('PASIEN', $data);

            $this->session->set_flashdata('sukses', 'Pasien Berhasil Ditambahkan!');
            redirect(base_url('pasien'));

        }
    }


    public function edit($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        $valid->set_rules(
            'nik_pasien',
            'NIK',
            'required|min_length[16]',
            array(
                'required'                       => 'NIK harus diisi',
                'min_length'                       => 'NIK minimal 16 digit!'
            )
        );
        
        $valid->set_rules(
            'nama_pasien',
            'Nama pasien',
            'required',
            array(
                'required'                       => 'Nama pasien harus diisi'
            )
        );
        
        $valid->set_rules(
            'umur_pasien',
            'Umur Pasien',
            'required|numeric',
            array(
                'required'                       => 'Umur Pasien harus diisi',
                'numeric'                       => 'Umur Pasien harus diisi bilangan bulat!'
            )
        );
        
        $valid->set_rules(
            'alamat_pasien',
            'Alamat Pasien',
            'required',
            array(
                'required'                       => 'Alamat Pasien harus diisi'
            )
        );
        
        $valid->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required|in_list[laki-laki,perempuan]',
            array(
                'required'                       => 'Jenis Kelamin harus diisi',
                'in_list'                       => 'Pilihan Jenis Kelamin hanya Laki-laki/Perempuan'
            )
        );
        


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('pasien');
        } else {

            $i = $this->input;

            $nik_pasien      = $i->post('nik_pasien');
            $nama_pasien     = $i->post('nama_pasien');
            $umur_pasien     = $i->post('umur_pasien');
            $alamat_pasien     = $i->post('alamat_pasien');
            $jenis_kelamin     = $i->post('jenis_kelamin');

            $data = array(
                'NIK_PASIEN'        => $nik_pasien,
                'NAMA_PASIEN'        => $nama_pasien,
                'UMUR_PASIEN'        => $umur_pasien,
                'ALAMAT_PASIEN'        => $alamat_pasien,
                'JENIS_KELAMIN'        => $jenis_kelamin
            );

            $this->m_pasien->edit('PASIEN', $data, $id);

            $this->session->set_flashdata('sukses', 'Pasien Berhasil diubah!');
            redirect(base_url('pasien'));

        }
    }


    public function hapus($id=null)
    {
        if($id=="") show_404();

        $this->m_pasien->hapus('PASIEN', $id);

        $this->session->set_flashdata('sukses', 'Pasien Berhasil Dihapus!');
        redirect(base_url('pasien'));

    }
}
