<?php 

class Tasks extends CI_Controller{

    public function index(){
        $this->load->view('tasks/index');
    }

    public function display($task_id){
        $data['task'] = $this->Task_model->get_task($task_id);
        $data['main_view'] = 'tasks/display';
        $this->load->view('layouts/main', $data);
    }

    public function create($project_id){
        $this->form_validation->set_rules('task_name', 'Task Name', 'required|trim');
        $this->form_validation->set_rules('task_body', 'Task Body', 'required|trim');

        if($this->form_validation->run() == FALSE){
            $data['main_view'] = 'tasks/create_task';
            $this->load->view('layouts/main', $data);
        }else{
            $data = array('project_id' => $project_id, 'task_name' => $this->input->post('task_name'), 'task_body' => $this->input->post('task_body'), 'due_date' => $this->input->post('due_date'));
            if($this->Task_model->create_task($data)){
                $this->session->set_flashdata('success_message', 'The Task has been created successfully');
                redirect('projects/index');
            }
        }
    }

    public function edit($task_id){
        $this->form_validation->set_rules('task_name', 'Task Name', 'required|trim');
        $this->form_validation->set_rules('task_body', 'Task Body', 'required|trim');

        if($this->form_validation->run() == FALSE){
            $data['task_info'] = $this->Task_model->get_task_info($task_id);
            $data['main_view'] = 'tasks/edit_task';
            $this->load->view('layouts/main', $data);
        }else{
            $data = array('project_id' => $this->input->post('project_id'), 'task_name' => $this->input->post('task_name'), 'task_body' => $this->input->post('task_body'), 'due_date' => $this->input->post('due_date'));
            if($this->Task_model->edit_task($task_id,$data)){
                $this->session->set_flashdata('success_message', 'The Task has been updated successfully');
                redirect('projects/index');
            }
        }
    }

}

?>