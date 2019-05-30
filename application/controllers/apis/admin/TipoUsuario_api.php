<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class TipoUsuario_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/TipoUsuarioModel");
    }

    public function listTiposUsuarios_post()
    {
        //ponemos lo que venga de los filtros;
        $codigo = $this->input->post("cod");
        $nombre = $this->input->post("nom");       
        $data = array(
            'cod' => (int)$codigo,
            'nom' => $nombre,            
        );
        $list = $this->TipoUsuarioModel->getListaTipoUsuarios($data);
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
        if ($this->TipoUsuarioModel->guardarDatos($codigo, $data))
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
        );

        if ($this->TipoUsuarioModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
