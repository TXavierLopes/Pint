<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_controller extends CI_Controller {

    public function login_verify(){
        if (!isset($_SESSION['id'])) { //not logged in
            redirect("Login_controller/login");
        }
     /*   elseif($_SESSION['type'] != '1' ){
             if ($_SESSION['type'] == 0) {
                 redirect("Membro_controller");
             }else{
                 redirect("Administrativo_controller");
             }
        }*/

    }

    public function index()
    {

        $this->login_verify();
        $this->load->helper('url');

        $this->load->view('header');

        $this->load->view('index');
        $this->load->view('footer');
        /*      $data['nr_funcionario'] = $this->count_utilizadores();
                $data['id_veiculo'] = $this->count_veiculo();
                $data['id_viagem'] = $this->count_boleias();
                $data['id_local'] = $this->count_local();
        */
//?

    }
    /*
        public function count_utilizadores()
        {
            $query = $this->nr_funcionario->count_all();
            return $query;
        }
        public function count_veiculo()
        {
            $query = $this->id_veiculo->count_all();
            return $query;
        }
        public function count_boleias()
        {
            $query = $this->id_viagem->count_all();
            return $query;
        }
        public function count_local()
        {
            $query = $this->id_local->count_all();
            return $query;
        }
    */




    public function boleias_mostrar(){
        $this->login_verify();
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->model('boleias_model');
        $data['boleias'] = $this->boleias_model->get_boleias_admin();
        $data['new_boleias'] = $this->boleias_model->get_main_locations_polos();
        $data['users'] = $this->boleias_model->get_users();
        $this->load->view('boleias_mostrar',   $data);
        $this->load->view('footer');
    }

    public function utilizadores_mostrar(){
        $this->login_verify();
        $this->load->helper('url');
        $this->load->model('utilizadores_model');
        $data['users'] = $this->utilizadores_model->get_users();
        $this->load->view('header');
        $this->load->view('utilizadores_mostrar', $data);
        $this->load->view('footer');
    }

    // nao se esquecer de passar os parametros a carregar a view, senao nao da
    public function locais_mostrar(){
        $this->login_verify();
        $this->load->helper('url');
        $this->load->model('locais_model');
        $data['locais'] = $this->locais_model->get_locals_membro();
        $this->load->view('header');
        $this->load->view('locais_mostrar', $data);
        $this->load->view('footer');
    }
    public function veiculos_mostrar(){
        $this->login_verify();
        $this->load->helper('url');
        $this->load->model('veiculos_model');
        $data['veiculos'] = $this->veiculos_model->get_veiculos();
        $this->load->view('header');
        $this->load->view('veiculos_mostrar', $data);
        $this->load->view('footer');
    }

    // para aparecer as cidades na down
    public function dadosBoleias(){
        $this->load->model('boleias_model');
        $result = $this->boleias_model->get_main_locations_polos();
        return $result;
    }

    //INSERIR

    public function inserir_utilizador(){
        $this->load->model('utilizadores_model');
        /*    $id_seguinte = $this->utilizadores_model->ultimo_id();
            $id_seguinte = $id_seguinte[0]->nr_funcionario +1; */
        $data['name'] = $this->input->post('name');
        $data['type'] = $this->input->post('type');
        $data['email'] = $this->input->post('email');
        $data['contact'] = $this->input->post('contact');
        $password = $this->input->post('password');
        $data['password'] = password_hash($password,PASSWORD_BCRYPT);



        if ($_FILES['file']['name'] == ""){
            $data['image'] ="http://boleiassoftinsa.radaresdeportugal.pt/pictures/empty_avatar.png" ;
        }else{
            $data['image'] = $_FILES['file'] ;
        }


        if($this->utilizadores_model->inserir_user($data)){
            redirect('Administrador_controller/utilizadores_mostrar');
        }
        else
            echo 'erro ao inserir';
    }


    public function inserir_veiculo(){
        /*        $id_seguinte = $this->veiculos_model->ultimo_id();
                $id_seguinte = $id_seguinte[0]->id_veiculo +1;      */
        $data['id_user'] = $this->input->post('id_user');
        $data['matricula'] = $this->input->post('matricula');
        $data['lugares'] = $this->input->post('lugares');
        $data['bagagem'] = $this->input->post('bagagem');

        if($this->veiculos_model->inserir_car($data)){
            redirect('Administrador_controller/veiculos_mostrar');
        }
        else
            echo 'erro ao inserir';
    }




    public function inserir_boleia()
    {
        $this->load->helper('url','database');
        $this->load->model('boleias_model');
        $data['id'] = $this->input->post('func');
        $data['matricula'] = $this->input->post('matricula');
        $data['lugares'] = $this->input->post('lugares');

        $data['origem'] = $this->input->post('origem');
        $data['destino'] = $this->input->post('destino');

        $data['data_partida'] = $this->input->post('hora_inicio');
        $data['data_chegada'] = $this->input->post('hora_fim');


        $data['economato'] = $this->input->post('economato');



            if ($this->boleias_model->inserir_ride_admin($data)) {
                redirect('Administrador_controller/boleias_mostrar');
            } else
                echo 'erro ao inserir';
        }


    public function inserir_local(){
        $this->load->model('Locais_model');
        $data['name'] = $this->input->post('name');
        $data['latitude'] = $this->input->post('latitude');
        $data['longitude'] = $this->input->post('longitude');
        $data['endereço'] = $this->input->post('endereço');
        if($this->Locais_model->inserir_local($data)){
            redirect('Administrador_controller/locais_mostrar');
        }
        else
            echo 'erro ao inserir';
    }

    //DELETE

    public function local_delete(){
        $this->load->model('Locais_model');
        $this->Locais_model->delete_local($this->input->get('id'));
        redirect('Administrador_controller/locais_mostrar');
    }

    public function user_delete(){
        $this->load->model('Utilizadores_model');

        //Não pode apagar o user admin com id = 64
        if($this->input->get('id') == "64"){
           // echo "<script>  alert('Não é possivel eliminar root-admin');</script>";
            redirect('Administrador_controller/utilizadores_mostrar');
        }else{
            $this->Utilizadores_model->delete_user($this->input->get('id'));
            redirect('Administrador_controller/utilizadores_mostrar');
        }



    }

    public function veiculo_delete(){
        $this->load->model('Veiculos_model');
        $this->Veiculos_model->delete_veiculo($this->input->get('id'));
        redirect('Administrador_controller/veiculos_mostrar');

    }

    public function boleia_delete(){
        $this->load->model('Boleias_model');
        $this->Boleias_model->delete_boleia($this->input->get('id'));
        redirect('Administrador_controller/boleias_mostrar');


    }


    public function edit_local() {

    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect("../index.php/login_controller/login");
    }
}