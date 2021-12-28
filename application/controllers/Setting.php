<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_user','m_login']);
        $this->load->helper(array('form', 'url'));
        $this->cek_login();
    }

    public function cek_login()
    {
        $level = $this->session->userdata('level');
        if ($this->session->userdata('username') == "") {
            $this->session->set_flashdata('gagal', 'Silahkan Login!');
            redirect('login');
        }
        elseif ($level != "administrator" && $level != "dokter" && $level != "petugas" && $level != "apoteker") {
            $this->session->set_flashdata('gagal', 'Silahkan Login!');
            redirect('login');
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');

        $profile = $this->m_user->detail('PENGGUNA', $id_user)->row();
        $data = array(
            'title'        => 'User',
            'profile'        => $profile,
            'isi'        => 'v_profile',
        );

        $this->load->view('layout/wrapper', $data);
    }

    public function edit($id=null)
    {
        if($id=="") show_404();

        $valid = $this->form_validation;
        
        $valid->set_rules(
            'nik',
            'NIK',
            'required|min_length[16]',
            array(
                'required'                       => 'NIK harus diisi',
                'min_length'                       => 'NIK minimal 16 digit angka!'
            )
        );
        
        $valid->set_rules(
            'nama',
            'Nama',
            'required',
            array(
                'required'                       => 'Nama harus diisi'
            )
        );
        
        $valid->set_rules(
            'alamat',
            'Alamat',
            'required',
            array(
                'required'                       => 'Alamat harus diisi'
            )
        );


        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('setting');
        } else {

            $data = array(
                'NIK'        => $this->input->post('nik'),
                'NAMA_USER'        => $this->input->post('nama'),
                'ALAMAT'        => $this->input->post('alamat')
            );

            $this->session->set_userdata('nik', $this->input->post('nik'));
            $this->m_user->edit('PENGGUNA', $data, $id);

            $this->session->set_flashdata('sukses', 'User Berhasil diperbaharui!');
            redirect(base_url('setting'));

        }
    }

    public function changepass()
    {

        //Validasi
        $valid = $this->form_validation;

        $valid->set_rules(
            'password_lama',
            'Password Lama',
            'required',
            array(
                'required'        => 'Password Lama harus diisi'
            )
        );

        $valid->set_rules(
            'password_baru',
            'Password Baru',
            'required|min_length[6]',
            array(
                'required'        => 'Password Baru harus diisi',
                'min_length'        => 'Password minimal 6 kombinasi karakter!'
            )
        );

        $valid->set_rules(
            'password_konf',
            'Konfirmasi Password',
            'required',
            array(
                'required'        => 'Konfirmasi Password harus diisi'
            )
        );



        if ($valid->run() === false) {
            $this->session->set_flashdata('gagal', validation_errors());
            $data = array(
                'title'        => 'Ganti Password',
                'isi'        => 'v_gantipass'
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $password_konf = $this->input->post('password_konf');

            $cek = $this->m_login->gantipass('PENGGUNA', sha1($password_lama));

            if ($cek->num_rows() > 0) {
                if ($password_baru != $password_konf) {
                    $this->session->set_flashdata('gagal', "Konfirmasi Password Tidak Sama!");
                    redirect('setting/changepass');
                } else {
                    $id_user = $this->session->userdata('id_user');
                    $data = array(
                        'PASSWORD' => sha1($password_baru)
                    );
                    $this->m_login->update('PENGGUNA', $data, $id_user);
                    $this->session->set_flashdata('sukses', "Password berhasil diubah!");
                    redirect('beranda');
                }
            } else {
                $this->session->set_flashdata('gagal', "Password Lama Salah!");
                redirect('setting/changepass');
            }
        }
    }
}
