<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Exclusion_api extends REST_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->database();
		$this->load->model("m_laboratorio/ExclusionModel");
	}

	public function listExclusion_post()
	{
		//ponemos lo que venga de los filtros;
		$cod = $this->post("cod");
		$lab = $this->post("lab");
		$fec = $this->post("fec");
		$data = array(
			'cod' => (int)$cod,
			'nom' => (int)$lab,
			'acr' => $fec,
		);

		$list = $this->ExclusionModel->getListaExclusiones($data);
		if (!is_null($list)) {
			$this->response(array('resp' => $list), 200);
		} else {

			$this->response(array('resp' => 'No hay registros'), 404);
		}
	}

	public function guardarDatos_post()
	{
		//recibir los names de input desde la vista por post
		$cod = $this->post("cod");
		$lab = $this->post("lab");
		$fec = $this->post("fec");
		$data = array(
			'cod' => (int)$cod,
			'nom' => (int)$lab,
			'acr' => $fec,
		);
		if ($this->ExclusionModel->guardarDatos($cod, $data))
			$this->response(array('status' => 'Registro se guardo correctamente'));
		else
			$this->response(array('status' => 'fallo'));
	}


	// este verbo si hace un delete como tal en la bd, en nuestros cruds no se va a eliminar info pero dejo el metodo de ejemplo
	// implementado  por si algun requerimeinto lo america utilizar

	function borrarDatos_post()
	{
		//recibir los names de input desde la vista por post
		$cod = $this->post("cod");
		$data = array(
			'cod' => (int)$cod,
			'lab' => 0,
			'fec' => '',
		);

		if ($this->ExclusionModel->borrarDatos($data))
			$this->response(array('status' => 'Eliminado con exito'));
		else
			$this->response(array('status' => 'fallo'));
	}
}
