<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControlLaboratorioMaquinas extends CI_Controller
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

			$codigo = $this->input->post("lblcodlab");
			$nombre = $this->input->post("lblnomlab");
			$Mostrar = true;
			if ($codigo == 0) {
				$Mostrar =false;
			}
			//$_param = $val->p;
			
				//$codigo = 1;
				//$nombre = "benito";
			
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


			$postData = '';
			//Creamos arreglo nombre/valor separado por &
			foreach ($_param as $k => $v) {
				$postData .= $k . '=' . $v . '&';
			}
			rtrim($postData, '&');
			//_________________________________________________________________


			//_________________________________________________________________
			//Recojo y arreglo los parametros
				$url = URLWS . 'Maquina/Listado';
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
			$data["lista1"] = json_decode(curl_exec($ch));
			//cerramos el Curl
			$data["lista2"] =array($nombre);
			//_________________________________________________________________
			//
		
		//$data["Lista2"]=array('a'=>0,'b'=>0,'c'=>0);
		curl_close($ch);
		if ($Mostrar == false) {
			redirect(base_url("Admin/Laboratorios"));		
		}
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('layouts/nav');
		$this->load->view('admin/laboratorioMaquinas', $data);			
		$this->load->view('layouts/footer');
	}

	
}
