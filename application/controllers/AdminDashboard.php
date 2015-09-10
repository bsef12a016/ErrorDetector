<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminDashboard extends CI_Controller{
    public function __construct() {
        parent::__construct();
         $this->load->model('admin_dashboard_model');
    }
    
    public function adminDashboard() {
        $this->load->view('AdminDashboard/header_adminDashboard');
        $this->load->view('AdminDashboard/adminDashboard');
        $this->load->view('AdminDashboard/footer_adminDashboard');
    }
    public function graphs() {
        $this->load->view('AdminDashboard/header_adminDashboard');
        $this->load->view('AdminDashboard/graphs');
        $this->load->view('AdminDashboard/footer_adminDashboard');
    }

}