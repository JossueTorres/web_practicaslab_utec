<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Practica extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $tip = $this->session->userdata("usrtipo");
		//verificar la session de usuario
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		} else if ($tip != 'estudiante') {
			redirect(base_url());
		}
  }

  public function index()
  {
    $this->load->view('layouts/header');
    $this->load->view('layouts/aside');
    $this->load->view('layouts/nav');
    $this->load->view('estudiante/practicas');
    $this->load->view('layouts/footer');
  }
}
