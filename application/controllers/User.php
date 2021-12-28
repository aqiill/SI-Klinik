<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_user']);
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
        elseif ($level != "administrator") {
            $this->session->set_flashdata('gagal', 'Akses dilarang!');
            redirect('beranda');
        }
    }

    public function index()
    {
        $user = $this->m_user->data('PENGGUNA')->result();
        $data = array(
            'title'        => 'User',
            'user'        => $user,
            'isi'        => 'admin/v_user',
        );

        $this->load->view('layout/wrapper', $data);
    }


    public function tambah()
    {
        $valid = $this->form_validation;
        $valid->set_rules(
            'username',
            'Username',
            'required|is_unique[PENGGUNA.USERNAME]',
            array(
                'required'        => 'Username harus diisi',
                'is_unique'       => 'Username '.$this->input->post('username').' sudah digunakan!',
            )
        );
        
        $valid->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array(
                'required'                       => 'Password harus diisi',
                'min_length'                     => 'Panjang Password minimal 6 Karakter Kombinasi Huruf dan Angka',
            )
        );
        
        $valid->set_rules(
            'level',
            'Level',
            'required',
            array(
                'required'                       => 'Level harus diisi'
            )
        );


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('user');
        } else {

            $i = $this->input;

            $username      = $i->post('username');
            $password     = $i->post('password');
            $level     = $i->post('level');

            $data = array(
                'NIK'       => '',
                'USERNAME'       => $username,
                'PASSWORD'        => sha1($password),
                'NAMA_USER'        => '',
                'ALAMAT'        => '',
                'LEVEL'        => $level,
            );

            $this->m_user->tambah('PENGGUNA', $data);

            $this->session->set_flashdata('sukses', 'User Berhasil Ditambahkan!');
            redirect(base_url('user'));

        }
    }


    public function edit($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        $valid->set_rules(
            'level',
            'Level',
            'required',
            array(
                'required'                       => 'Level harus diisi'
            )
        );


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('user');
        } else {

            $data = array(
                'LEVEL'        => $this->input->post('level')
            );

            $this->m_user->edit('PENGGUNA', $data, $id);

            $this->session->set_flashdata('sukses', 'User Berhasil diubah!');
            redirect(base_url('user'));

        }
    }


    public function hapus($id=null)
    {
        if($id=="") show_404();

        $this->m_user->hapus('PENGGUNA', $id);

        $this->session->set_flashdata('sukses', 'User Berhasil Dihapus!');
        redirect(base_url('user'));

    }
}
