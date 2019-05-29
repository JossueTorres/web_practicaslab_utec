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

    public function listLaboratoriosEncargados_get()
    {
        //ponemos lo que venga de los filtros;    
        $codenc = 0;   
        $codlab = 0;   
        $est = '';        
        $data = array(
            'codenc' => $codenc,
            'codlab' => $codlab, 
            'est' => $est,          
        );
        $list = $this->LaboratorioEncargadoModel->getListalaboratoriosEncargados($data);
        if(!is_null($list)){
            $this->response(array('resp' => $list),200);
        }else {

            $this->response(array('resp'=>'No hay registros'),404);

        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $codenc = $this->post("ddlcodenc");
        $codlab = $this->post("ddlcodlab");
        $est = $this->post("txtEstado");
        $id = array('codenc' => $codenc, 'codlab' => $codlab,);
        $data = array('codenc' => $codenc,
            'codlab' => $codlab, 
            'est' => $est,           
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
        $codenc = $this->post("ddlcodenc");
        $codlab = $this->post("ddlcodlab");

        $id = array('codenc' => $codenc, 'codlab' => $codlab,);
        $data = array('codenc' => $codenc,
            'codlab' => $codlab, 
            'est' => '',
        );
        if ($this->LaboratorioEncargadoModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
