<?php

class Projects extends CI_Controller{

    public function  __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('error_message', 'Sorry You have to login in order to see the projects page.');
            redirect('/');
        }
    }

    public function index(){
        $data['main_view'] = "projects/index";
        $this->load->view('layouts/main', $data);
    }

}

?>