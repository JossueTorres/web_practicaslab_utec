<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Laboratorio_api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model("m_admin/LaboratoriosModel");
    }

    public function listLaboratorios_post()
    {
        //ponemos lo que venga de los filtros;
        $codigo = $this->post("cod");
        $codEdificio = $this->post("edf");
        $acronimo = $this->post("acr");
        $filas = $this->post("fil");
        $columnas = $this->post("col");
        $nombre = $this->post("nom");
        $latitud = $this->post("lat");
        $longitud = $this->post("lon");
        $estado = $this->post("est");
        $data = array(
            'cod' => (int)$codigo,
            'edf' => (int)$codEdificio,
            'acr' => $acronimo,
            'fil' => (int)$filas,
            'col' => (int)$columnas,
            'lat' => (double)$latitud,
            'lon' => (double)$longitud,
            'nom' => $nombre,
            'est' => $estado,
        );
        $list = $this->LaboratoriosModel->getListaLaboratorios($data);
        if (!is_null($list)) {
            $this->response(array('resp' => $list), 200);
        } else {

            $this->response(array('resp' => 'No hay registros'), 404);
        }
    }

    public function guardarDatos_post()
    {
        //recibir los names de input desde la vista por post
        $codigo = $this->post("cod");
        $codEdificio = $this->post("edf");
        $acronimo = $this->post("acr");
        $filas = $this->post("fil");
        $columnas = $this->post("col");
        $latitud = $this->post("lat");
        $longitud = $this->post("lon");
        $nombre = $this->post("nom");
        $estado = $this->post("est");

        //mandar los input a arreglo y campos de la bd
        $data = array(
            'cod' => (int)$codigo,
            'edf' => (int)$codEdificio,
            'acr' => $acronimo,
            'fil' => (int)$filas,
            'col' => (int)$columnas,
            'lat' => (double)$latitud,
            'lon' => (double)$longitud,
            'nom' => $nombre,
            'est' => $estado,
        );
        if ($this->LaboratoriosModel->guardarDatos($codigo, $data))
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
            'cod' => (int)$codigo,
            'edf' => 0,
            'acr' => '',
            'fil' => 0,
            'col' => 0,
            'lat' => 0,
            'lon' => 0,
            'nom' => '',
            'est' => '',
        );

        if ($this->LaboratoriosModel->borrarDatos($data))
            $this->response(array('status' => 'Eliminado con exito'));
        else
            $this->response(array('status' => 'fallo'));
    }

    public function Practicas_get()
    {
        $list = $this->LaboratoriosModel->practicasDisponibles();
        if (!is_null($list)) {
            $this->response(array('resp' => $list), 200);
        } else {
            $this->response(array('resp' => 'No hay registros'), 404);
        }
    }

    public function borrarMaquinas_post()
    {
        $lab = $this->post('lab');
        $res = $this->LaboratoriosModel->borrarMaquinas($lab);
        if ($res > 0) {
            $this->response(array('resp' => 'Se eliminaron '.$res. ' registro/s'), 200);
        } else {
            $this->response(array('resp' => 'No se eliminaron registros'), 200);
        }
    }

    // public function crearActualizarMaquinas($codlab)
    // {
    //     $data = array(
    //         'cod' => (int)$codlab,
    //         'codedf' => 0,
    //         'acr' => '',
    //         'fil' => 0,
    //         'col' => 0,
    //         'al' => 0,
    //         'lo' => 0,
    //         'nom' => '',
    //     );
    //     $lab = $this->LaboratoriosModel->getListaLaboratorios($data);
    //     for ($i = 1; $i <= $lab->$lab_filas[0]; $i++) { 
    //         for ($i=0; $i < $lab->$lab_columnas[0]; $i++) { 

    //         }
    //     }
    // }
}
