<?php

class Users extends CI_Controller{

    public function show(){
        //$this->load->model('User_model');
        $result = $this->User_model->get_users();

        // foreach($result as $object){
        //     echo $object->username."<br/>";
        // }

        $data['welcome'] = "Welcome to my page";

        $this->load->view('user_view', $data);
    }

}

?>