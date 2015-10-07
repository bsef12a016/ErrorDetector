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
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_FLASE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_TRUE){
            $errors=$this->admin_dashboard_model->getAllErrors();
            $year=date("Y");
            $lastOccur=array();
            foreach($errors as $value){
                $lastOccur[]=$value->lastOccurence;
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
            for ($i=0; $i < sizeof($years);$i++){
                if($years[$i]===$year){
                $this_year_errorsDates[]=$months[$i];
            }
            }
            $data['months']=$months;
            $this->session->set_userdata(USER_COUNT, $this->admin_dashboard_model->userCount());
            $this->session->set_userdata(PROJECTS_COUNT, $this->admin_dashboard_model->projectCount());
            $this->session->set_userdata(ERRORS_COUNT, $this->admin_dashboard_model->errorCount());
            $this->load->view('AdminDashboard/header_adminDashboard');
            $this->load->view('AdminDashboard/adminDashboard',$data);
            $this->load->view('AdminDashboard/footer_adminDashboard');
            } else {
                redirect('Home/index');
            }
    }
    public function getadmerrors() {
        $q = $this->admin_dashboard_model->errorCount();
        echo json_encode($q);
    }
    public function logout(){
        $session=  $this->session->all_userdata();
        if($session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $logoutDate = date("Y-m-d h:i:sa");
            $this->user_model->setStatusLogout(['lastLogout' => $logoutDate,
                'status' => 0]);
        }
        $this->session->set_userdata(LOGIN_STATUS, LOGIN_STATUS_FLASE);
        redirect('Home/index');
    }
    public function show_map(){
         $this->load->view('AdminDashboard/map');
    }   
}