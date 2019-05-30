<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfiguracionModel extends CI_Model {

	public function getListaConfiguracion($data) { 
        $result = $this->db->query("CALL proc_crud_configuracion(1,?,?,?,?,?)", $data);
        return $result->result();
    }
    public function guardarDatos($id, $data){
        if (!empty($id) && $id > 0) {
            $stored_procedure = "CALL proc_crud_configuracion(3,?,?,?,?,?)";
        }else {
            $stored_procedure = "CALL proc_crud_configuracion(2,?,?,?,?,?)";
        }        
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

    //Este no es un delete a la bd sino que update de estado: activo/inactivo
    public function borrarDatos($data) {
        $stored_procedure = "CALL proc_crud_configuracion(4,?,?,?,?,?)";
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

}