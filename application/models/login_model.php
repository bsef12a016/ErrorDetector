<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class login_model extends CI_Model
{
    public function get($uname=null,$password=null)
    {
        $this->db->where(['username' => $uname, 'password'=>$password]);
        $q=$this->db->get('login');            
        return $q->result();
    }
        
    public function insert($d)
    {
        $this->db->insert('login', $d);
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


