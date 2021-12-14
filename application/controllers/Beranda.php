<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model(['']);
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        if ($this->session->userdata('level') == "administrator") {
            $data = array(
                'title'        => 'Beranda',
                'isi'        => 'admin/v_beranda',
            );
        }

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
