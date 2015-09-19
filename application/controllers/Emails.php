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
    
              
    public function yearlyUserMails() {
        
        $userMails=$this->emails_model->getUsersMail();
        $year=date("Y");
        $lastOccur=array();
            foreach($userMails as $value){
                $lastOccur[]=$value->date;
                }
                $years=array(); 
                foreach ($lastOccur as $s) {
                    if(ord($s[0])>=48 && ord($s[0])<=57){
                        $years[] = date('Y', strtotime($s));
                        }
                        else if($s[0]=='?'){
                            $p = explode("?", $s);
                            $d = implode($p);
                            $date= date('Y', strtotime($d));
                            $years[] = $date;	
                            }
                            else{
                                $p = explode(" ", $s);
                                $d=$p[1]." ".$p[2]." ".$p[3];
                                $date= date('Y', strtotime($d));
                                $years[] =$date;        	
                                }
                                }
                                
                                $months=array(); 
                                foreach ($lastOccur as $s) {
                                    if(ord($s[0])>=48 && ord($s[0])<=57){
                                        $months[] = date('m', strtotime($s));
                                        }
                                        else if($s[0]=='?'){
                                            $p = explode("?", $s);
                                            $d = implode($p);
                                            $date= date('m', strtotime($d));
                                            $months[] = $date;	
                                            }
                                            else{
                                                $p = explode(" ", $s);
                                                $d=$p[1]." ".$p[2]." ".$p[3];
                                                $date= date('m', strtotime($d));
                                                $months[] =$date;        	
                                                }
                                                }
                                                
                                                $this_year_errorsDates=array();
                                                for ($i=0; $i < sizeof($years);$i++)
                                                {
                                                    if($years[$i]===$year)
                                                        {
                                                        $this_year_errorsDates[]=$months[$i];
                                                        }
                                                        }
                                                        
                                                            return $months;
                                                           
                                                                    }
                                                                    
    public function yearlyVisitorMails() {
        
        $visitorMails=$this->emails_model->getVisitorsMail();        
        $year=date("Y");
        $lastOccur=array();
            foreach($visitorMails as $value){
                $lastOccur[]=$value->date;
                }
                $years=array(); 
                foreach ($lastOccur as $s) {
                    if(ord($s[0])>=48 && ord($s[0])<=57){
                        $years[] = date('Y', strtotime($s));
                        }
                        else if($s[0]=='?'){
                            $p = explode("?", $s);
                            $d = implode($p);
                            $date= date('Y', strtotime($d));
                            $years[] = $date;	
                            }
                            else{
                                $p = explode(" ", $s);
                                $d=$p[1]." ".$p[2]." ".$p[3];
                                $date= date('Y', strtotime($d));
                                $years[] =$date;        	
                                }
                                }
                                
                                $months=array(); 
                                foreach ($lastOccur as $s) {
                                    if(ord($s[0])>=48 && ord($s[0])<=57){
                                        $months[] = date('m', strtotime($s));
                                        }
                                        else if($s[0]=='?'){
                                            $p = explode("?", $s);
                                            $d = implode($p);
                                            $date= date('m', strtotime($d));
                                            $months[] = $date;	
                                            }
                                            else{
                                                $p = explode(" ", $s);
                                                $d=$p[1]." ".$p[2]." ".$p[3];
                                                $date= date('m', strtotime($d));
                                                $months[] =$date;        	
                                                }
                                                }
                                                
                                                $this_year_errorsDates=array();
                                                for ($i=0; $i < sizeof($years);$i++)
                                                {
                                                    if($years[$i]===$year)
                                                        {
                                                        $this_year_errorsDates[]=$months[$i];
                                                        }
                                                        }
                                                        

                                                           return $months; 
                                                           
                                                                    }
    
    public function userMails() {
        
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_FLASE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_TRUE){       
            $this->session->set_userdata([USER_EMAIL_STATUS => USER_EMAIL_STATUS_TRUE]);
            $this->session->set_userdata([VISITOR_EMAIL_STATUS => VISITOR_EMAIL_STATUS_FALSE]);

            $data['userMails_months']=$this->yearlyUserMails();
            $data['visitorMails_months']=  $this->yearlyVisitorMails();
            $data['usermails']=$this->emails_model->getUsersMail();
            $this->load->view('Emails/header_email', $data);
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

            $data['userMails_months']=$this->yearlyUserMails();
            $data['visitorMails_months']=  $this->yearlyVisitorMails();
            $data['visitormails']=$this->emails_model->getVisitorsMail();
            $this->load->view('Emails/header_email', $data);
            $this->load->view('Emails/visitorsMails', $data);
            $this->load->view('Emails/footer_email');     
        }
    }
}