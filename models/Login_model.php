<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model{

 /*   public function can_login($name, $pass){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('name',$name);
        $this->db->where('pass',$pass);
        $this->db->join('tipo_utilizador','tipo_utilizador.id_tipoutilizador = funcionario.tipo_utilizador');
        $query=$this->db->get();
        return $query->result();
    }
*/
    public function can_login($name, $pass){                  

            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('name',$name);
            $query=$this->db->get();

            $data = $query->result_array();


            if(empty($data[0]['password'])) {
                return NULL;
            }


            if(password_verify($pass,$data[0]['password'])) {

                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('name',$name);
                $query=$this->db->get();

                return $query->result();
            }
            //return caso invalida -- em falta
    }


}