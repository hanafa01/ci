<?php 

class Project_model extends CI_Model{

    public function get_projects(){
        $query = $this->db->get('projects');
        return $query->result();
    }

    public function get_project($project_id){
        $this->db->where('id', $project_id);
        $query = $this->db->get('projects');
        return $query->row();
    }

    public function create_project($data){
        $query = $this->db->insert('projects', $data);
        return $query;
    }

    public function edit_project($projectid, $data){
        $this->db->where(['id' => $projectid]);
        $this->db->update('projects', $data);
        return true;
    }

    public function delete_project($projectid){
        $this->db->where('id', $projectid);
        $this->db->delete('projects');
    }

    public function get_projects_of_user($userid){
        $this->db->where('user_id', $userid);
        $query = $this->db->get('projects');
        return $query->result();
    }

    public function get_project_info($projectid){
        $this->db->where('id', $projectid);
        return $this->db->get('projects')->row();
    }

    public function get_project_tasks($project_id, $active = true){
        $this->db->select('tasks.id as task_id, tasks.task_name, tasks.task_body, projects.project_name, projects.project_body');
        $this->db->from('tasks');
        $this->db->join('projects', 'tasks.project_id = projects.id');
        $this->db->where('tasks.project_id', $project_id);
        if($active == true){
            $this->db->where('tasks.status', 0);
        }else{
            $this->db->where('tasks.status', 1);
        }

        $query = $this->db->get();
        if($query->num_rows() < 1){
            return false;
        }
        return $query->result(); 
    }

}

?>