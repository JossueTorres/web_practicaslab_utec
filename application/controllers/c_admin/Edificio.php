<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edificio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$tip = $this->session->userdata("usrtipo");
		//verificar la session de usuario
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		} else if ($tip != 'admin') {
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
		$url = URLWS . 'Edificio/Listado';
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

	public function guardarDatos()
	{
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		$_param = array(
			'cod' => $this->input->post("codedf"),
			'nom' => $this->input->post("txtNom"),
			'acr' => $this->input->post("txtAcr"),
			'est' => $this->input->post("ddlEst"),
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
		$url = URLWS . 'Edificio/guardarDatos';
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
		// echo $data;
		header('location:' . base_url('Admin/Edificios'));
	}

	public function borrarDatos()
	{
		$ids = $this->input->post("chkBorrar");
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		$url = URLWS . 'Edificio/borrarDatos';
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
		curl_setopt($ch, CURLOPT_POST, 4);
		//_________________________________________________________________

		foreach ($ids as $id) {
			$postData =  'cod=' . $id . '&nom=&acr=&est=';
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			curl_exec($ch);
		}
		//_________________________________________________________________				
		//Obtenemos el resultado
		//_________________________________________________________________
		// $data = json_decode(curl_exec($ch));
		//cerramos el Curl
		curl_close($ch);
		//_________________________________________________________________
		header('location:' . base_url('Admin/Edificios'));
	}
}
