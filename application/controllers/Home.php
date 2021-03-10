<?php

class Home extends CI_Controller{

    public function index(){
        if($this->session->userData('logged_in')){
            $data['my_projects'] = $this->Project_model->get_projects_of_user($this->session->userData('user_id'));
        }
        
        $data['main_view'] = "home_view";
        $this->load->view('layouts/main', $data);
    }

}

?>