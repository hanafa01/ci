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

    public function login(){
        //echo $_POST['username'];

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirme Password', 'trim|required|min_length[3]|matches[password]');

        if($this->form_validation->run() == FALSE){
            $data = array('errors' => validation_errors());
            $this->form_validation->set_message();
            $this->session->set_flashdata($data);
            redirect('home');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->User_model->login_user($username, $password);
        }
        // echo $this->input->post('username');
    }

}

?>