<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Asignacion_api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/AsignacionModel");
    }

    public function listAsignaciones_get()
    {
        //ponemos lo que venga de los filtros;
        $cod = $this->post("txtCodigo");
        $codcop = $this->post("ddlcodcop");
        $codlab = $this->post("ddlcodlab");
        $fil = $this->post("txtFilas");
        $col = $this->post("txtColumnas");
        $fini = $this->post("txtfini");
        $hini = $this->post("txthini");
        $ffin = $this->post("txtffin");
        $hfin = $this->post("txthfin");
        $data = array(
            'cod' => $cod,
            'codcop' => $codcop,
            'codlab' => $codlab,
            'fil' => $fil,
            'col' => $col,
            'fini' => concat($fini, ' ', $hini),
            'ffin' => concat($ffin, ' ', $hfin),
        );
        $list = $this->AsignacionModel->getListaAsignacion($data);
        if(!is_null($list)){
            $this->response(array('resp' => $list),200);
        }else {

            $this->response(array('resp'=>'No hay registros'),404);

        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $cod = $this->post("txtCodigo");
        $codcop = $this->post("ddlcodcop");
        $codlab = $this->post("ddlcodlab");
        $fil = $this->post("txtFilas");
        $col = $this->post("txtColumnas");
        $fini = $this->post("txtfini");
        $hini = $this->post("txthini");
        $ffin = $this->post("txtffin");
        $hfin = $this->post("txthfin");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' => $cod,
            'codcop' => $codcop,
            'codlab' => $codlab,
            'fil' => $fil,
            'col' => $col,
            'fini' => concat($fini, ' ', $hini),
            'ffin' => concat($ffin, ' ', $hfin),
        );
        if ($this->AsignacionModel->guardarDatos($cod, $data))
            $this->response(array('status' => 'Registro se guardo correctamente'));
        else
            $this->response(array('status' => 'fallo'));
    }


    // este verbo si hace un delete como tal en la bd, en nuestros cruds no se va a eliminar info pero dejo el metodo de ejemplo
    // implementado  por si algun requerimeinto lo america utilizar

    function borrarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $codigo = $this->post("txtCodigo");
        $codcop = 0;
        $codlab = 0;
        $fil = 0;
        $col = 0;
        $fini = '';
        $hini = '';
        $ffin = '';
        $hfin = '';
        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' => $codigo,
            'codcop' => $codcop,
            'codlab' => $codlab,
            'fil' => $fil,
            'col' => $col,
            'fini' => concat($fini, ' ', $hini),
            'ffin' => concat($ffin, ' ', $hfin),
        );

        if ($this->AsignacionModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }    
}
