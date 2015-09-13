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
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_FLASE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_TRUE){       
            $this->session->set_userdata([USER_EMAIL_STATUS => USER_EMAIL_STATUS_TRUE]);
            $this->session->set_userdata([VISITOR_EMAIL_STATUS => VISITOR_EMAIL_STATUS_FALSE]);

            $data['usermails']=$this->emails_model->getUsersMail();
            $this->load->view('Emails/header_email');
            $this->load->view('Emails/userMails', $data);
            $this->load->view('Emails/footer_email');        
        }
    }
    public function visitorsMails() {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_FLASE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_TRUE){       
            $this->session->set_userdata([USER_EMAIL_STATUS => USER_EMAIL_STATUS_FLASE]);
            $this->session->set_userdata([VISITOR_EMAIL_STATUS => VISITOR_EMAIL_STATUS_TRUE]);

            $data['visitormails']=$this->emails_model->getVisitorsMail();
            $this->load->view('Emails/header_email');
            $this->load->view('Emails/visitorsMails', $data);
            $this->load->view('Emails/footer_email');     
        }
    }
}