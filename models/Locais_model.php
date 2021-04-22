<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class locais_model extends CI_Model {

    public function get_locals(){
        $query = $this->db->get('main_locations');
        return $query->result();
    }

    public function get_locals_admin(){

        $this->db->select('*');
        $this->db->from('polos');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_locals_membro(){

        $this->db->select('*');
        $this->db->from('polos');
        $query = $this->db->get();
        return $query->result();
    }


    public function inserir_local($dados){
        if($this->db->insert('polos', $dados)){
            return 'inserido com sucesso';
        } else{
            return 'erro ao inserir';
        }
    }

    //? testar
    public function delete_local($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('polos');
    }


}
 