<?php

class User_model extends CI_Model{

    public function get_users(){
        $config['hostname'] = 'localhost';
        $config['username'] = 'root';
        $config['password'] = '';
        $config['database'] = 'codeigniter_errand_db';

        $connection = $this->load->database($config);

    }

}

?>