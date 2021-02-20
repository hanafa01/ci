<?php

class User_model extends CI_Model{

    public function get_users(){
        // $config['hostname'] = 'localhost';
        // $config['username'] = 'root';
        // $config['password'] = '';
        // $config['database'] = 'codeigniter_errand_db';

        // $connection = $this->load->database($config);

        //$query = $this->db->get('users');
        //return $query->result(); //array of object

        $query = $this->db->query("SELECT * FROM users");
        return $query->num_rows(); // num of rows


    }

}

?>