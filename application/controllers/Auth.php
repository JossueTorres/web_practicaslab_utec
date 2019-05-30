<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	//Constructor del controlador: aca se agregan referencias a modelos
	public function __construct()
	{
		parent::__construct();
	}

	//funcion principal
	public function index()
	{
		//verificar la session de usuario

		$this->load->view('login');
	}

	public function login()
	{
		//Temporal

		$user = $this->input->post("txtUsr");
		$pass = $this->input->post("txtPass");

		if ($user == "estudiante" || $user == "lab" || $user == "admin"){
			if ($pass == "123") {
				$login = true;
			}			
		}					
		else
			$login = false;

		//si el nombre de usuario ingresado es correcto enviarlo al controlador Dashboard
		if ($login == true) {
			$data  = array(
				'usuario' => $user,
				'login' => $login
			);
			$this->session->set_userdata($data);
			$user =  $this->session->userdata("usuario");
			if ($user == "estudiante")
				redirect(base_url() . "c_estudiante/Inicio");
			else if ($user == "admin")
				redirect(base_url() . "c_admin/Inicio");
			else if ($user == "lab")
				redirect(base_url() . "c_laboratorio/Inicio");
		} else
			redirect(base_url());
	}

	public function logout()
	{
		session_start();
		session_unset();
		session_destroy();
		redirect(base_url('/Login'));
	}
}
