<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaquinaModel extends CI_Model {

	public function getListaMaquinas($data = array('codlab'=>0,'fil'=>0,'col'=>0,'est'=>'','ere'=>'','ali'=>'')) { 
        $result = $this->db->query("CALL proc_crud_maquina(1,?,?,?,?,?,?)", $data);
        return $result->result();
    }

    public function guardarDatos($id, $data){        
        $this->db->where('maq_codlab',$id['codlab']);
        $this->db->where('maq_fila',$id['fil']);
        $this->db->where('maq_columna',$id['col']);
        $result = $this->db->get('adm_maq_maquinas');                
        $maq = $result->result();
        if (!empty($maq)) {
            $stored_procedure = "CALL proc_crud_maquina(3,?,?,?,?,?,?)";
        }else {
            $stored_procedure = "CALL proc_crud_maquina(2,?,?,?,?,?, ?)";
        }        
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

    //Este no es un delete a la bd sino que update de estado: activo/inactivo
    public function borrarDatos($data) {
        $stored_procedure = "CALL proc_crud_maquina(4,?,?,?,?,?)";
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }


}