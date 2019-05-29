<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Maquina_api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/MaquinaModel");
    }

    public function listMaquinas_post()
    {
        //ponemos lo que venga de los filtros;
        $codlab = $this->post("lab");
        $fil = $this->post("fil");
        $col = $this->post("col");
        $est = $this->post("est");
        $ere = $this->post("ere");
        $ali = $this->post("ali");
        $data = array(
            'lab' => (int)$codlab,
            'fil' => (int)$fil,
            'col' => (int)$col,
            'est' => $est,
            'ere' => $ere,
            'ali' => $ali,
        );
        $list = $this->MaquinaModel->getListaMaquinas($data);
        if(!is_null($list)){
            $this->response(array('resp' => $list),200);
        }else {

            $this->response(array('resp'=>'No hay registros'),404);

        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $c1 = $this->post("l");
        $c2 = $this->post("f");
        $c3 = $this->post("c");

        $codlab = $this->post("lab");
        $fil = $this->post("fil");
        $col = $this->post("col");
        $est = $this->post("est");
        $ere = $this->post("ere");
        $ali = $this->post("ali");

        //mandar los input a arreglo y campos de la bd
        $codigo = array(
            'l' => (int)$c1,
            'f' => (int)$c2,
            'c' => (int)$c3,
        );
        $data = array(
            'lab' => (int)$codlab,
            'fil' => (int)$fil,
            'col' =>(int) $col,
            'est' => $est,
            'ere' => $ere,
            'ali' => $ali,
            'l' => (int)$c1,
            'f' => (int)$c2,
            'c' => (int)$c3,
        );
        if ($this->MaquinaModel->guardarDatos($codigo, $data))
            $this->response(array('status' => 'Registro se guardo correctamente'));
        else
            $this->response(array('status' => 'fallo'));
    }


    // este verbo si hace un delete como tal en la bd, en nuestros cruds no se va a eliminar info pero dejo el metodo de ejemplo
    // implementado  por si algun requerimeinto lo america utilizar

    function borrarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $c1 = $this->post("l");
        $c2 = $this->post("f");
        $c3 = $this->post("c");
        $est = $this->post("est");
        $ere = $this->post("ere");
        $ali = $this->post("ali");
        //mandar los input a arreglo y campos de la bd
        $data = array(
            'lab' => 0,
            'fil' => 0,
            'col' => 0,
            'est' => $est,
            'ere' => $ere,
            'ali' => $ali,
            'l' => (int)$c1,
            'f' => (int)$c2,
            'c' => (int)$c3,
        );

        if ($this->MaquinaModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
