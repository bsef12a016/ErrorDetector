<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Emails extends CI_Controller{
    public function __construct() {
        parent::__construct();
         $this->load->model('emails_model');
    }
    
    public function userMails() {
        $data['usermails']=$this->emails_model->getUsersMail();
        $this->load->view('Emails/header_email');
        $this->load->view('Emails/userMails', $data);
        $this->load->view('Emails/footer_email');        
    }
    public function visitorsMails() {
        $data['visitormails']=$this->emails_model->getVisitorsMail();
        $this->load->view('Emails/header_email');
        $this->load->view('Emails/visitorsMails', $data);
        $this->load->view('Emails/footer_email');        
    }
}