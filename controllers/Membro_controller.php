<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Membro_controller extends CI_Controller
{

    public function login_verify()
    {
        if (empty($this->session->userdata('id'))) { //not logged in
            redirect("../index.php/Login_controller/login");
        }
      /*  elseif($_SESSION['cargo'] != 0 ){
            if ($_SESSION['cargo'] == 1) {
                redirect("Administrador_controller");
            }else{
                redirect("Administrativo_controller/administrativo_view");
            }
        }*/

    }

    public function index()
    {

        $this->login_verify();

        $this->load->helper('url', 'database');
        $dados['dadosBoleia'] = $this->dadosBoleias();
        $this->load->view('header_membro');
        $this->load->view('homemembro_view', $dados);
        $this->load->view('footer_membro');

    }

    public function download()
    {
        $this->login_verify();
        $this->load->helper('url', 'database');
        $this->load->view('header_membro');
        $this->load->view('download');
        $this->load->view('footer_membro');
    }

    public function boleiasinscritas()
    {

        $this->login_verify();
        $this->load->helper('url','database');
        $this->load->model('Boleias_model');

        //data e hora atual (-1) -- colocar nas boleias disponiveis
        $date = date('Y-m-d H:i:s');
        $newdate = strtotime ( '-1 hour' , strtotime ( $date ) ) ;
        $newdate = date ( 'Y-m-d H:i:s' , $newdate );
        $newDateParameter = date_create_from_format('Y-m-d H:i:s', $newdate);

        $id_session = $this->session->userdata('id');

        $data['boleias'] = $this->Boleias_model->get_boleias_inscritas($newDateParameter, $id_session);

        $this->load->view('header_membro');
        $this->load->view('boleias_inscritas', $data);
        $this->load->view('footer_membro');
    }

    public function detalhesboleia($id = null){
        $this->login_verify();

        //Carregar dados da boleia

        $this->load->helper('url','database');

        $this->load->model('Boleias_model');
        $data['dados'] = $this->Boleias_model->dadosUnicos($id);

        $id_session = $this->session->userdata('id');
        $data['row'] = $this->Boleias_model->verificar_viajante($id_session, $id);



        $id_veiculo['veiculos'] = $data['dados'][0];
        $id_veiculo = $data['dados'][0]->id_veiculo;



        $data['nomes'] = $this->Boleias_model->dadosUnicosNomes($id);
        $data['viajantes'] = $this->Boleias_model->viajantes($id);
        $data['id_boleia'] = $id;
        
        $this->load->view('header_membro');
        $this->load->view('detalhes_boleia', $data);
        $this->load->view('footer_membro');
    }

    public function inserir_viajante($id_boleia = null){ // WALKER
        //incluides
        $this->load->helper('url','database');
        $this->load->model('Boleias_model');

        //session id
        $id_session = $this->session->userdata('id');

        //retorna 0 ou 1 para verificar se está na boleia
        $data['row'] = $this->Boleias_model->verificar_viajante($id_session, $id_boleia);

        //recuperar id_veiculo de uma determinada boleia
        $data['id_veiculo'] = $this->Boleias_model->id_veiculo($id_boleia);


        if($data['row']->num_rows() < 1){ //inscreve-se
            $this->Boleias_model->inserir_viajante($id_session, $id_boleia);
            $this->Boleias_model->atualizar_lugares($data['id_veiculo'][0]->id_veiculo);
        }


        //recuperar os valores da boleia
        //$data['dados'] = $this->Boleias_model->dadosUnicos($id_session);

        //mostrar dados da boleia atualizados
        redirect('Membro_controller/detalhesboleia/'.$id_boleia);
    }

    public function boleiascriadas()
    {

        $this->login_verify();
        $this->load->helper('url','database');
        $this->load->model('Boleias_model');

        $data['boleias'] = $this->Boleias_model->get_boleias_criadas();

        $this->load->view('header_membro');
        $this->load->view('boleias_criadas', $data);
        $this->load->view('footer_membro');
    }

    public function perfilmembro()
    {
        $this->load->model('utilizadores_model');
        $this->login_verify();
        $this->load->helper('url', 'database');
        $usr = $this->utilizadores_model->get_dados_by_id($this->session->userdata('id'))[0];
        $this->load->view('header_membro');
        $this->load->view('perfil_membro', array('usr' => $usr));
        $this->load->view('footer_membro');
    }

    public function editarperfil()
    {

        $this->load->model('utilizadores_model');
        $this->login_verify();
        $this->load->helper('url', 'database');
        $usr = $this->utilizadores_model->get_dados_by_id($this->session->userdata('id'))[0];

        $this->load->view('header_membro');
        $this->load->view('editar_perfil', array('usr' => $usr));
        $this->load->view('footer_membro');
    }

    public function boleiasmembro()
    {

        $this->login_verify();
        $this->load->helper('url','database');
        $this->load->model('Boleias_model');
        /*
                $date = date('Y-m-d H:i:s');
                $newdate = strtotime ( '-1 hour' , strtotime ( $date ) ) ;
                $newdate = date ( 'Y-m-d H:i:s' , $newdate );
                $newDateParameter = date_create_from_format('Y-m-d H:i:s', $newdate); */

        $data['boleias'] = $this->Boleias_model->get_boleias();
        $this->load->view('header_membro');
        $this->load->view('boleias_membro', $data);
        $this->load->view('footer_membro');
    }


    //permite buscar os dados a base de dados e listar numa combobox
    public function dadosBoleias()
    {

        $this->login_verify();
        $this->load->model('boleias_model');
        $result = $this->boleias_model->get_main_locations_polos();
        return $result;
    }

    /* public function tipoBoleia(){
         $this->load->model('boleias_model');
         $result = $this->boleias_model->TiposBoleia();
         return $result;
     }*/

    public function tem_veiculo($id)
    {

        $this->login_verify();
        $this->load->model('veiculos_model');
        $result = $this->veiculos_model->tem_veiculo($id);
        return $result;
    }

    //inserir a boleia na base de dados
    public function inserir_boleia_membro()
    {

        $this->login_verify();
        $this->load->helper('url', 'database');
        $this->load->model('boleias_model');

        $data['origem'] = $this->input->post('origem');
        $data['destino'] = $this->input->post('destino');
        $data['data_partida'] = $this->input->post('data_partida');
        $data['data_chegada'] = $this->input->post('data_chegada');
        $data['matricula'] = $this->input->post('matricula');
        $data['lugares'] = $this->input->post('lugares');
        $data['economato'] = $this->input->post('economato');


        if ($this->boleias_model->inserir_ride_membro($data))
            redirect('Membro_controller/boleiasmembro');
        else
            echo 'erro ao inserir';
    }

    function unsubscribe_ride($id_boleia){
        $id_user = $this->session->userdata('id');
        $data = array(
            'id_user' => $id_user,
            'id_boleia' => $id_boleia

        );

        $this->load->model('Boleias_model');


        $this->Boleias_model->apagar_sub($data);
        $valor = $this->Boleias_model->repor_lugar($id_boleia);
        var_dump($valor);

        redirect('Membro_controller/boleiasmembro');

    }




    function editar_perfil_membro(){

        $data['id'] = $this->session->userdata('id');
        $data['name'] = $this->input->post('name');
        $data['contact'] = $this->input->post('contact');
        $data['email']  = $this->input->post('email');

        if ($this->input->post('password')) {

            $data['password']  = $this->input->post('password');
            $pass2 = $this->input->post('password_confirmation');

            //caso jscript esteja desativado
            if ($data['password'] != $pass2)die();
        }

        if (!$this->input->post('image') == "") {
            $data['image'] = $this->input->post('image');
        }
        $this->load->model('Utilizadores_model');
        $this->Utilizadores_model->update_user($data);
        redirect("../index.php/Membro_controller/perfilmembro");

    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect("../index.php/login_controller/login");
    }
}


        

      