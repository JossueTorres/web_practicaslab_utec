<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Encargado_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/EncargadoModel");
    }

    public function listEncargados_post()
    {
        //ponemos lo que venga de los filtros;
        $codigo = $this->post("cod");
        $nombre = $this->post("nom");      
        $data = array(
            'cod' => (int)$codigo,
            'nom' => $nombre,            
        );
        $list = $this->EncargadoModel->getListaEncargados($data);
        if(!is_null($list)){
            $this->response(array('resp' => $list),200);
        }else {

            $this->response(array('resp'=>'No hay registros'),404);

        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $codigo = $this->post("cod");
        $nombre = $this->post("nom");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' => (int)$codigo,
            'nom' => $nombre,
        );
        if ($this->EncargadoModel->guardarDatos($codigo, $data))
            $this->response(array('status' => 'Registro se guardo correctamente'));
        else
            $this->response(array('status' => 'fallo'));
    }

    function borrarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $codigo = $this->post("cod");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' =>  (int)$codigo,
            'nom' => '',
        );

        if ($this->EncargadoModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
