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

    public function listConfiguracion_post()
    {
        //ponemos lo que venga de los filtros;
        $cod = $this->post("cod");
        $codlab = $this->post("lab");        
        $fini = $this->post("fini");
        $hini = $this->post("hini");
        $ffin = $this->post("ffin");
        $hfin = $this->post("hfin");
        $lun = $this->post("lun");
        $mar = $this->post("mar");
        $mie = $this->post("mie");
        $jue = $this->post("jue");
        $vie = $this->post("vie");
        $sab = $this->post("sab");
        $dom = $this->post("dom");
        $data = array(
            'cod' => (int)$cod,
            'lab' => (int)$codlab,            
            'fini' => $fini . " " . $hini,
            'ffin' => $ffin . " " . $hfin,
            'lun' => (int)$lun,
            'mar' => (int)$mar,
            'mie' => (int)$mie,
            'jue' => (int)$jue,
            'vie' => (int)$vie,
            'sab' => (int)$sab,
            'dom' => (int)$dom,
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
        $cod = $this->post("cod");
        $codlab = $this->post("lab");        
        $fini = $this->post("fini");
        $hini = $this->post("hini");
        $ffin = $this->post("ffin");
        $hfin = $this->post("hfin");
        $lun = $this->post("lun");
        $mar = $this->post("mar");
        $mie = $this->post("mie");
        $jue = $this->post("jue");
        $vie = $this->post("vie");
        $sab = $this->post("sab");
        $dom = $this->post("dom");
        $data = array(
            'cod' => (int)$cod,
            'lab' => (int)$codlab,            
            'fini' => $fini . " " . $hini,
            'ffin' => $ffin . " " . $hfin,
            'lun' => (int)$lun,
            'mar' => (int)$mar,
            'mie' => (int)$mie,
            'jue' => (int)$jue,
            'vie' => (int)$vie,
            'sab' => (int)$sab,
            'dom' => (int)$dom,
        );
        if ($this->ConfiguracionModel->guardarDatos($cod, $data))
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
        $codlab = $this->post("lab");        
        $fini = $this->post("fini");
        $hini = $this->post("hini");
        $ffin = $this->post("ffin");
        $hfin = $this->post("hfin");
        $lun = $this->post("lun");
        $mar = $this->post("mar");
        $mie = $this->post("mie");
        $jue = $this->post("jue");
        $vie = $this->post("vie");
        $sab = $this->post("sab");
        $dom = $this->post("dom");
        $data = array(
            'cod' => $cod,
            'lab' => 0,            
            'fini' => "",
            'ffin' => "",
            'lun' => 0,
            'mar' => 0,
            'mie' => 0,
            'jue' => 0,
            'vie' => 0,
            'sab' => 0,
            'dom' => 0,
        );

        if ($this->ConfiguracionModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
