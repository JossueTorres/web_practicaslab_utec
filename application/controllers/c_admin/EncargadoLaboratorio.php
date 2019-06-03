<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EncargadoLaboratorio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$tip = (int)$this->session->userdata("usrtipo");
		//verificar la session de usuario
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		} else if ($tip != 1) {
			redirect(base_url());
		}
	}
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('admin/encargados');
		$this->load->view('layouts/footer');
	}

	public function indexAsignarLab()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('admin/asignar_laboratorios');
		$this->load->view('layouts/footer');
	}
}
