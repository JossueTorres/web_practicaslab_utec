<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Usuario_api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/UsuarioModel");
    }

    public function listUsuarios_get()
    {
        //ponemos lo que venga de los filtros;
        $usr = $this->post("usr");
        $cod = $this->post("cod");
        $nom = $this->post("nom");
        $est = $this->post("est");
        $con = $this->post("con");
        $codtip = $this->post("tip");
        $fcod = $this->post("fcod");
        $data = array(
            'usr' => $usr,
            'cod' => $cod,
            'nom' => $nom,
            'est' => $est,
            'con' => $con,
            'tip' => $codtip,
            'fcod' => $fcod,
        );
        $list = $this->UsuarioModel->getListaUsuarios($data);
        if (!is_null($list)) {
            $this->response(array('resp' => $list), 200);
        } else {
            $this->response(array('resp' => 'No hay registros'), 404);
        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $usr = $this->post("txtUsuario");
        $cod = $this->post("txtCodigo");
        $nom = $this->post("txtNombre");
        $est = $this->post("txtEstado");
        $con = $this->post("txtConfirma");
        $codtip = $this->post("ddlcodtip");
        $fcod = $this->post("txtfecha");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'usr' => $usr,
            'cod' => $cod,
            'nom' => $nom,
            'est' => $est,
            'con' => $con,
            'codtip' => $codtip,
            'fcod' => $fcod,
        );
        if ($this->UsuarioModel->guardarDatos($cod, $data))
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

        //mandar los input a arreglo y campos de la bd        
        $data = array(
            'usr' => '',
            'cod' => $codigo,
            'nom' => '',
            'est' => '',
            'con' => '',
            'codtip' => 0,
            'fcod' => '',
        );
        if ($this->UsuarioModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }
}
