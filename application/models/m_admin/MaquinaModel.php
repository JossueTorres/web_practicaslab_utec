<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaquinaModel extends CI_Model {

	public function getListaMaquinas($data) { 
        $result = $this->db->query("CALL proc_crud_maquina(1,?,?,?,?,?,?,?,?,?)", $data);
        return $result->result();
    }

    public function guardarDatos($id, $data){        
        $this->db->where('maq_codlab',$id['l']);
        $this->db->where('maq_fila',$id['f']);
        $this->db->where('maq_columna',$id['c']);
        $result = $this->db->get('adm_maq_maquinas');                
        $maq = $result->result();
        if (!empty($maq)) {
            $stored_procedure = "CALL proc_crud_maquina(3,?,?,?,?,?,?,?,?,?);";
        }else {
            $stored_procedure = "CALL proc_crud_maquina(2,?,?,?,?,?,?,?,?,?);";
        }        
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

    //Este no es un delete a la bd sino que update de estado: activo/inactivo
    public function borrarDatos($data) {
        $stored_procedure = "CALL proc_crud_maquina(4,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }


}