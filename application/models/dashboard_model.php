<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard_model extends CI_Model{
    
    public function insert_project($d)
    {
        $this->db->insert('project', $d);
        return $this->db->insert_id();
    }
    public function chekProjectName($projNmae)
    {
        if($projNmae!=null)
        {
            $this->db->where(['name' => $projNmae]);
            $q=$this->db->get('project');            
        }
        return $q->result();
    }
    public function get_projects(){
        $session=  $this->session->all_userdata();
        $id=$session['userID'];
        $this->db->where(['u_id' => $id]);
        $q=$this->db->get('project');            
        return $q->result();
    }    
    
    public function get_errors($proj_id=NULL)
    {
        if($proj_id==null)
        {
            $q=$this->db->get('user');            
        }
        else {
            $this->db->where(['project_id' => $proj_id]);
            $q=$this->db->get('error_metadata');            
        }
        return $q->result();
    }    
    
    public function get_error_details($id=null,$proj_id=NULL)
    {
        $this->db->where(['project_id' => $proj_id]);
        $this->db->where(['id' => $id]);
        $q=$this->db->get('error_metadata');            
        return $q->result();
    }    
    
    
    
    
    public function insert($d)
    {
        $this->db->insert('user', $d);
        return $this->db->insert_id();
    }
    public function update($d,$u_id)
    {
        $this->db->where(['id'=>$u_id]);
        $this->db->update('user',$d);
        return $this->db->affected_rows();
    }
    public function delete($u_id)
    {
        $this->db->where(['id'=>$u_id]);
        $this->db->delete('user');
        return $this->db->affected_rows();        
    }
}