<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProgramarPractica extends CI_Controller
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
		$_param = array(
			'cod' => 0,
			'lab' => $this->session->userdata("usrlab"),
			'fini' => '',
			'hini' => '',
			'ffin' => '',
			'hfin' => '',
			'lun' => 0,
			'mar' => 0,
			'mie' => 0,
			'jue' => 0,
			'vie' => 0,
			'sab' => 0,
			'dom' => 0,
		);
		//_________________________________________________________________
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		$url = URLWS . 'Config/Listado';
		//_________________________________________________________________
		$postData = '';
		//Creamos arreglo nombre/valor separado por &
		foreach ($_param as $k => $v) {
			$postData .= $k . '=' . $v . '&';
		}
		rtrim($postData, '&');
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

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('laboratorio/practicas', $data);
		$this->load->view('layouts/footer');
	}

	public function guardarDatos()
	{
		$chk = $this->input->post('chkD');
		$l = 1; $m = 1; $x= 1; $j = 1; $v = 1; $s = 1; $d = 1;
		foreach ($chk as $val) {
			if ($val == 1) {
				$l = 2;
			}
			if ($val == 2) {
				$m = 2;
			}
			if ($val == 3) {
				$x = 2;
			}
			if ($val == 4) {
				$j = 2;
			}
			if ($val == 5) {
				$v = 2;
			}
			if ($val == 6) {
				$s = 2;
			}
			if ($val == 7) {
				$d = 2;
			}
		}		
		// var_dump($data);
		//_________________________________________________________________
		//Recojo y arreglo los parametros		
		$_param = array(
			'cod' => $this->input->post('codcop'),
			'lab' => $this->session->userdata("usrlab"),
			'fini' => $this->input->post('txtFini'),
			'hini' => $this->input->post('txtHini'),
			'ffin' => $this->input->post('txtFfin'),
			'hfin' => $this->input->post('txtHfin'),
			'l'=> $l,
			'm'=> $m,
			'x'=> $x,
			'j'=> $j,
			'v'=> $v,
			's'=> $s,
			'd'=> $d,
		);
		$postData = '';
		//Creamos arreglo nombre/valor separado por &
		foreach ($_param as $k => $va) {
			$postData .= $k . '=' . $va . '&';
		}
		rtrim($postData, '&');
		//_________________________________________________________________

		//_________________________________________________________________
		//Recojo y arreglo los parametros
		$url = URLWS . 'Config/guardarDatos';
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
		curl_exec($ch);
		//cerramos el Curl
		curl_close($ch);
		//_________________________________________________________________
		// echo $data;
		header('location:' . base_url('Lab/Practicas'));
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
		header('location:' . base_url('Edificios'));
	}
}
