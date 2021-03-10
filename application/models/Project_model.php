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

}

?>