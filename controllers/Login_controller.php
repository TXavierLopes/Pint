<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    function __construct(){
        parent :: __construct();
        $this->load->helper('url','database');
        $this->load->model('login_model');
    }

    public function login()
    {		$this->load->view('login_view');

    }

    public function index()
    {
        $this->load->helper('url');


        $this->load->view('Login_view');

    }



    function login_validation()
    {


        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');


        if($this->form_validation->run() == TRUE)
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');


            $result = $this->login_model->can_login($username, $password);

            if ($result) {

                if($result[0]->type == 1){
                    $session_data = array(
                        'id' => $result[0]->id,
                        'cargo' => $result[0]->type,
                        'username' => $username
                    );
                    $this->session->set_userdata($session_data);
                    redirect('Administrador_controller/index');

                }elseif ($result[0]->type == 2){
                    $session_data = array(
                        'id' => $result[0]->id,
                        'cargo' => $result[0]->type,
                        'username'     => $username,
                    );
                    $this->session->set_userdata($session_data);
                    redirect('Administrativo_controller/administrativo_view');

                }elseif ($result[0]->type == 0){
                    $session_data = array(
                        'id' => $result[0]->id,
                        'cargo' => $result[0]->type,
                        'username'  => $username,
                    );
                    $this->session->set_userdata($session_data);
                    redirect('Membro_controller/');
                }

            }
            else {
                redirect('Login_controller/login');
            }
        }
    }
}
?>