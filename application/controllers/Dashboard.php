<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
     
class Dashboard extends CI_Controller{
    public function __construct() {
        parent::__construct();
         $this->load->model('dashboard_model');
    }
    //DONE
    public function userDashboard($u_id, $projID) {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE 
                && $projID != NULL && $u_id != NULL){
            if($session[USER_ID] == $u_id){                   
                $data['errors']=$this->dashboard_model->get_errors($u_id ,$projID);
                if($data['errors'] != "empty"){
                    $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_TRUE);
                    $this->session->set_userdata(PROJECT_ID, $projID);
                    $this->load->view('Dashboard/header_dashboard');
                    $this->load->view('Dashboard/userDashboard', $data);
                    $this->load->view('Dashboard/footer_dashboard');
                }
                else{
                    redirect('Dashboard/projects');                                        
                }
            }
            else{
                redirect('Dashboard/projects');                    
            }
        }
        else{
            redirect('Home/index');
        }
    }
    //DONE
    public function error_details($u_id = NULL, $id = NULL, $projID = NULL) {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE
                && $u_id != NULL && $projID != NULL && $id != NULL){
            if($session[USER_ID] == $u_id){  
                $data['error']=$this->dashboard_model->get_error_details($u_id, $id, $projID);
                if($data['error']){
                    $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_TRUE);                        
                    $this->load->view('Dashboard/header_dashboard');
                    $this->load->view('Dashboard/error_details', $data);
                    $this->load->view('Dashboard/footer_dashboard');
                    }else{
                        redirect('Dashboard/projects');                                        
                    }
            }
            else{
                redirect('Dashboard/projects');                    
            }
        }
        else{
            redirect('Home/index');
        }
    }
    //DONE
    public function settings($u_id = NULL, $projID = NULL) {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            if($session[USER_ID] == $u_id){
                $data['projects']=$this->dashboard_model->get_projectsID($u_id ,$projID);
                if($data['projects']){
                    $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_TRUE);
                    $this->load->view('Dashboard/header_dashboard');
                    $this->load->view('Dashboard/settings', $data);
                    $this->load->view('Dashboard/footer_dashboard');
                }else{
                        redirect('Dashboard/projects');                                        
                }
            }
            else{
                redirect('Dashboard/projects');                    
            }
                
        }else{
            redirect('Home/index');
        }
    }
        
    public function logout(){
        session_destroy();
        $this->load->library('session');
        $this->session->set_userdata(LOGIN_STATUS, LOGIN_STATUS_FLASE);
        redirect('Home/index');
    }
    public function addProject() {
        $session = $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE ){
            $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_FALSE);
            $this->load->view('Dashboard/header_dashboard');
            $this->load->view('Dashboard/addProject');
            $this->load->view('Dashboard/footer_dashboard');
        }
        else{
            redirect('Home/index');
        }
    }
    public function projects() {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE && 
                $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $data['projects']=$this->dashboard_model->get_projects();
            $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_FALSE);
            $this->load->view('Dashboard/header_dashboard');
            $this->load->view('Dashboard/projects', $data);
            $this->load->view('Dashboard/footer_dashboard');
        }
        else{
            redirect('Home/index');
        }
    }
    public function projectIntegration() {
        $session = $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_FALSE);
            $pass = $this->input->post('my');
            $projecturl = $this->input->post('projecturl');
            $session = $this->session->all_userdata();
            $val = md5(uniqid(rand(),true));
            $this->session->set_userdata([PROJECT_APIKEY => $val]);
            if(!$this->dashboard_model->chekProjectName($pass)){        
                $q = $this->dashboard_model->insert_project([
                    'name' => $pass,
                    'u_id' => $session[USER_ID], 
                    'apikey' => $val,
                    'creation_date' => date("Y/m/d") 
                    ]);
                $this->load->view('Dashboard/header_dashboard');
                $this->load->view('Dashboard/projectIntegration');
                $this->load->view('Dashboard/footer_dashboard');                    
                }  else {
                    $this->addProject();
                    }
        }
        else{
            redirect('Home/index');
        }
    }
    public function accountSettings() {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE ){
            $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_FALSE);
            $this->load->view('Dashboard/header_dashboard');
            $this->load->view('Dashboard/accountSettings');
            $this->load->view('Dashboard/footer_dashboard');
        }
        else{
            redirect('Home/index');
        }
    }
    //Pending
    public function projectGraph($projID) {
        $errors = $this->dashboard_model->get_errors($projID);
        $lastOccur = array();
        foreach($errors as $value){
            $lastOccur[] = $value->lastOccurence;
        }
        $dates=array(); 
        foreach ($lastOccur as $s) {
            if(ord($s[0])>=48 && ord($s[0])<=57){
                $dates[] = date('d/M/Y', strtotime($s));
            }
            else if($s[0]=='?'){
                $p = explode("?", $s);
                $d = implode($p);
                $date= date('d/M/Y', strtotime($d));
                $dates[] = $date;	
            }
            else{
                $p = explode(" ", $s);
                $d=$p[1]." ".$p[2]." ".$p[3];
                $date= date('d/M/Y', strtotime($d));
                $dates[] =$date;        	
            }
        }
        $data['lastOccur']=$dates;
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/projectGraph', $data);
        $this->load->view('Dashboard/footer_dashboard');
    }
    //DONE
    public function regenerateApiKey($u_id, $projectID, $apiKey){
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE
                && $session[PROJECT_OPEN_STATUS] == PROJECT_OPEN_STATUS_TRUE){
            $val = md5(uniqid(rand(),true));
            $result = $this->dashboard_model->updateapikey($u_id ,['apikey'=>$val], $projectID);
            if($result != NULL){
               if($result != 0){
                    echo json_encode($val);
                }   
                else{
                    echo json_encode("Key Is not Regenerated. Try again later.");
                }
            }else{
                redirect('Dashboard/projects');
            }
        }
        else{
            redirect('Home/index');
        }
    }
    //DONE
    public function deleteProject($u_id, $projectID) {
        $session = $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE 
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE
                && $projectID != NULL && $u_id != NULL){
            if($session[USER_ID] == $u_id){    
                $d = $this->dashboard_model->deleteproject($u_id, $projectID);
            }
            if($d){
                $val = "deleted";             
            }
            echo json_encode($val);
        }
    }   
    public function contactus() {
        $session = $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $this->load->view('Dashboard/header_dashboard');
            $this->load->view('Dashboard/contactus');
            $this->load->view('Dashboard/footer_dashboard');
        }
    }
    public function contactusSuccess() {
        $session = $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $this->load->view('Dashboard/header_dashboard');
            $this->load->view('Dashboard/contactusSuccess');
            $this->load->view('Dashboard/footer_dashboard');
        }
    }
    public function tabularview($u_id, $projID) {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE
                && $projID != NULL && $u_id != NULL){
            if($session[USER_ID] == $u_id){   
                $data['errors']=$this->dashboard_model->get_errors($u_id ,$projID);
                if($data['errors'] != "empty"){
                    $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_TRUE);
                    $this->session->set_userdata(PROJECT_ID, $projID);
                    $this->load->view('Dashboard/header_dashboard');
                    $this->load->view('Dashboard/tabularview', $data);
                    $this->load->view('Dashboard/footer_dashboard');
                }
                else{
                    redirect('Dashboard/projects');                                        
                }
            }
            else{
                redirect('Dashboard/projects');                    
            }
        }
        else{
            redirect('Home/index');
        }
    }
    
    //STILL PENDING
    public function uploadpic() {
        $config = array(
            'upload_path' => "./images/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
                );
        $this->load->library('upload', $config);
        if($this->upload->do_upload())
            {
            $data['img'] = array('upload_data' => $this->upload->data());
            $this->load->view('t',$data);
            }
            else
                {
                echo $this->upload->display_errors();
                }
                    
    }
    public function sucess() {
        $this->load->view('Dashboard/sucess', array('error' => ' ' ));
    }
    
    public function sendMail() {
        $session = $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $name = $this->input->post("name");
            $subject = $this->input->post('subject');
            $emailFrom = $this->input->post('email');
            $message = $this->input->post('message');
            $date = date("Y-m-d h:i:sa");   
            $result = $this->dashboard_model->insertUserMail([
                'Name' => $name,
                'Subject' => $subject,
                'from' => $emailFrom,
                'date' => $date,
                'message' => $message
                    ]);
            redirect('Dashboard/contactusSuccess');       
        }    
    }
    
    
    
    
    
    
    

}