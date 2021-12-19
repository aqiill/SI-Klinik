<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['m_login']);
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{

		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'username',
			'Username',
			'required',
			array(
				'required'        => ' Username harus diisi'
			)
		);

		$valid->set_rules(
			'password',
			'Password',
			'required',
			array(
				'required'        => ' Password harus diisi'
			)
		);



		if ($valid->run() === false) {

			$data = array(
				'title'		=> 'Login'
			);
			$this->load->view('v_login', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->m_login->login('user', $username, sha1($password));


			if ($cek->num_rows() > 0) {
				if ($cek->row()->level == "administrator") {
					$this->session->set_userdata('id_user', $cek->row()->id_user);
					$this->session->set_userdata('username', $cek->row()->username);
					$this->session->set_userdata('nik', $cek->row()->nik);
					$this->session->set_userdata('level', 'administrator');
					redirect('beranda');
				} elseif ($cek->row()->level == "dokter") {
					echo "anda login sebagai dokter";
				} elseif ($cek->row()->level == "petugas") {
					$this->session->set_userdata('id_user', $cek->row()->id_user);
					$this->session->set_userdata('username', $cek->row()->username);
					$this->session->set_userdata('nik', $cek->row()->nik);
					$this->session->set_userdata('level', 'administrator');
					redirect('beranda');
				} elseif ($cek->row()->level == "apoteker") {
					echo "anda login sebagai apoteker";
				}
			} else {
				$this->session->set_flashdata('gagal', "Username atau Password Salah!");
				redirect('login');
			}
		}
	}
}
