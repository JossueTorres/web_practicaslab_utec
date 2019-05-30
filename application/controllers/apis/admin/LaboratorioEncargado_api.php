<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class LaboratorioEncargado_api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/LaboratorioEncargadoModel");
    }

    public function listLaboratoriosEncargados_post()
    {
        //ponemos lo que venga de los filtros;    
        $enc = $this->post("enc");
        $lab = $this->post("lab");
        $est = $this->post("est");
        $data = array(
            'enc' => (int)$enc,
            'lab' => (int)$lab,
            'est' => $est,
            'e' => 0,
            'l' => 0,
        );
        $list = $this->LaboratorioEncargadoModel->getListalaboratoriosEncargados($data);
        if (!is_null($list)) {
            $this->response(array('resp' => $list), 200);
        } else {

            $this->response(array('resp' => 'No hay registros'), 404);
        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $e = $this->post("e");
        $l = $this->post("l");

        $codenc = $this->post("enc");
        $codlab = $this->post("lab");
        $est = $this->post("est");
        $id = array(
            'e' => $codenc,
            'l' => $codlab,
        );
        $data = array(
            'codenc' => $codenc,
            'codlab' => $codlab,
            'est' => $est,
            'e' => $e,
            'l' => $l,
        );
        if ($this->LaboratorioEncargadoModel->guardarDatos($id, $data))
            $this->response(array('status' => 'Registro se guardo correctamente'));
        else
            $this->response(array('status' => 'fallo'));
    }

    // este verbo si hace un delete como tal en la bd, en nuestros cruds no se va a eliminar info pero dejo el metodo de ejemplo
    // implementado  por si algun requerimeinto lo america utilizar
    function borrarDatos_post()
    {
        $codenc = $this->post("e");
        $codlab = $this->post("l");
        $data = array(
            'codenc' => 0,
            'codlab' => 0,
            'est' => '',
            'e' => $codenc,
            'l' => $codlab,
        );
        if ($this->LaboratorioEncargadoModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
