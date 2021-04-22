<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class boleias_model extends CI_Model {

    public function get_boleias(){

        $this->db->select('boleias.id as id_boleia, veiculos.id, localidade_origem, localidade_destino, hora_inicio, hora_fim, veiculos.matricula, lugares, economato, o.name AS origem, p.name AS destino');
        $this->db->from('boleias');
        $this->db->join('veiculos', 'veiculos.id = boleias.id_veiculo');
        $this->db->join('main_locations o', '(o.id-1) = boleias.localidade_origem ');
        $this->db->join('main_locations p', '(p.id-1) = boleias.localidade_destino');
        $this->db->where('lugares >', 0);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_boleias_inscritas($currentdate, $id_session){

        $this->db->select('veiculos.id, boleias.id as id_boleia, localidade_origem, localidade_destino, hora_inicio, hora_fim, veiculos.matricula, lugares,  economato,  o.name AS origem, p.name AS destino');
        $this->db->from('viajantes');
        $this->db->join('boleias', 'viajantes.id_boleia = boleias.id') ;
        $this->db->join('veiculos', 'boleias.id_veiculo = veiculos.id');
        $this->db->join('main_locations o', '(o.id-1) = boleias.localidade_origem ');
        $this->db->join('main_locations p', '(p.id-1) = boleias.localidade_destino');
        //$this->db->where('hora_inicio >', $currentdate->format('Y-m-d H:i:s')); //colocar esta linha na query das boleias disponiveis
        $this->db->where('viajantes.id_user =' , $id_session); //session id
        $query = $this->db->get();

        return $query->result();
    }

    public function get_boleias_criadas(){

        $this->db->select('veiculos.id, boleias.id AS id_boleia, localidade_origem, localidade_destino, hora_inicio, hora_fim, veiculos.matricula, lugares, economato,  o.name AS origem, p.name AS destino');
        $this->db->from('boleias');
        $this->db->join('veiculos', 'boleias.id_veiculo = veiculos.id');
        $this->db->join('main_locations o', '(o.id-1) = boleias.localidade_origem ', 'left');
        $this->db->join('main_locations p', '(p.id-1) = boleias.localidade_destino', 'left');

        $this->db->order_by("boleias.id", "esc");
        $this->db->where('boleias.id_user' , $this->session->userdata('id')); //session id
        $query = $this->db->get();

        return $query->result();
    }

    public function get_boleias_admin(){

        $this->db->select('veiculos.id, localidade_origem, localidade_destino, hora_inicio, hora_fim, veiculos.matricula, lugares, economato, users.name,  o.name AS origem, p.name AS destino');
        $this->db->from('boleias');
        $this->db->join('veiculos', 'veiculos.id = boleias.id_veiculo');
        $this->db->join('main_locations o', '(o.id-1) = boleias.localidade_origem ', 'left');
        $this->db->join('main_locations p', '(p.id-1) = boleias.localidade_destino', 'left');
        $this->db->join('users', 'veiculos.id_user = users.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_boleias_administrativo(){

        $this->db->select('veiculos.id, boleias.id AS id_boleia, localidade_origem, localidade_destino, hora_inicio, hora_fim, veiculos.matricula, lugares, economato, material, estado, users.name,  o.name AS origem, p.name AS destino');
        $this->db->from('boleias');
        $this->db->join('veiculos', 'veiculos.id = boleias.id_veiculo');
        $this->db->join('main_locations o', '(o.id-1) = boleias.localidade_origem ', 'left');
        $this->db->join('main_locations p', '(p.id-1) = boleias.localidade_destino', 'left');
        $this->db->join('users', 'veiculos.id_user = users.id');
        $this->db->where('economato =', 1);
        $query = $this->db->get();
        return $query->result();
    }

     public function inserir_ride($dados){
        if($this->db->insert('boleias', $dados)){
            return 'inserido com sucesso';
        } else{
            return 'erro ao inserir';
        }
    }


    public function inserir_ride_membro($dados) {
        
        
        $dataVeiculo = array(
            'matricula' => $dados['matricula'],
            'lugares' => $dados['lugares'],
            'id_user' => $this->session->userdata('id')
            // CREATED AT
        );
    
        //foi inserido o veiculo, tem que mandar para a BOLEIA o id do veiculo
       $inserted = $this->db->insert('veiculos', $dataVeiculo);
     if($inserted) {
            $last_id = $this->db->insert_id();

           
            // /pieces/pizzas
            $id_origem = $dados['origem'];
            $id_destino = $dados['destino'];

           // informação origem
            $this->db->select('*');
            $this->db->from('polos');
            $this->db->where('id',$id_origem);
            $query=$this->db->get();

            $data_origem = $query->result_array();

            // informação destino
            $this->db->select('*');
            $this->db->from('polos');
            $this->db->where('id',$id_destino);
            $query=$this->db->get();

            $data_destino = $query->result_array();
        
    
            $texto = "De: ".$data_origem[0]['endereço']."; Para: ".$data_destino[0]['endereço'];
            
            $dataBoleia = array(
                'id_veiculo' => $last_id,
                'id_user' => $_SESSION["id"],
                'lat_origem' => $data_origem[0]['latitude'],
                'lng_origem' => $data_origem[0]['longitude'],
                'lat_destino' =>$data_destino[0]['latitude'],
                'lng_destino' => $data_destino[0]['longitude'],
                'localidade_origem' => $data_origem[0]['id_main_location'],
                'localidade_destino' => $data_destino[0]['id_main_location'],
                'rua_origem' => $data_origem[0]['endereço'],
                'rua_destino' => $data_destino[0]['endereço'],
                'hora_inicio' => $dados['data_partida'],
                'hora_fim' => $dados['data_chegada'],
                'texto' => $texto,
                'economato' => $dados['economato']
            );
            
        
            $inserted_boleia = $this->db->insert('boleias', $dataBoleia);

            return $inserted_boleia;

        }
        else
            return false;
            

    }

    public function inserir_ride_admin($dados) {


        $dataVeiculo = array(
            'matricula' => $dados['matricula'],
            'lugares' => $dados['lugares'],
            'id_user' => $dados['id']
            // CREATED AT
        );


        //foi inserido o veiculo, tem que mandar para a BOLEIA o id do veiculo
        $inserted = $this->db->insert('veiculos', $dataVeiculo);
        if($inserted) {
            $last_id = $this->db->insert_id();


            // /pieces/pizzas
            $id_origem = $dados['origem'];
            $id_destino = $dados['destino'];

            // informação origem
            $this->db->select('*');
            $this->db->from('polos');
            $this->db->where('id',$id_origem);
            $query=$this->db->get();

            $data_origem = $query->result_array();

            // informação destino
            $this->db->select('*');
            $this->db->from('polos');
            $this->db->where('id',$id_destino);
            $query=$this->db->get();

            $data_destino = $query->result_array();


            $texto = "De: ".$data_origem[0]['endereço']."; Para: ".$data_destino[0]['endereço'];

            $dataBoleia = array(
                'id_veiculo' => $last_id,
                'id_user' => $dados['id'],
                'lat_origem' => $data_origem[0]['latitude'],
                'lng_origem' => $data_origem[0]['longitude'],
                'lat_destino' =>$data_destino[0]['latitude'],
                'lng_destino' => $data_destino[0]['longitude'],
                'localidade_origem' => $data_origem[0]['id_main_location'],
                'localidade_destino' => $data_destino[0]['id_main_location'],
                'rua_origem' => $data_origem[0]['endereço'],
                'rua_destino' => $data_destino[0]['endereço'],
                'hora_inicio' => $dados['data_partida'],
                'hora_fim' => $dados['data_chegada'],
                'texto' => $texto,
                'economato' => $dados['economato']
            );


            $inserted_boleia = $this->db->insert('boleias', $dataBoleia);

            return $inserted_boleia;

        }
        else
            return false;


    }

    public function inserir_economato($dados) {

        $id = $dados['id'];
        $material = $dados['material'];

        $valores = array(
            'estado' => $dados['estado'],
            'material' => $dados['material']
        );


        //return $this->db->query("UPDATE boleias SET Estado = '$estado', Material = '$material' WHERE id = '$id'");
        $this->db->set($valores);
        $this->db->where('id', $id);

        return $this->db->update('boleias');

    }

    public function unsubscribe_utilizador($id_user,$id_boleia){
        $this->db->select('*');
        $this->db->from('boleias');
        $this->db->where('$id_boleia',$id_boleia);


        // Verificar se é dono da boleia ou não

        if (($id_user == $this->db->get()->result()[0]['id_user'])){
            delete_boleia($id_boleia);
        }else{

            //Remover da tabela viajantes
            $this->db->where('id_user',$id_user);
            $this->db->where('id_user',$id_boleia);
            $this->db->delete('viajantes');

            //ID do carro
            $this->db->select('*');
            $this->db->from('boleias');
            $this->db->where('id_boleia',$id_boleia);
            $id_veiculo= $this->db->get()->result()[0]['id_veiculo'];

            //Adicionar lugar vago no carro
            $this->db->select('*');
            $this->db->set('lugares','lugares + 1', FALSE);
            $this->db->where('id',$id_veiculo);
            $this->db->update('veiculos');
        }
    }

    //Notificar passageiros ao ser apagada boleia?
    public function delete_boleia($id_boleia)
    {
        //Apagar linhas da tabela viajantes
        $this->db->where('id_boleia',$id_boleia);
        $this->db->delete('viajantes');

        //Apagar boleia
        $this->db->where('id',$id_boleia);
        $this->db->delete('boleias');


    }

    public function apagar_sub($dados){
        $id_user = $dados['id_user'];
        $id_boleia = $dados['id_boleia'];

        return $this->db->query("DELETE FROM viajantes WHERE id_user = '$id_user' AND id_boleia = '$id_boleia'");

    }

    public function repor_lugar($id_boleia){
        $id_veiculo = $this->db->query("SELECT id_veiculo FROM boleias WHERE id = $id_boleia")->result();;
        $id_veiculo =  $id_veiculo[0]->id_veiculo ;
        return $this->db->query("UPDATE veiculos SET lugares = lugares+1 WHERE id =$id_veiculo");
    }
    /*
        public function ultimo_id(){
            $this->db->limit(1);
            $this->db->select('id_viagem');
            $this->db->order_by('id_viagem','DESC');
            $result = $this->db->get('viagem');
            return $result->result();
        }
    */



    public function get_main_locations_polos(){
            $this->db->select('*');
            $this->db->from('polos');   
            $query = $this->db->get();
        return $query->result();
    }

    public function get_users(){
        $this->db->select('id,name');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    public function dadosUnicos($data){


        $this->db->select('boleias.id_veiculo');
        $this->db->from('boleias');
        $this->db->where('boleias.id = ', $data);
        $query = $this->db->get();

        return $query->result();
    }

    public function dadosUnicosNomes($data){
        $query = $this->db->query("SELECT
        viajantes.*,boleias.*, users.*, o.name AS origem, p.name AS destino
    FROM
        boleias
    LEFT JOIN viajantes ON boleias.id = viajantes.id_boleia
    INNER JOIN users ON users.id = boleias.id_user
    LEFT JOIN main_locations o ON (o.id-1) = boleias.localidade_origem
    LEFT JOIN main_locations p ON (p.id-1) = boleias.localidade_destino
    WHERE
        boleias.id = '$data' ");



        return $query->result();
    }

    public function viajantes($id_boleia){
        $query = $this->db->query("SELECT
            users.name
            FROM viajantes
            INNER JOIN users ON viajantes.id_user = users.id
            WHERE viajantes.id_boleia = '$id_boleia'
        ");
        return $query->result();
    }

    public function verificar_viajante($data, $id_viagem){
        $this->db->select('id_user');
        $this->db->from('viajantes');
        $this->db->where('viajantes.id_user =', $data);
        $this->db->where('viajantes.id_boleia =' , $id_viagem);
        return $this->db->get();
    }

    public function inserir_viajante($id_session, $id_boleia){
        $dados = array(
            'id_boleia' => $id_boleia,
            'id_user' => $id_session,
        );

        return $this->db->insert('viajantes', $dados);
    }

    public function atualizar_lugares($id_veiculo){
        return $this->db->query("UPDATE veiculos SET lugares = lugares-1 WHERE id = '$id_veiculo'");
        /*
                $this->db->set('lugares', 'lugares - 1');
                $this->db->where('id', $id_veiculo);
                return $this->db->update('veiculos');
                */
    }

    public function id_veiculo($id_boleia){
        return $this->db->query("SELECT id_veiculo FROM boleias WHERE id = '$id_boleia'")->result();;
    }


    public function TiposBoleia(){
        $result = $this->db->get('tipo_viagem');
        return $result->result();
    }

    public function count_viajantas($id_boleia){
        $this->db->count_all_results();
        $this->db->where("id",$id_boleia);
        $this->db->from("boleias");
        return $this->db->get();
    }

}
 