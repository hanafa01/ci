<?php

class Users extends CI_Controller{

    public function show($user_id){
        //$this->load->model('User_model');
        $data['results'] = $this->User_model->get_users($user_id);

        // foreach($result as $object){
        //     echo $object->username."<br/>";
        // }

        //$data['welcome'] = "Welcome to my page";

        $this->load->view('user_view', $data);
    }

}

?>