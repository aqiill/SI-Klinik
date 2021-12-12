<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model(['']);
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
			// proses login disini
			redirect('beranda');
		}
	}
}
