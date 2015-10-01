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
         $this->load->model('login_model');
          $this->load->model('user_model');
    }
    //DONE
     public function geterr() {
       
        $q = $this->dashboard_model->get_errorsprproj(8);
        echo json_encode($q);
    }
  
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
                    $this->session->set_userdata(PROJECT_ID, $projID);
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
                    $this->session->set_userdata(PROJECT_ID, $projID);
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
        $session=  $this->session->all_userdata();
        $this->session->set_userdata(LOGIN_STATUS, LOGIN_STATUS_FLASE);
        if($session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $logoutDate = date("Y-m-d h:i:sa");
            $this->user_model->setStatusLogout(['lastLogout' => $logoutDate,
                'status' => 0]);
        }
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
    public function errors_btw_lastLogin($uid,$projID){
        $q=$this->dashboard_model->getUser($uid);
        $lastLogin=array();
        $lastLogout=array();
        foreach($q as $value){
            $lastLogin[]=$value->lastLogin;
            $lastLogout[]=$value->lastLogout;                
            }
            $logout=date('Y-m-d', strtotime($lastLogout[0]));
            $login=date('Y-m-d', strtotime($lastLogin[0]));

            $errors=$this->dashboard_model->get_errorsByProjectId($projID);
            $this->session->set_userdata(['projid'=>$projID]);
            $lastOccur=array();
            foreach($errors as $value){
                $lastOccur[]=$value->lastOccurence;
                }
                $dates=array(); 
                foreach ($lastOccur as $s) {
                    if(ord($s[0])>=48 && ord($s[0])<=57){
                        $dates[] = date('Y-m-d', strtotime($s));
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
                                
                                $errCount_between_lastLOgin=0;
                                    print_r($logout > $dates[0]);
                                    
                                foreach ($dates as $d)
                                {

                                    if($logout < $d){

                                            if($login > $d) { 
                                         $errCount_between_lastLOgin++;
                                        }
                                    }
                                }
//                                print_r($login."<br>");
//                                print_r($logout);
                                print_r($errCount_between_lastLOgin);
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
    public function projectGraph($u_id, $projID) {
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE
                && $projID != NULL && $u_id != NULL){
            if($session[USER_ID] == $u_id){   
                $data['errors'] = $this->dashboard_model->get_errors($u_id ,$projID);
                $data["noprojectmessage"] = NULL;
                if(!empty(($data['errors']))){
                    $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_TRUE);
                    $this->session->set_userdata(PROJECT_ID, $projID);
                    $errors=$this->dashboard_model->get_errorsByProjectId($projID);
                    $this->session->set_userdata(PROJECT_ID, $projID);
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
                    $today=date("m/d/Y");
                    $date_today = date('d/M/Y', strtotime($today));
                    $date = date('Y-m-d', strtotime($today));
                    $date = date_create($date);
                    $last_12days=array();
                    for($i=0;$i<11;$i++){
                        date_modify($date, '+1 day');
                        $last_12days[$i]= $date->format('d/M/Y')."<br>";
                    }
                    $data["last_12days"]=$last_12days;
                    $browser=array();
                    foreach($errors as $value){
                        $browser[]=$value->browswer;
                    }
                    $chromeCount=0;
                    $mozillaCount=0;
                    $safariCount=0;
                    $ieCount=0;
                    $othersCount=0;
                    foreach($browser as $value){
                        if($value === 'Chrome'){
                            $chromeCount++;
                       }   
                       elseif ($value === 'Mozilla'){
                           $mozillaCount++;
                        }
                        elseif ($value === 'Safari'){
                            $safariCount++;
                        }
                        elseif ($value === 'IE'){
                            $ieCount++;
                        }
                        else{
                            $othersCount++;
                        }
                    }   
                    $total=$chromeCount+$mozillaCount+$safariCount+$ieCount+$othersCount;
                    $browser_percentage=array();
                    $browser_percentage['chrome']=($chromeCount/$total)*100;
                    $browser_percentage['mozila']=($mozillaCount/$total)*100;
                    $browser_percentage['safari']=($safariCount/$total)*100;
                    $browser_percentage['ie']=($ieCount/$total)*100;
                    $browser_percentage['others']=($othersCount/$total)*100;                            
                    $data['browser_percentage']=$browser_percentage;
                    $err_message=array();
                    foreach($errors as $value){
                        $err_message[]=$value->message;
                    }
                    $ReferenceErrorCount=0;
                    $SyntaxErrorCount=0;
                    $failedToLoadResourceCount=0;
                    $TypeErrorCount=0;
                    $ScriptErrorCount=0;
                    $othersCount=0;
                    foreach ($err_message as $value){
                        if (strpos($value,'ReferenceError') !== false) {
                            $ReferenceErrorCount++;
                        }
                        else if (strpos($value,'SyntaxError') !== false) {
                            $SyntaxErrorCount++;
                        }
                        else if (strpos($value,'404') !== false) {
                            $failedToLoadResourceCount++;
                        }
                        elseif (strpos($value,'TypeError') !== false) {
                            $TypeErrorCount++;
                        }
                        elseif (strpos($value,'Script error') !== false) {
                            $ScriptErrorCount++;
                        }
                        else{
                            $othersCount++;
                        }
                    }
                    $total=$ReferenceErrorCount+$SyntaxErrorCount+$failedToLoadResourceCount+$TypeErrorCount+$ScriptErrorCount+$othersCount;
                    $errMessage=array();
                    $errMessage['ReferenceError']=($ReferenceErrorCount/$total)*100;
                    $errMessage['SyntaxError']=($SyntaxErrorCount/$total)*100;
                    $errMessage['failedToLoadResource']=($failedToLoadResourceCount/$total)*100;
                    $errMessage['TypeError']=($TypeErrorCount/$total)*100;
                    $errMessage['ScriptError']=($ScriptErrorCount/$total)*100;
                    $errMessage['others']=($othersCount/$total)*100;
                    $data['errMessage']=$errMessage;
                    $total_ErrorsExcluding404=$total-$failedToLoadResourceCount;
//                    $this->load->view('Dashboard/header_dashboard');
//                    $this->load->view('Dashboard/projectGraph',$data);
//                    $this->load->view('Dashboard/footer_dashboard');
                }
                else{
                    $data["noprojectmessage"] = "No Error's have been recieved yet.";                                      
                }
                $this->load->view('Dashboard/header_dashboard');
                $this->load->view('Dashboard/projectGraph',$data);
                $this->load->view('Dashboard/footer_dashboard');
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
    public function regenerateApiKey($u_id, $projectID, $apiKey){
        $session=  $this->session->all_userdata();
        if($session[LOGIN_STATUS] == LOGIN_STATUS_TRUE
                && $session[ADMINISTRATOR_CREDENTIAL_STATUS] == ADMINISTRATOR_CREDENTIAL_STATUS_FALSE){
            $val = md5(uniqid(rand(),true));
            $result = $this->dashboard_model->updateapikey($u_id ,['apikey'=>$val], $projectID);
            if($result){
                    echo json_encode($val);
            }else{
                echo json_encode("Key Is not Regenerated. Try again later.");
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
            $this->session->set_userdata(PROJECT_OPEN_STATUS, PROJECT_OPEN_STATUS_FALSE);
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
    public function repwd() {
        $q=null;
        $s=null;
        $session=  $this->session->all_userdata();
        $old=  $this->input->post('old');
        $new=  $this->input->post('New'); 
        $data['user']=$this->login_model->get($session[USER_NAME],$old);
          $data1 = array(
            'username' =>null
            );
            if($data['user'])
            {
                $this->session->set_userdata(['changed'=>'true']);
                $q=$this->login_model->updatelogin([
                    'password'=>$new],$session[USER_ID]);
                $s="password has been changed";
            }
           echo  json_encode($s);
    }
    public function reemail() {
        $s1=null;
        $email=  $this->input->post('email');
        $session=  $this->session->all_userdata();
        if($email)
        {
            $s1="data";
            $q=$this->user_model->update([
                'email'=>$email],$session[USER_ID]);
            $this->session->set_userdata(['email'=>$email]);
        }
          echo json_encode($s1);
    }
    public function redata() {
       $s = null;
        $session = $this->session->all_userdata();
        $name=  $this->input->post('name');
       if($name)
          {
            $q=$this->login_model->updatelogin([
                'username'=>$name],$session[USER_ID]);
           $s="data";
            $this->session->set_userdata([USER_NAME=>$name]);
        }
       echo json_encode($name);
    }
}