<?php

class Projects extends CI_Controller{

    public function  __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            customFlash('Sorry You have to login in order to see the projects page.','/', false);
            // $this->session->set_flashdata('error_message', 'Sorry You have to login in order to see the projects page.');
            // redirect('/');
        }
    }

    public function index(){
        $user_id = $this->session->userdata('user_id');
        // $data['projects'] = $this->Project_model->get_projects_of_user($user_id);
        // $data['projects'] = $this->Project_model->get_projects();   //all products with different users
        $data['main_view'] = "projects/index";

        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/ci/index.php/projects/index/';
        $config['total_rows'] = count($this->Project_model->get_projects_of_user($user_id));
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
        
        $config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';

        $config['first_tag_open'] = '<li class="pl-1 pr-1 m-2" style="border: 1px solid violet">';
        $config['first_tag_close'] = '</li>';

        $config["last_tag_open"] = '<li class="pl-1 pr-1 m-2" style="border: 1px solid pink">';
		$config["last_tag_close"] = '</li>';

        $config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li class="pl-1 pr-1 m-2" style="border: 1px solid green">';
		$config["next_tag_close"] = '</li>';

        $config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li class='pl-1 pr-1 m-2' style='border: 1px solid #EB5757'>";
		$config["prev_tag_close"] = "</li>";
        
        $config["cur_tag_open"] = "<li class='pl-1 pr-1 m-2' style='border: 1px solid #000'><a style='font-weight: bold; color: black' href='#'>";
		$config["cur_tag_close"] = "</a></li>";

		$config["num_tag_open"] = "<li class='pl-1 pr-1 m-2' style='border: 1px solid blue'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 3;

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $page = $this->uri->segment(3);
        if(!isset($page)){
            $page = 1;    
        }
        $start = ($page - 1) * $config["per_page"];

        $data['projects'] = $this->Project_model->get_projects_of_user_with_pagination($user_id, $start, $config['per_page']);
        $this->load->view('layouts/main', $data);
    }

    public function display($projectid){
        $data['completed_tasks'] = $this->Project_model->get_project_tasks($projectid, true);
        $data['not_completed_tasks'] = $this->Project_model->get_project_tasks($projectid, false);
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
                customFlash('The Project has been created','projects/index', true);
                // $this->session->set_flashdata('success_message', 'The Project has been created');
                // redirect("projects/index");
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
                customFlash('The Project has been Updated','projects/index', true);
                // $this->session->set_flashdata('success_message', 'The Project has been Updated');
                // redirect("projects/index");
            }
        }
    }

    public function delete($projectid){
        $this->Project_model->delete_project($projectid);
        customFlash('The Project has been Deleted','projects/index', true);
        // $this->session->set_flashdata('success_message', 'The Project has been Deleted');
        // redirect("projects/index");
        
    }


}

?>