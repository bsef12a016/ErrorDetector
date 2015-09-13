<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class admin_dashboard_model extends CI_Model{
    
    public function userCount() {
        return $this->db->count_all('user');
    }
    public function projectCount() {
        return $this->db->count_all('project');
    }
    public function errorCount() {
        return $this->db->count_all('error_metadata');
    }
}