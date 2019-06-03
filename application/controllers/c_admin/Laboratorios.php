<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboratorios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //verificar la session de usuario
        //verificar la session de usuario
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index()
    {
        //_________________________________________________________________
        //Recojo y arreglo los parametros
        $_param = array(
            'cod' => 0,
            'edf' => $this->input->post("ddlEdfFil"),
            'acr' => $this->input->post("txtAcrFil"),
            'fil' => 0,
            'col' => 0,
            'lat' => 0,
            'lon' => 0,
            'nom' => $this->input->post("txtNomFil"),
            'est' => $this->input->post("ddlEstFil"),
        );
        $_pa = array('cod' => 0, 'nom' => '', 'acr' => '', 'est' => '');
        //_________________________________________________________________
        //_________________________________________________________________
        //Recojo y arreglo los parametros
        $urls = array(
            URLWS . 'Laboratorio/Listado' => $_param,
            URLWS . 'Edificio/Listado' => $_pa
        );
        $cont = 1;
        //_________________________________________________________________
        foreach ($urls as $url => $param) {
            $postData = '';
            //Creamos arreglo nombre/valor separado por &
            foreach ($param as $k => $v) {
                $postData .= $k . '=' . $v . '&';
            }
            rtrim($postData, '&');
            //_________________________________________________________________
            //creamos nuevo recurso cURL y su Conf (Esto mejor que ni se toque siempre va)
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, USERAGENTWS);
            curl_setopt($ch, CURLOPT_COOKIE, COOKIECURL);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
            curl_setopt($ch, CURLOPT_POST, count($param));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            //_________________________________________________________________
            //Obtenemos el resultado
            //_________________________________________________________________
            $result = json_decode(curl_exec($ch));
            $data['lst' . $cont] = $result->resp;
            // $data[] = $arrResult;
            $cont = $cont + 1;
        }
        //cerramos el Curl
        // curl_close($ch);
        // //_________________________________________________________________
        // var_dump($result);
        // // var_dump("--------------------------------------------------------------");
        // // var_dump($arrResult['lst1']);
        // var_dump("--------------------------------------------------------------\n");
        // var_dump($data);
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/nav');
        $this->load->view('admin/LaboratoriosLista', $data);
        $this->load->view('layouts/footer');
    }

    public function guardarDatos()
    {
        $lab = $this->input->post("codlab");
        $fil = $this->input->post("txtFil");
        $col = $this->input->post("txtCol");
        $acr = $this->input->post("txtAcr");
        //_________________________________________________________________
        //Recojo y arreglo los parametros
        $_param = array(
            'cod' => $lab,
            'edf' => $this->input->post("ddlEdf"),
            'acr' => $acr,
            'fil' => $fil,
            'col' => $col,
            'lat' => $this->input->post("txtLat"),
            'lon' => $this->input->post("txtLon"),
            'nom' => $this->input->post("txtNom"),
            'est' => $this->input->post("ddlEst"),
        );
        $postData = '';
        //Creamos arreglo nombre/valor separado por &
        foreach ($_param as $k => $v) {
            $postData .= $k . '=' . $v . '&';
        }
        rtrim($postData, '&');
        //_________________________________________________________________
        //_________________________________________________________________
        //Recojo y arreglo los parametros
        $url = URLWS . 'Laboratorio/guardarDatos';
        //_________________________________________________________________
        //_________________________________________________________________
        //creamos nuevo recurso cURL y su Conf (Esto mejor que ni se toque siempre va)
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, USERAGENTWS);
        curl_setopt($ch, CURLOPT_COOKIE, COOKIECURL);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
        curl_setopt($ch, CURLOPT_POST, count($_param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        //_________________________________________________________________
        //Obtenemos el resultado    
        curl_exec($ch);
        //cerramos el Curl
        curl_close($ch);
        //_______________________________________________________________________________________________________________________________________________________

        header('location:' . base_url('Laboratorios'));
    }

    public function borrarDatos()
    {
        $ids = $this->input->post("chkBorrar");
        foreach ($ids as $id) {
            //_________________________________________________________________
            //Recojo y arreglo los parametros
            $url = URLWS . 'Laboratorio/borrarMaquinas';
            //_________________________________________________________________

            //_________________________________________________________________
            //creamos nuevo recurso cURL y su Conf (Esto mejor que ni se toque siempre va)
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, USERAGENTWS);
            curl_setopt($ch, CURLOPT_COOKIE, COOKIECURL);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
            curl_setopt($ch, CURLOPT_POST, 1);
            //_________________________________________________________________

            $postData =  'lab=' . $id;
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_exec($ch);

            //_________________________________________________________________
            //Recojo y arreglo los parametros
            $url = URLWS . 'Laboratorio/borrarDatos';
            //_________________________________________________________________

            //_________________________________________________________________
            //creamos nuevo recurso cURL y su Conf (Esto mejor que ni se toque siempre va)
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, USERAGENTWS);
            curl_setopt($ch, CURLOPT_COOKIE, COOKIECURL);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
            curl_setopt($ch, CURLOPT_POST, 4);
            //_________________________________________________________________

            $postData =  'cod=' . $id;
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_exec($ch);
        }
        //_________________________________________________________________				
        //Obtenemos el resultado
        //_________________________________________________________________
        // $data = json_decode(curl_exec($ch));
        //cerramos el Curl
        curl_close($ch);
        //_________________________________________________________________
        header('location:' . base_url('Laboratorios'));
    }

    public function crearMaquinas()
    {
        $lab = $this->input->post("lblLab");
        $fil = $this->input->post("lblFil");
        $col = $this->input->post("lblCol");
        $acr = $this->input->post("lblAcr");
        //_________________________________________________________________
        //Recojo y arreglo los parametros
        $url = URLWS . 'Laboratorio/borrarMaquinas';
        //_________________________________________________________________
        //_________________________________________________________________
        //creamos nuevo recurso cURL y su Conf (Esto mejor que ni se toque siempre va)
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, USERAGENTWS);
        curl_setopt($ch, CURLOPT_COOKIE, COOKIECURL);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "lab=" . $lab);
        //_________________________________________________________________
        //Obtenemos el resultado
        //_________________________________________________________________
        curl_exec($ch);
        //cerramos el Curl
        curl_close($ch);
        //_______________________________________________________________________________________________________________________________________________________
        //Recojo y arreglo los parametros
        $url = URLWS . 'Maquina/guardarDatos';
        //_________________________________________________________________
        //creamos nuevo recurso cURL y su Conf (Esto mejor que ni se toque siempre va)
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, USERAGENTWS);
        curl_setopt($ch, CURLOPT_COOKIE, COOKIECURL);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
        curl_setopt($ch, CURLOPT_POST, 9);
        for ($i = 1; $i <= $fil; $i++) {
            for ($j = 1; $j <= $col; $j++) {
                $postData = "lab=" . $lab . "&fil=" . $i . "&col=" . $j . "&est=A&ere=D&ali=" . $acr . "&l=0&f=0&c=0";
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                curl_exec($ch);
            }
        }
        curl_close($ch);
        header('location:' . base_url('Laboratorios'));
    }
}
