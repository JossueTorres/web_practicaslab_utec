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
		$user = $this->input->post("txtUsr");
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		$_param = array(
			'usr' => $user,
			'cod' => 0,
			'nom' => '',
			'est' => '',
			'con' => '',
			'tip' => 0,
			'fcod' => '',
		);
		$postData = '';
		//Creamos arreglo nombre/valor separado por &
		foreach ($_param as $k => $v) {
			$postData .= $k . '=' . $v . '&';
		}
		rtrim($postData, '&');
		//_________________________________________________________________
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		$url = URLWS . 'Usuario/Listado';
		//_________________________________________________________________
		//_________________________________________________________________
		//creamos nuevo recurso cURL y su Conf (Esto mejor que ni se toque siempre va)
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, USERAGENTWS);
		curl_setopt($ch, CURLOPT_COOKIE, COOKIECURL);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
		curl_setopt($ch, CURLOPT_POST, count($_param));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		//_________________________________________________________________
		//Obtenemos el resultado    
		$result = json_decode(curl_exec($ch));
		//cerramos el Curl
		curl_close($ch);
		$objusr = $result->resp;
		$usrusuario = $objusr[0]->usr_usuario;
		$usrnombre = $objusr[0]->usr_nombre;
		$codtip = (int)$objusr[0]->usr_codtip;
		// echo($result);
		// var_dump($result->resp[0]->usr_codtip);
		// var_dump((int)$objusr[0]->usr_codtip);
		if ($codtip > 0) {
			$login = true;
		} else
			$login = false;

		//si el nombre de usuario ingresado es correcto enviarlo al controlador Dashboard
		if ($login == true) {
			$data  = array(
				'usrcorreo' => $usrusuario,
				'usrnombre' => $usrnombre,
				'usrtipo' => $codtip,
				'login' => $login,
			);
			$this->session->set_userdata($data);
			// $user =  $this->session->userdata("usuario");
			if ($codtip == 1)
				redirect(base_url('Admin/Inicio'));
			else if ($codtip == 2)
				redirect(base_url('Lab/Inicio'));
			else if ($codtip == 4)
				redirect(base_url('Alumno/Inicio'));
		} //else
		//redirect(base_url());
	}

	public function logout()
	{
		session_start();
		session_unset();
		session_destroy();
		redirect(base_url('/Login'));
	}
}
