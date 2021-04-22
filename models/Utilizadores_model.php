<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('../api/vendor/abeautifulsite/simpleimage/src/abeautifulsite/SimpleImage.php');

class utilizadores_model extends CI_Model {

    public function get_users(){
        $query = $this->db->get('users');
        return $query->result();
    }

    public function inserir_user($dados){

        //tratamento imagem

        if ($dados['image'] != "http://boleiassoftinsa.radaresdeportugal.pt/pictures/empty_avatar.png"){

            $name=uniqid();
            $image_path = "";

            if (isset($_FILES['file'])) {

                if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                    return;
                }
                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                if (in_array($ext, array("png", "jpg", "jpeg", "gif", "bmp", "jp2"))) {

                    $file = $_FILES['file']['tmp_name'];

                    try {

                        $img = new abeautifulsite\SimpleImage($file);

                        $img->best_fit(300,300)->save('/var/www/html/uploads/'.$name.'.'.$ext);

                        $image_path = 'http://boleiassoftinsa.radaresdeportugal.pt/uploads/' . $name . '.' . $ext;
                    } catch (Exception $e) {
                        return;
                    }
                }
            }

            if (!empty($image_path)){
                $dados['image'] = $image_path;
            }
        }


        if($this->db->insert('users', $dados)){
            return 'inserido com sucesso';
        } else{
            return 'erro ao inserir';
        }
    }

    public function update_user($data){

        //tratamento imagem

        $name=uniqid();
        $image_path = "";


        if (isset($_FILES['file'])) {

            if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                return;
            }
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (in_array($ext, array("png", "jpg", "jpeg", "gif", "bmp", "jp2"))) {

                $file = $_FILES['file']['tmp_name'];
                try {

                    $img = new abeautifulsite\SimpleImage($file);

                    $img->best_fit(300,300)->save('/var/www/html/uploads/'.$name.'.'.$ext);

                    $image_path = 'http://boleiassoftinsa.radaresdeportugal.pt/uploads/' . $name . '.' . $ext;
                } catch (Exception $e) {
                    return;
                }
            }
        }

        if (!empty($image_path)){
            $data['image'] = $image_path;
        }


        $data['password'] = password_hash($data['password'],PASSWORD_BCRYPT );
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);


    }

    public function ultimo_id(){
        $this->db->limit(1);
        $this->db->select('nr_funcionario');
        $this->db->order_by('nr_funcionario','DESC');
        $result = $this->db->get('funcionario');
        return $result->result();
    }
    public function get_dados_by_id($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        return $this->db->get()->result_array();
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
 