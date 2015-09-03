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
    
    public function userDashboard($projID) {
        $data['errors']=$this->dashboard_model->get_errors($projID);

        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/userDashboard', $data);
        $this->load->view('Dashboard/footer_dashboard');
    }
    public function error_details($id=NULL, $projID=NULL) {

        $data['error']=$this->dashboard_model->get_error_details($id,$projID);
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/error_details', $data);
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
        $data['projects']=$this->dashboard_model->get_projects();
        
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/projects', $data);
        $this->load->view('Dashboard/footer_dashboard');
    }
    public function projectIntegration() {
        
        $pass=  $this->input->post('my');
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
    public function accountSettings() {
        $this->load->view('Dashboard/header_dashboard');
        $this->load->view('Dashboard/accountSettings');
        $this->load->view('Dashboard/footer_dashboard');
    }        
}