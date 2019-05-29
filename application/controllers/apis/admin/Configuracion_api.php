<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Configuracion_api extends REST_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/ConfiguracionModel");
    }

    public function listConfiguracion_get()
    {
        //ponemos lo que venga de los filtros;
        $cod = $this->post("txtCodigo");
        $codlab = $this->post("ddlcodlab");
        $dias = $this->post("txtDias");
        $fini = $this->post("txtfini");
        $hini = $this->post("txthini");
        $ffin = $this->post("txtfin");
        $hfin = $this->post("hfin");
        $data = array(
            'cod' => $cod,
            'codlab' => $codlab,
            'dias' => $dias,
            'fini' => concat($fini, $hini),
            'ffin' => concat($ffin, $hfin),
        );
        $list = $this->ConfiguracionModel->getListaConfiguracion($data);
        if (!is_null($list)) {
            $this->response(array('resp'  => $list), 200);
        } else {
            $this->response(array('resp' => 'No hay re gistros'), 404);
        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $cod = $this->post("txtCodigo");
        $codlab = $this->post("ddlcodlab");
        $dias = $this->post("txtDias");
        $fini = $this->post("txtfini");
        $hini = $this->post("txthini");
        $ffin = $this->post("txtfin");
        $hfin = $this->post("hfin");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' => $cod,
            'codlab' => $codlab,
            'dias' => $dias,
            'fini' => concat($fini, $hini),
            'ffin' => concat($ffin, $hfin),
        );
        if ($this->ConfiguracionModel->guardarDatos($cod, $data))
            $this->response(array('status' => 'Registro se guardo correctamente'));
        else
            $this->response(array('status' => 'fallo'));
    }


    // este verbo si hace un delete como tal en la bd, en nuestros cruds no se va a eliminar info pero dejo el metodo de ejemplo
    // implementado  por si algun requerimeinto lo america utilizar

    function borrarDatos_delete()
    {
        //recibir los names de input desde la vista por post
        $cod = $this->delete("txtCodigo");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' => $cod,
            'codlab' => 0,
            'dias' => '',
            'fini' => '',
            'ffin' => ''
        );

        if ($this->ConfiguracionModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
