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

    public function register(){

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirme Password', 'trim|required|min_length[3]|matches[password]');

        if($this->form_validation->run() == FALSE){
            $data['main_view'] = 'users/register_view';
            $this->load->view('layouts/main', $data);
        }else{
            if($this->User_model->create_user()){
                customFlash('User Has been Registered','home/index', true);
                // $this->session->set_flashdata('success_message', 'User Has been Registered');
                // redirect('home/index');
            }else{
                 
            }
        }

    }

    public function login(){
        //echo $_POST['username'];

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirme Password', 'trim|required|min_length[3]|matches[password]');

        if($this->form_validation->run() == FALSE){
            $data = array('errors' => validation_errors());
            $this->session->set_flashdata($data);
            redirect('home');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user_id = $this->User_model->login_user($username, $password);
            if($user_id){
                $user_data = array('user_id' => $user_id, 'username' => $username, 'logged_in' => true);
                $this->session->set_userdata($user_data);
                customFlash('You are logged in!','home/index', true);
            }else{
                customFlash('You are not logged in!','home/index', false);
                // $this->session->set_flashdata('error_message', 'You are not logged in!');
                // redirect('home/index');
            }
        }
        // echo $this->input->post('username');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('home/index');
    }

}

?>