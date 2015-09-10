<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class emails_model extends CI_Model{
    
    public function getUsersMail() {
        $query = $this->db->get('user_mails');            
        return $query->result();
    }
    public function getVisitorsMail() {
        $query = $this->db->get('visitors_mails');            
        return $query->result();        
    }
}