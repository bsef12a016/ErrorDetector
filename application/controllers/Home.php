<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
         $this->load->model('home_model');
    }
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
    public function contactSuccess() {
        $this->load->view('Home/header');
        $this->load->view('Home/contactSuccess');
        $this->load->view('Home/footer'); 
    }
    public function sendMail() {
        $name = $this->input->post("name");
        $subject = $this->input->post('subject');
        $emailFrom = $this->input->post('email');
        $message = $this->input->post('message');
        $date = date("Y-m-d h:i:sa");
        
//        $result = $this->dashboard_model->updateapikey($u_id ,['apikey'=>$val], $projectID);
//        $q=$this->dashboard_model->insert_project([
//                    'name'=>$pass,
//                    'u_id'=>$session["userID"], 
//                    'apikey'=>$val,
//                    'creation_date'=>  date("Y/m/d") 
//                    ]);
        
        
        $result = $this->home_model->insertVisitorMail([
                    'Name' => $name,
                    'Subject' => $subject,
                    'from' => $emailFrom,
                    'date' => $date,
                    'message' => $message
                ]);
        redirect('Home/contactSuccess');       

    }
}