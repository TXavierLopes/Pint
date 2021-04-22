<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrativo_controller extends CI_Controller
{
    public function login_verify(){
        if (!isset($_SESSION['id'])) { //not logged in
            redirect("Login_controller/login");
        }
       /* elseif($_SESSION['type'] != '2' ){
            if ($_SESSION['type'] == 0) {
                redirect("Membro_controller");
            }else{
                redirect("Administrador_controller");
            }
        }*/

    }

    public function administrativo_view()
    {
        $this->login_verify();
        $this->load->helper('url');
        $this->load->model('Boleias_model');
        $data['boleias'] = $this->Boleias_model->get_boleias_administrativo();


        $this->load->view('header_administrativo');

        $this->load->view('administrativo_view', $data);
        $this->load->view('footer');
    }

    public function inserir_economato(){
        $this->load->model('Boleias_model');
        $data['material'] = $this->input->post('material');
        $data['estado'] = $this->input->post('estado');
        $data['id'] = $this->input->post('id_boleia');


        if($this->Boleias_model->inserir_economato($data)){
            redirect('Administrativo_controller/administrativo_view');
        }
        else
            echo 'erro ao inserir';
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect("../index.php/login_controller/login");
    }

}
    //ADMINISTRATIVO: 
            //LISTAR AS BOLEIAS QUE ACEITARAM LEVAR ECONOMATO 
            //BOTAO EDIT: 
                //Estado da encomenda(entregue, nao entregue), material que levou(texto)