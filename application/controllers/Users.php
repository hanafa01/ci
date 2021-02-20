<?php

class Users extends CI_Controller{

    public function show(){
        $this->load->model('User_model');
        $result = $this->User_model->get_users();
    }

}

?>