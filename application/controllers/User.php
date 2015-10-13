<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('login_model');            
    }
    
    //*********************************
    
    //***********************************************
    //Login Page of jErrors
    //***********************************************    
    public function login(){
        $this->session->set_userdata(SIGNIN_ERROR, "");
        $this->load->view('User/login');
    }

    //***********************************************
    //Signup Page of jErrors
    //***********************************************    
    public function signup() {
        $this->load->view('User/signup');
    }    
    
    //***********************************************
    //Beta Version, Signup Invitation Page of jErrors
    //***********************************************    
    public function comming_soon() {
        $this->load->view('User/comming_soon');
    } 
    
    //***********************************************
    //Checking whether login request is valid or not    
    //***********************************************    
    public function usr_login(){        
        $uname = $this->input->post('u_name');
        $pass = $this->input->post('password');
        $result = $this->login_model->get($uname,$pass);
        if(!$result){
            $this->session->set_userdata(SIGNIN_ERROR, SIGNIN_ERROR);
            $this->load->view('User/login');
        }  else {
            $uid = $result[0]->u_id;
            $resultuser = $this->user_model->get($uid);
            $this->session->set_userdata(['email'=>$resultuser[0]->email]);
            if($resultuser){
                $this->session->set_userdata([USER_NAME => $uname]);
                $this->session->set_userdata([USER_ID => $result[0]->u_id]);
                $loginDate = date("Y-m-d h:i:sa");
                $ip = $this->getIP();
                
                
                //***********************************************
                //Checking whethr login request is come from
                //client or administrator    
                //***********************************************    
                if($uname == ADMINISTRATOR_CREDENTIAL_NAME){
                    $this->session->set_userdata(ADMINISTRATOR_CREDENTIAL_STATUS, ADMINISTRATOR_CREDENTIAL_STATUS_TRUE);                
                    $this->session->set_userdata(LOGIN_STATUS, LOGIN_STATUS_FLASE);  
                    //COOKIE
                    $cookie_user = array(
                        'name'   => LOGIN_STATUS,
                        'value'  => LOGIN_STATUS_FLASE,
                        'expire' => '7200',
                    );                
                    $this->input->set_cookie($cookie_user);
                    $cookie_admin = array(
                        'name'   => ADMINISTRATOR_CREDENTIAL_STATUS,
                        'value'  => ADMINISTRATOR_CREDENTIAL_STATUS_TRUE,
                        'expire' => '7200',
                    );                
                    $this->input->set_cookie($cookie_admin);
                            
                    //***********************************************
                    //Redirecting to Admindashboard Page 
                    //***********************************************    

                    redirect('AdminDashboard/adminDashboard');
                }  else {
                    $this->user_model->setStatus(['ip' => $ip, 
                        'lastLogin' => $loginDate,
                        'status' => 1]);
                    $this->session->set_userdata(ADMINISTRATOR_CREDENTIAL_STATUS, ADMINISTRATOR_CREDENTIAL_STATUS_FALSE);                
                    $this->session->set_userdata(LOGIN_STATUS, LOGIN_STATUS_TRUE);
                    //COOKIE
                    $cookie_user = array(
                        'name'   => LOGIN_STATUS,
                        'value'  => LOGIN_STATUS_TRUE,
                        'expire' => '7200',
                    );                
                    $this->input->set_cookie($cookie_user);
                    $cookie_admin = array(
                        'name'   => ADMINISTRATOR_CREDENTIAL_STATUS,
                        'value'  => ADMINISTRATOR_CREDENTIAL_STATUS_FALSE,
                        'expire' => '7200',
                    );                
                    $this->input->set_cookie($cookie_admin);
                    
                    //***********************************************
                    //Redirecting to Client Dashboard Page 
                    //***********************************************    
                    redirect('Dashboard/projects');
                }
            }
            else{
                $this->load->view('User/login');
            }
        }
    }
        
    //***********************************************
    //Signing Up the new user 
    //***********************************************    
    public function user_signup(){        
        $fname = $this->input->post('firstname');
        $lname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $uname = $this->input->post('u_name');
        $pass = $this->input->post('password');
        $trial_start = date("Y/m/d");
        $trial_expiry = date('Y/m/d',  strtotime($trial_start.'+14days'));
        $q = $this->user_model->insert([
            'first_name' => $fname,
            'last_name' => $lname, 
            'email' => $email,
            'trial_startDate' => $trial_start,
            'trial_expirydate' => $trial_expiry,
            'username' => $uname,
            'password' => $pass
                ]);
        if($q){
            $s = $this->login_model->insert([
                                        'u_id' => $q,
                                        'username' => $uname,
                                        'password' => $pass]);     
            $this->session->set_userdata([USER_ID => $q]);
        }
        if($s){
            //COOKIE
            $cookie = array(
                'name'   => LOGIN_STATUS,
                'value'  => LOGIN_STATUS_TRUE,
                'expire' => '7200',
            );                
            $this->input->set_cookie($cookie);

             $this->session->set_userdata([USER_NAME => $uname]);
             $this->session->set_userdata(LOGIN_STATUS, LOGIN_STATUS_TRUE);  
             $this->session->set_userdata(ADMINISTRATOR_CREDENTIAL_STATUS, ADMINISTRATOR_CREDENTIAL_STATUS_FALSE);
             redirect('Dashboard/addProject');
        }
        else{
            $this->load->view('User/signup');            
        }
    }
    
}









