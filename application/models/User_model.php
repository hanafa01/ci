<?php

class User_model extends CI_Model{

    public function get_users($user_id, $username){
        // $config['hostname'] = 'localhost';
        // $config['username'] = 'root';
        // $config['password'] = '';
        // $config['database'] = 'codeigniter_errand_db';

        // $connection = $this->load->database($config);

        //$query = $this->db->get('users');
        //return $query->result(); //array of object

        //$query = $this->db->query("SELECT * FROM users");
        //return $query->num_rows(); // num of rows
        //return $query->num_fields(); // num of columns


        //select data based on parameters
        $this->db->where(['id' => $user_id, 'username' => $username]);
        $query = $this->db->get('users');
        return $query->result(); //array of object


    }

    public function create_user($data){
        $this->db->insert('users', $data);
    }

    public function update_user($data, $id){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}

?>