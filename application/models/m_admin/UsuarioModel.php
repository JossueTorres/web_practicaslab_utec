<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model {

	public function getListaUsuarios($data = array('usr'=>'','cod'=>0,'nom'=>'','est'=>'','con'=>'','codtip'=>0,'fcod'=>'')) { 
        $result = $this->db->query("CALL proc_crud_usuario(1,?,?,?,?,?,?,?)", $data);
        return $result->result();
    }

    public function guardarDatos($id, $data){
        if (!empty($id) && $id > 0) {
            $stored_procedure = "CALL proc_crud_usuario(3,?,?,?,?,?,?,?)";
        }else {
            $stored_procedure = "CALL proc_crud_usuario(2,?,?,?,?,?,?,?)";
        }        
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

    //Este no es un delete a la bd sino que update de estado: activo/inactivo
    public function borrarDatos($data) {
        $stored_procedure = "CALL proc_crud_usuario(4,?,?,?,?,?,?,?)";
        $result = $this->db->query($stored_procedure, $data);
        return $result;
    }

    public function Login($data){
        $result = $this->db->query("CALL proc_crud_usuario(1,?,?,?,?,?,?,?)", $data);
        return $result->result();
    }

}