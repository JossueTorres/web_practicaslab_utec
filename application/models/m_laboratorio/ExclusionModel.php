<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExclusionModel extends CI_Model {

	public function getListaExclusiones($data) { 
        $result = $this->db->query("CALL proc_crud_exclusion(1, ?, ?, ?)", $data);
        return $result->result();
    }

    public function guardarDatos($id, $data){
        if (!empty($id) && $id > 0) {
            $stored_procedure = "CALL proc_crud_exclusion(3, ?, ?, ?)";
        }else {
            $stored_procedure = "CALL proc_crud_exclusion(2, ?, ?, ?)";
        }        
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

    //Este no es un delete a la bd sino que update de estado: activo/inactivo
    public function borrarDatos($data) {
        $stored_procedure = "CALL proc_crud_exclusion(4, ?, ?, ?)";
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

}