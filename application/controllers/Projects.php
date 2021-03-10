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
        $user_id = $this->session->userdata('user_id');
        $data['projects'] = $this->Project_model->get_projects_of_user($user_id);
        // $data['projects'] = $this->Project_model->get_projects();   //all products with different users
        $data['main_view'] = "projects/index";
        $this->load->view('layouts/main', $data);
    }

    public function display($projectid){
        $data['project_data'] = $this->Project_model->get_project($projectid);
        $data['main_view'] = "projects/display";
        $this->load->view('layouts/main', $data);
    }

    public function create(){
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
        $this->form_validation->set_rules('project_body', 'Project Body', 'trim|required');

        if($this->form_validation->run() == FALSE){
            $data['main_view'] = 'projects/create_project';
            $this->load->view('layouts/main', $data);
        }else{
            $data = array('user_id' => $this->session->userData('user_id'), 'project_name' => $this->input->post('project_name'), 'project_body' => $this->input->post('project_body'));
            if($this->Project_model->create_project($data)){
                $this->session->set_flashdata('success_message', 'The Project has been created');
                redirect("projects/index");
            }
        }
    }

    public function edit($projectid){
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
        $this->form_validation->set_rules('project_body', 'Project Body', 'trim|required');

        if($this->form_validation->run() == FALSE){
            $data['project_data'] = $this->Project_model->get_project_info($projectid);
            $data['main_view'] = 'projects/edit_project';
            $this->load->view('layouts/main', $data);
        }else{
            $data = array('user_id' => $this->session->userData('user_id'), 'project_name' => $this->input->post('project_name'), 'project_body' => $this->input->post('project_body'));
            if($this->Project_model->edit_project($projectid, $data)){
                $this->session->set_flashdata('success_message', 'The Project has been Updated');
                redirect("projects/index");
            }
        }
    }

    public function delete($projectid){
        $this->Project_model->delete_project($projectid);
        $this->session->set_flashdata('success_message', 'The Project has been Deleted');
        redirect("projects/index");
        
    }


}

?>