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
        if($session["login_status"]=="login" && $projID != NULL && $u_id != NULL){
            if($session["userID"]==$u_id){   
                
                $data['errors']=$this->dashboard_model->get_errors($u_id ,$projID);
                if($data['errors'] != "empty"){
                    $this->session->set_userdata("project_status", 1);
                    $this->session->set_userdata('project_ID', $projID);
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
        if($session["login_status"]=="login" && $u_id != NULL && $projID != NULL && $id != NULL){
            if($session["userID"]==$u_id){  
                $data['error']=$this->dashboard_model->get_error_details($u_id, $id, $projID);
                if($data['error']){
                                        $this->session->set_userdata("project_status", 1);

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
    public function settings($u_id = NULL, $projID=NULL) {
        $session=  $this->session->all_userdata();
        if($session["login_status"]=="login"){
            if($session["userID"]==$u_id){
                $data['projects']=$this->dashboard_model->get_projectsID($u_id ,$projID);
                if($data['projects'])
                {                    $this->session->set_userdata("project_status", 1);

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
        
        redirect('Home/index');
    }
    public function addProject() {
        $session=  $this->session->all_userdata();
        if($session["login_status"] == "login"){
            $this->session->set_userdata('project_status','');
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
        if($session["login_status"]=="login"){
            $data['projects']=$this->dashboard_model->get_projects();
            $this->session->set_userdata('project_status','');
            $this->load->view('Dashboard/header_dashboard');
            $this->load->view('Dashboard/projects', $data);
            $this->load->view('Dashboard/footer_dashboard');
        }
        else{
            redirect('Home/index');
        }
    }
    public function projectIntegration() {
        $session=  $this->session->all_userdata();
        if($session["login_status"]=="login"){
            $this->session->set_userdata('project_status','');
            $pass=  $this->input->post('my');
            $projecturl=  $this->input->post('projecturl');
            $session=  $this->session->all_userdata();
            $val=  md5(uniqid(rand(),true));
            $this->session->set_userdata(['projapikey'=>$val]);
            print_r($pass);        
            print_r($val);
            if(!$this->dashboard_model->chekProjectName($pass)){        
                $q=$this->dashboard_model->insert_project([
                    'name'=>$pass,
                    'u_id'=>$session["userID"], 
                    'apikey'=>$val,
                    'creation_date'=>  date("Y/m/d") 
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
        if($session["login_status"]=="login"){
            $this->session->set_userdata('project_status','');
            $this->load->view('Dashboard/header_dashboard');
            $this->load->view('Dashboard/accountSettings');
            $this->load->view('Dashboard/footer_dashboard');
        }
        else{
            redirect('Home/index');
        }
    }
    public function projectGraph($projID) {
        $errors=$this->dashboard_model->get_errors($projID);
        $lastOccur=array();
        foreach($errors as $value){
            $lastOccur[]=$value->lastOccurence;
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
        if($session["login_status"]=="login" && $session["project_status"]=="open"){
            $val=  md5(uniqid(rand(),true));
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
        if($session["login_status"]=="login" && $projectID != NULL && $u_id != NULL){
            if($session["userID"]==$u_id){    
                $d = $this->dashboard_model->deleteproject($u_id, $projectID);
            }
            if($d){
                $val = "deleted";             
            }
            echo json_encode($val);
        }
    }
    
    public function contactus() {
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/contactus');
        $this->load->view('Dashboard/footer_dashboard');
    }
    
    public function tabularview() {
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/tabularview');
        $this->load->view('Dashboard/footer_dashboard');
    }
    
    public function uploadpic() {
        $config['upload_path'] = "./images/";
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $this->load->library('upload',$config);
        
        if(!$this->upload->do_upload()){
            echo $this->upload->display_errors();
        }
        else{
            $file = $this->upload->data();
            $data['img']=  base_url().'/images/'.$file['file_name'];
            $this->load->view('sucess', $data);
        }
    }
}