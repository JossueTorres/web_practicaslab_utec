<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlLaboratorio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//verificar la session de usuario
		//verificar la session de usuario
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}


	public function index()
	{
		$param1 = array(

			'lab' => $this->input->post("txtcodlab"),
			'fil' => 0,
			'col' => 0,
			'est' => "",
			'ere' => "",
			'ali' => "",
			'l' => "",
			"f" => "",
			"c" => "",
		);
		$param2 = array(

			'cod' => 0,
			'edf' => 0,
			'acr' => "",
			'fil' => 0,
			'col' => 0,
			'lat' => 0,
			'lon' => 0,
			"nom" => "",
			"est" => "",
		);
		$R_Data = array(array("uri" => 'Maquina/Listado', "p" => $param1, "l" => 'Lista1'), array("uri" => 'Laboratorio/Listado'), "p" => $param2, "l" => 'Lista2');
		$cont = 1;
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		foreach ($R_Data as $val) {

			$codigo = $this->input->post("txtcodlab");
			//$_param = $val->p;
			if ($codigo == 0) {
				$codigo = 1;
			}
			if ($cont == 1) {
				$_param = array(

					'lab' => (int)$codigo,
					'fil' => 0,
					'col' => 0,
					'est' => "",
					'ere' => "",
					'ali' => "",
					'l' => 0,
					"f" => 0,
					"c" => 0,
				);
			} else {

				$_param = array(

					'cod' => 0,
					'edf' => 0,
					'acr' => "",
					'fil' => 0,
					'col' => 0,
					'lat' => 0,
					'lon' => 0,
					"nom" => "",
					"est" => "",
				);
			}


			$postData = '';
			//Creamos arreglo nombre/valor separado por &
			foreach ($_param as $k => $v) {
				$postData .= $k . '=' . $v . '&';
			}
			rtrim($postData, '&');
			//_________________________________________________________________


			//_________________________________________________________________
			//Recojo y arreglo los parametros
			if ($cont == 1) {
				$url = URLWS . 'Maquina/Listado';
			} else {
				$url = URLWS .  'Laboratorio/Listado';
			}
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
			$data['Lista' . $cont] = json_decode(curl_exec($ch));
			//cerramos el Curl

			//_________________________________________________________________
			//
			$cont++;
		}
		//$data["Lista2"]=array('a'=>0,'b'=>0,'c'=>0);
		curl_close($ch);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('laboratorio/laboratorios', $data);
		$this->load->view('layouts/footer');
	}

	public function CambioEstadoMaquina()
	{
		$R_Data = array(array("uri" => 'Maquina/Listado', "l" => 'Lista1'), array("uri" => 'Laboratorio/Listado'), "l" => 'Lista2');
		$cont = 1;
		$codigo = $this->input->post("txtcodmaq_lab");
		$fil = $this->input->post("txtcodmaq_fil");
		$col = $this->input->post("txtcodmaq_col");
		$est = $this->input->post("txtmaqEstado");

		$_param = array(

			'lab' => $codigo,
			'fil' => $fil,
			'col' => $col,
			'est' => "A",
			'ere' => $est,
			'ali' => "",
			'l' => $codigo,
			"f" => $fil,
			"c" => $col,
		);

		$postData = '';
		//Creamos arreglo nombre/valor separado por &
		foreach ($_param as $k => $v) {
			$postData .= $k . '=' . $v . '&';
		}
		rtrim($postData, '&');

		$url = URLWS . 'Maquina/guardarDatos';
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
		$data['Lista5'] = json_decode(curl_exec($ch));
		//_________________________________________________________________
		//Recojo y arreglo los parametros
		foreach ($R_Data as $val) {
			//$_param = $val->p;
			if ($codigo == 0) {
				$codigo = 1;
			}
			if ($cont == 1) {
				$_param = array(

					'lab' => $codigo,
					'fil' => 0,
					'col' => 0,
					'est' => "",
					'ere' => "",
					'ali' => "",
					'l' => "",
					"f" => "",
					"c" => "",
				);
			} else {

				$_param = array(

					'cod' => 0,
					'edf' => 0,
					'acr' => "",
					'fil' => 0,
					'col' => 0,
					'lat' => 0,
					'lon' => 0,
					"nom" => "",
					"est" => "",
				);
			}
			$postData = '';
			//Creamos arreglo nombre/valor separado por &
			foreach ($_param as $k => $v) {
				$postData .= $k . '=' . $v . '&';
			}
			rtrim($postData, '&');
			//_________________________________________________________________


			//_________________________________________________________________
			//Recojo y arreglo los parametros
			if ($cont == 1) {
				$url = URLWS . 'Maquina/Listado';
			} else {
				$url = URLWS .  'Laboratorio/Listado';
			}
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
			$data['Lista' . $cont] = json_decode(curl_exec($ch));
			//cerramos el Curl

			//_________________________________________________________________
			//
			$cont++;
		}
		//$data["Lista2"]=array('a'=>0,'b'=>0,'c'=>0);
		curl_close($ch);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('laboratorio/laboratorios', $data);
		$this->load->view('layouts/footer');
	}
}
