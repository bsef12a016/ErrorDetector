<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class user_model extends CI_Model
{
    public function get($user_id = null){        
        if($user_id != null){
            $this->db->where(['id' => $user_id]);
            $q = $this->db->get('user');
            if($q){
                return $q->result();
            }
            else {
                return NULL;   
            }
        }
        return NULL;   
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
    
    public function setStatus($data) {
        $session = $this->session->all_userdata();
        $this->db->where(['id'=>$session[USER_ID]]);
        $this->db->update('user', $data);
        return $this->db->insert_id();
    }
    public function setStatusLogout($data) {
        $session = $this->session->all_userdata();
        $this->db->where(['id'=>$session[USER_ID]]);
        $this->db->update('user', $data);
        return $this->db->insert_id();
    }
    public function checkProjectCount($userID) {
        $this->db->where(['u_id' => $userID]);
        return $this->db->count_all_results('project');
    }
    
}


