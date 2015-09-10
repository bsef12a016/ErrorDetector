<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class home_model extends CI_Model
{
    public function insertVisitorMail($data){
        $this->db->insert('visitors_mails', $data);
        return $this->db->insert_id();
    }
}


