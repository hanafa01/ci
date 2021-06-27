<?php 

class Tasks extends CI_Controller{

    public function index(){
        $this->load->view('tasks/index');
    }

    public function display($task_id){
        $data['projectid'] = $this->Task_model->get_task_project_id($task_id);
        $data['project_name'] = $this->Project_model->get_project_info($data['projectid'])->project_name;
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
                customFlash('The Task has been created successfully','projects/index', true);
                // $this->session->set_flashdata('success_message', 'The Task has been created successfully');
                // redirect('projects/index');
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
            $project_id = $this->Task_model->get_task_project_id($task_id);
            $data = array('project_id' => $project_id, 'task_name' => $this->input->post('task_name'), 'task_body' => $this->input->post('task_body'), 'due_date' => $this->input->post('due_date'));
            if($this->Task_model->edit_task($task_id,$data)){
                customFlash('The Task has been updated successfully','projects/index', true);
                // $this->session->set_flashdata('success_message', 'The Task has been updated successfully');
                // redirect('projects/index');
            }
        }
    }

    public function delete($project_id, $task_id){
        if($this->Task_model->delete_task($task_id)){
            customFlash('The Task has been deleted','projects/display/'.$project_id, true);
            // $this->session->set_flashdata('success_message', 'The Task has been deleted');
            // redirect('projects/display/'.$project_id);
        }
    }

    public function mark_complete($id){ 
        if($this->Task_model->mark_complete($id)){
            $projectid = $this->Task_model->get_task_project_id($id);
            customFlash('This task has been completed','projects/display/'.$projectid, true);
            // $this->session->set_flashdata('success_message','This task has been completed');
            // redirect('projects/display/'.$projectid);
        }
    }

    public function mark_incomplete($id){ 
        if($this->Task_model->mark_incomplete($id)){
            $projectid = $this->Task_model->get_task_project_id($id);
            customFlash('This task has marked as incompleted','projects/display/'.$projectid, false);
            // $this->session->set_flashdata('error_message','This task has marked as incompleted');
            // redirect('projects/display/'.$projectid);
        }
    }
}

?>