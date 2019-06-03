<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$tip = (int)$this->session->userdata("usrtipo");
		//verificar la session de usuario
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		} else if ($tip != 2) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('laboratorio/inicio');
		$this->load->view('layouts/footer');
	}
}
