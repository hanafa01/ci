<?php 

class Task_model extends CI_Model{
    
    public function get_task($task_id){
        $this->db->where('id', $task_id);
        $query = $this->db->get('tasks');

        return $query->row();
    }

    public function create_task($data){
        $query = $this->db->insert('tasks',$data);   
        return $query;
    }

    public function get_task_info($task_id){
        $this->db->where('id',$task_id);
        $query = $this->db->get('tasks');
        return $query->row();
    }

    public function get_task_project_id($task_id){
        $this->db->where('id',$task_id);
        $query = $this->db->get('tasks');
        return $query->row()->project_id;
    }

    public function edit_task($task_id, $data){
        $this->db->where('id', $task_id);
        $this->db->update('tasks', $data);

        return true;
    }

    public function delete_task($task_id){
        $this->db->where('id', $task_id);
        $this->db->delete('tasks');

        return true;
    }
}

?>