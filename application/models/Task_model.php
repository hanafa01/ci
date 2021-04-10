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

    public function mark_complete($taskid){   //0 complete
        $this->db->set('status', 0);
        $this->db->where('id', $taskid);
        $this->db->update('tasks');

        return true;
    }

    public function mark_incomplete($taskid){
        $this->db->set('status', 1);
        $this->db->where('id', $taskid);
        $this->db->update('tasks');

        return true;
    }

    public function get_tasks_of_user($user_id){
        $this->db->where('projects.user_id', $user_id);
        $this->db->join('tasks', 'projects.id = tasks.project_id');
        $query = $this->db->get('projects');
        return $query->result();
    }
}

?>