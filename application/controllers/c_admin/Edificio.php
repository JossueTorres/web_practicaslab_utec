<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edificio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//verificar la session de usuario
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		$_param = array(
			'cod' => 0,
			'nom' => $this->input->post("txtNomFil"),
			'acr' => $this->input->post("txtAcrFil"),
			'est' => $this->input->post("ddlEstFil"),
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
		$url = URLWS . 'Edificio/Listado/';
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
		//_________________________________________________________________
		$data = json_decode(curl_exec($ch));		
		//cerramos el Curl
		curl_close($ch);
		//_________________________________________________________________


		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('admin/edificios', $data);
		$this->load->view('layouts/footer');
		
	}
}
