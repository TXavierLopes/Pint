<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class veiculos_model extends CI_Model {

    public function get_veiculos(){
        /*$query = $this->db->get('veiculos');
        return $query->result();*/

        $this->db->select('users.id, matricula, lugares, name');
        $this->db->from('veiculos');
        $this->db->join('users', 'veiculos.id_user = users.id');
        $query = $this->db->get();

        return $query->result();
    }


    
    public function inserir_car($dados){
        if($this->db->insert('veiculos', $dados)){
            return 'inserido com sucesso';
        } else{
            return 'erro ao inserir';
        }
    }
/*    public function ultimo_id(){
        $this->db->limit(1);
        $this->db->select('id_veiculo');
        $this->db->order_by('id_veiculo','DESC');
        $result = $this->db->get('veiculo');
        return $result->result();
    }
*/

    /* public function tem_veiculo($id){

        $this->db->select('*');
        $this->db->from('funcionario');
        $this->db->where('funcionario.nr_funcionario',$id);
        $this->db->join('veiculo','veiculo.nr_funcionario = funcionario.nr_funcionario');
        $query=$this->db->get();
        return $query->result();
        
    }
    */
    public function tem_veiculo($id){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.id',$id);
        $this->db->join('veiculo','veiculos.id = users.id');
        $query=$this->db->get();
        return $query->result();
        
    }

}