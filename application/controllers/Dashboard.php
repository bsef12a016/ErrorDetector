<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends CI_Controller{
    
    public function userDashboard() {
$pass=  $this->input->post('my');
print_r($pass);
        $session=  $this->session->all_userdata();
        $apiKey=$session["projapikey"];
        print_r($apiKey);
        
//        $this->load->view('Dashboard/header_dashboard');
 //       $this->load->view('Dashboard/userDashboard');
  //      $this->load->view('Dashboard/footer_dashboard');
    }
    
    public function error_details() {
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/error_details');
        $this->load->view('Dashboard/footer_dashboard');
    }
    
    public function settings() {
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/settings');
        $this->load->view('Dashboard/footer_dashboard');
    }
    public function logout(){
        
        redirect('Home/index');
    }
    public function addProject() {
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/addProject');
        $this->load->view('Dashboard/footer_dashboard');
    }
    public function projects() {
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/projects');
        $this->load->view('Dashboard/footer_dashboard');
    }
    
    public function myProject() {
//        $this->load->view('Dashboard/header_dashboard');
//        $this->load->view('Dashboard/projects');
//        $this->load->view('Dashboard/footer_dashboard');
    }
}