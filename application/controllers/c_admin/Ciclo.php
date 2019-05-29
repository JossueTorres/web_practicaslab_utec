<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciclo extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			//verificar la session de usuario
				//verificar la session de usuario
			if(!$this->session->userdata("login")){
					redirect(base_url());
			}

		}


	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('admin/ciclos');
		$this->load->view('layouts/footer');
	}
}