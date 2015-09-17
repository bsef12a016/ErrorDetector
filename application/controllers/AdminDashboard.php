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
        
        $errors=$this->admin_dashboard_model->getAllErrors();
        $year=date("Y");

        $lastOccur=array();
            foreach($errors as $value){
                $lastOccur[]=$value->lastOccurence;
                }
                $dates=array(); 
                foreach ($lastOccur as $s) {
                    if(ord($s[0])>=48 && ord($s[0])<=57){
                        $dates[] = date('m', strtotime($s));
                        }
                        else if($s[0]=='?'){
                            $p = explode("?", $s);
                            $d = implode($p);
                            $date= date('Y-m-d', strtotime($d));
                            $dates[] = $date;	
                            }
                            else{
                                $p = explode(" ", $s);
                                $d=$p[1]." ".$p[2]." ".$p[3];
                                $date= date('Y-m-d', strtotime($d));
                                $dates[] =$date;        	
                                }
                                }
                                foreach ($dates as $v)
                                {
                                    print_r($v);
                                }
//        $session=  $this->session->all_userdata();
//        if($session[LOGIN_STATUS] == LOGIN_STATUS_FLASE 
//                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_TRUE){
//            $this->session->set_userdata(USER_COUNT, $this->admin_dashboard_model->userCount());
//                
//            $this->session->set_userdata(PROJECTS_COUNT, $this->admin_dashboard_model->projectCount());
//                
//            $this->session->set_userdata(ERRORS_COUNT, $this->admin_dashboard_model->errorCount());
//                
//            $this->load->view('AdminDashboard/header_adminDashboard');
//            $this->load->view('AdminDashboard/adminDashboard');
//            $this->load->view('AdminDashboard/footer_adminDashboard');
//        } else {
//            redirect('Home/index');
//        }
    }
    public function graphs() {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_FLASE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_TRUE){       
            $this->load->view('AdminDashboard/header_adminDashboard');
            $this->load->view('AdminDashboard/graphs');
            $this->load->view('AdminDashboard/footer_adminDashboard');
        } else {
            redirect('Home/index');
        }
    }
    public function logout(){
        session_destroy();
        redirect('Home/index');
    }
        
     public function show_map()
    {
        
         $this->load->view('AdminDashboard/map');
    }   
        
        
        
}