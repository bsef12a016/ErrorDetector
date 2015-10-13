<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard_model extends CI_Model{
    
    public function insert_project($d){
        $this->db->insert('project', $d);
        return $this->db->insert_id();
    }
    public function chekProjectName($projNmae){
        if($projNmae!=null){
            $this->db->where(['name' => $projNmae]);
            $q=$this->db->get('project');            
        }
        return $q->result();
    }
    public function getUser($u_id){
        $this->db->where(['id' => $u_id]);
        $q=$this->db->get('user');   
        return $q->result();            
    }
    public function get_projects(){
        $session=  $this->session->all_userdata();
        $id = $session[USER_ID];
        $this->db->where(['u_id' => $id]);
        $q=$this->db->get('project');            
        return $q->result();
    }    
    public function updateapikey($u_id, $apikey, $projectID){
        if($this->projectExistenceCheck($u_id, $projectID)){
            $this->db->where(['id'=>$projectID]);
            $this->db->update('project',$apikey);
            return $this->db->affected_rows();
        }else{
            return NULL;    
        }
    }
    public function get_projectsID($u_id, $projectID){
        $session = $this->session->all_userdata();
        $this->db->where(['id' => $projectID, 'u_id' => $u_id]);
        $q = $this->db->get('project');            
        if($q){
            return $q->result();
        }else{
            return NULL;
        }
    }
    public function get_errors($u_id = NULL, $proj_id = NULL){
        if($proj_id == NULL && $u_id == NULL){
            return "empty";
        }
        else {
            if($this->projectExistenceCheck($u_id, $proj_id)){
                $this->db->where(['project_id' => $proj_id]);
                $this->db->order_by("lastOccurence", "desc");
                $q = $this->db->get('error_metadata');
                if(empty($q)){
                    return "empty";                
                }  else {
                    return $q->result();
                }
            }  else {
                return "empty";                
            }
        }
    }    
    public function get_errorsByProjectId($proj_id){
        $this->db->where(['project_id' => $proj_id]);
        $q=$this->db->get('error_metadata');            
        return $q->result();
    }    
    public function get_errorsprproj($proj_id=NULL){
        $this->db->where(['project_id' => $proj_id]);
        $q=$this->db->get('error_metadata'); 
        $s=$q->num_rows();
        return $s;
    }
    public function get_error_details($u_id, $id = null,$proj_id = NULL){
        if($this->projectExistenceCheck($u_id, $proj_id)){
            $this->db->where(['project_id' => $proj_id]);
            $this->db->where(['id' => $id]);
            $q=$this->db->get('error_metadata');            
            return $q->result();
        }    
        else{
            return NULL;
        }
    }
    public function projectExistenceCheck($u_id, $projectID) {
        $this->db->where(['u_id' => $u_id]);
        $this->db->where(['id' => $projectID]);
        $result = $this->db->get('project');
        if($result){
            return TRUE;
        }
        return FALSE;
    }
    public function deleteproject($u_id, $projectID){
        $session = $this->session->all_userdata();
        $this->db->where(['id' => $projectID, 'u_id' => $u_id]);
        $result = $this->db->get('project');            
        if($result){
            $this->db->where(['id'=>$projectID]);
            $this->db->delete('project');
            return $this->db->affected_rows();        
        }
    }  
    public function insertUserMail($data){
        $this->db->insert('user_mails', $data);
        return $this->db->insert_id();
    }
    
    
}