<?php

class Users extends CI_Controller{

    public function show($user_id){
        //$this->load->model('User_model');
        $data['results'] = $this->User_model->get_users($user_id, 'hana');

        // foreach($result as $object){
        //     echo $object->username."<br/>";
        // }

        //$data['welcome'] = "Welcome to my page";

        $this->load->view('user_view', $data);
    }

    public function insert(){
        $username = "jaja";
        $password = "jaja";
        $this->User_model->create_user(['username' => $username, 'password' => $password]);
    }

    public function update(){
        $id = 5;

        $username = "kaja";
        $password = "jaja";
        $this->User_model->create_user(['username' => $username, 'password' => $password], $id);
    }
    

    public function delete(){
        $id = 6;
        $this->User_model->delete_user($id);
    }

}

?>