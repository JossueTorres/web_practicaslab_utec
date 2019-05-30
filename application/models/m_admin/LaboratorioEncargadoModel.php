<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaboratorioEncargadoModel extends CI_Model {

	public function getListalaboratoriosEncargados($data) { 
        $result = $this->db->query("CALL proc_crud_laboratorio_encargado(1,?,?,?,?,?)", $data);
        return $result->result();
    }

    public function guardarDatos($id, $data){
        $this->db->where('ela_codenc',$id['e']);
        $this->db->where('ela_codlab',$id['l']);
        $result = $this->db->get('adm_ela_encargados_laboratorios');                
        $labenc = $result->result();
        if (!empty($labenc)) {
            $stored_procedure = "CALL proc_crud_laboratorio_encargado(3,?,?,?,?,?)";
        }else {
            $stored_procedure = "CALL proc_crud_laboratorio_encargado(2,?,?,?,?,?)";
        }        
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

    //Este no es un delete a la bd sino que update de estado: activo/inactivo
    public function borrarDatos($data) {
        $stored_procedure = "CALL proc_crud_laboratorio_encargado(4,?,?,?,?,?)";
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

}