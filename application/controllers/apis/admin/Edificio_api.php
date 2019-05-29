<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Edificio_api extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/EdificioModel");
    }

    public function listEdificios_post()
    {
        //ponemos lo que venga de los filtros;
        $codigo = $this->post("cod");
        $nombre = $this->post("nom");
        $acronimo = $this->post("acr");
        $estado = $this->post("est");
        $data = array(
            'cod' => (int)$codigo,
            'nom' => $nombre,
            'acr' => $acronimo,
            'est' => $estado,
        );

        $list = $this->EdificioModel->getListaEdificios($data);
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
        $acronimo = $this->post("acr");
        $estado = $this->post("est");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' => (int)$codigo,
            'nom' => $nombre,
            'acr' => $acronimo,
            'est' => $estado,
        );
        if ($this->EdificioModel->guardarDatos($codigo, $data))
            $this->response(array('status' => 'Registro se guardo correctamente'));
        else
            $this->response(array('status' => 'fallo'));
    }


    // este verbo si hace un delete como tal en la bd, en nuestros cruds no se va a eliminar info pero dejo el metodo de ejemplo
    // implementado  por si algun requerimeinto lo america utilizar

    function borrarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $codigo = $this->post("cod");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' =>  (int)$codigo,
            'nom' => '',
            'acr' => '',
            'est' => '',
        );

        if ($this->EdificioModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
