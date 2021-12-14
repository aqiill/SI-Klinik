<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_login']);
        $this->load->helper(array('form', 'url'));
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

            $data = array(
                'title'        => 'Ganti Password',
                'isi'        => 'v_gantipass'
            );
            $this->load->view('layout/wrapper', $data);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $password_konf = $this->input->post('password_konf');

            $cek = $this->m_login->gantipass('user', sha1($password_lama));

            if ($cek->num_rows() > 0) {
                if ($password_baru != $password_konf) {
                    $this->session->set_flashdata('gagal', "Konfirmasi Password Tidak Sama!");
                    redirect('setting/changepass');
                } else {
                    $id_user = $this->session->userdata('id_user');
                    $data = array(
                        'password' => sha1($password_baru)
                    );
                    $this->m_login->update('user', $data, $id_user);
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
