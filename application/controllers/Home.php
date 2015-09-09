<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller{
    public function index() {
        session_destroy();
        $this->load->library('session');
        $this->session->set_userdata('login_status','');
        $this->load->view('Home/header');
        $this->load->view('Home/index');
        $this->load->view('Home/footer');

    }
    public function pricing() {
        $this->load->view('Home/header');
        $this->load->view('Home/pricing');
        $this->load->view('Home/footer');
    }
    public function tour() {
        $this->load->view('Home/header');
        $this->load->view('Home/tour');
        $this->load->view('Home/footer');      
    }
    public function features() {
        $this->load->view('Home/header');
        $this->load->view('Home/features');
        $this->load->view('Home/footer');    
    }
    public function docs() {
        $this->load->view('Home/header');
        $this->load->view('Home/docs');
        $this->load->view('Home/footer');    
    }
    public function about() {
        $this->load->view('Home/header');
        $this->load->view('Home/about');
        $this->load->view('Home/footer');   
    }
    public function contact() {
        $this->load->view('Home/header');
        $this->load->view('Home/contact');
        $this->load->view('Home/footer');   
    }

    public function sendMail() {
        $name=  $this->input->post('name');
        $telNumber=  $this->input->post('phoneNum');
        $emailFrom=  $this->input->post('email');
        $message=  $this->input->post('message');
        $subject = "Message"; 
        
        $this->load->library('email');
        
        $this->email->from($emailFrom , 'Nabeel');
        $this->email->to('nabeel.akhtar1993@gmail.com');
        
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        
        if($this->email->send())        
        {
            
            echo 'Worked';
        }
    }
       
    public function tes()
    {
//       $this->load->database();
//        $g=$this->db->get('user');
//        print_r($g->result());
//        
//        $q=$this->db->delete('user', ['first_name'=>'khizra']);
//        print_r($q);
    }
    
}