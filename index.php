<?php

require('dnlib/load.php');

$action->helper->route('/',function(){
global $action;
    $data['title']='CV Online - make & Share CV Online';

    $action->view->load('header', $data);
    $action->view->load('navbar', $data);
    $action->view->load('loadhome', $data);
    $action->view->load('footer');
});

// for logout
$action->helper->route('action/delete/$url', function($data) use ($action) {
    global $action;
    $url=$data['url'];
    $action->db->delete('resumes',"url='$url'");
    $action->session->set('success',"Resume Deleted Successfully");
    $action->helper->redirect('home');

    
});
// delete resume
$action->helper->route('action/logout', function() use ($action) {
    $action->session->delete('Auth');
    $action->session->set('success',"Successfully logged out");
    $action->helper->redirect('login');
    
});

//createresume
$action->helper->route('action/createresume', function() use ($action) {
    global $action;
    $action->onlyForAuthUser();

    $resume_data[0]=$action->session->get('Auth')['data'];
    $resume_data[1]=$action->db->clean($_POST['name']);
    $resume_data[2]=$action->db->clean($_POST['headline']);
    $resume_data[4]=$action->db->clean($_POST['objectives']);


    $contact['email']=$action->db->clean($_POST['email']);
    $contact['mobile']=$action->db->clean($_POST['mobile']);
    $contact['address']=$action->db->clean($_POST['address']);

    $resume_data[3]=(json_encode($contact));
    $resume_data[5]=(json_encode($_POST['skill']));
    $education=array();
    $work=array();
    foreach($_POST['college'] as $key=>$value){
        $education[$key]['college']=$value;
        $education[$key]['course']=$_POST['course'][$key];
        $education[$key]['e_duration']=$_POST['e_duration'][$key];
    }

    
    foreach($_POST['company'] as $key=>$value){
        $work[$key]['company']=$value;
        $work[$key]['jobrule']=$_POST['jobrule'][$key];
        $work[$key]['c_duration']=$_POST['c_duration'][$key];
        $work[$key]['work_desc']=$_POST['work_desc'][$key];
    }

    $resume_data[6]=(json_encode($work));
    $resume_data[7]=(json_encode($education));
    $resume_data[8]=$action->helper->UID();

   $run=$action->db->insert('resumes','user_id,name,headline,objectives,contact,skills,experience,education,url',$resume_data);

$action->session->set('success',"Resume Created");
$action->helper->redirect('home');
    
});


//for cv
$action->helper->route('resume/$url',function($data){
    global $action;
    $resumedata=$action->db->read("resumes","*","WHERE url='". $data['url']."'");
    $data['myresume']='active';
    if(!$resumedata){
        $action->helper->redirect('home');
    }
    $resumedata=$resumedata[0];  
    $data['title']=$resumedata['name']." | Resume";
    $data['type']=1;
    $data['resume']=$resumedata;
   
    if($data['type']==1){
        $action->view->load('cvbuilder_content_1',$data);
    }
    else{
        $action->helper->redirect('home');
    }
    
});


//for template
$action->helper->route('select-template',function(){
    global $action;
    $action->onlyForAuthUser();
    $data['title']="Select a Template";
    $data['myresume']='active';

    $action->view->load('header', $data);
    $action->view->load('navbar', $data);
    $action->view->load('template_content');
    $action->view->load('footer');
});

//for cv details
$action->helper->route('cv-details/$cvtype',function(){
    global $action;
    $action->onlyForAuthUser();
    $data['title']="CV details";
    $data['myresume']='active';

    $action->view->load('header', $data);
    $action->view->load('navbar', $data);
    $action->view->load('cv-details-1');
    // if($data['cvtype']==1){
    //     $action->view->load('cv-details-1');
    // }
    // else{
    //     $action->session->set('error',"Invalid resume type");
    //     $action->helper->redirect('select-template');
    // }
    $action->view->load('footer');
});




//for home
$action->helper->route('home',function(){
    global $action;
    $action->onlyForAuthUser();
    $data['title']='Welcome to CV Online';
    $data['myresume']='active';
    $user_id = $action->user_id();
$data['resumes'] = $action->db->read('resumes', '*', "WHERE user_id='$user_id'");


    $action->view->load('header', $data);
    $action->view->load('navbar', $data);
    $action->view->load('home_content',$data);
    $action->view->load('footer');
});

// for login

$action->helper->route('login',function(){
    global $action;
    $action->onlyForUnauthUser();
        $data['title']='Login - CV Online';

        $action->view->load('header', $data);

        echo "<style>
        html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}
        </style>";

        $action->view->load('login_content');
        $action->view->load('footer');
    });
// for login action

$action->helper->route('action/login',function(){
    global $action;
    $error=$action->helper->isAnyEmpty($_POST);
    if($error){

    }else{
        $email=$action->db->clean($_POST['email']);
        $password=$action->db->clean($_POST['password']);
        $user=$action->db->read('users','id',"WHERE email_id='$email' AND password='$password'");
        if(count($user)>0){
            $action->session->set('Auth',['status'=>true,'data'=>$email]);
            $action->session->set('success',"Successfully logged in");
            $action->helper->redirect('home');
        }else{
            $action->session->set('error',"Incorrect details");
            $action->helper->redirect('login');
        }

    }
    });

// for signup

$action->helper->route('signup',function(){
    global $action;
    $action->onlyForUnauthUser();
        $data['title']='SignUp - CV Online';

        $action->view->load('header', $data);

echo "<style>html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}</style>";

        $action->view->load('signup_content');
        $action->view->load('footer');
    });


// for signup action

$action->helper->route('action/signup',function(){
    global $action;
    $error=$action->helper->isAnyEmpty($_POST);
       if($error){
        $action->session->set('error',"$error is empty");
        $action->helper->redirect('signup');
       }else{
        $signup_data[0]=$action->db->clean($_POST['full_name']);
        $signup_data[1]=$action->db->clean($_POST['email']);
        $signup_data[2]=$action->db->clean($_POST['password']);

        $user=$action->db->read('users','email_id',"WHERE email_id='$signup_data[1]'");
        if(count($user)>0){
             $action->session->set('error',"This email is already registered");
             $action->helper->redirect('signup');
         }else{
            
        
        $action->db->insert('users','full_name,email_id,password',$signup_data);
        $action->session->set('success',"Successfully registered");
        $action->helper->redirect('login'); }
        
       }

    });





if(!Helper::$isPageIsAvilable){
    $data['title']='No Page found!';

    $action->view->load('header', $data);
    $action->view->load('navbar', $data);
    $action->view->load('not_found');
    $action->view->load('footer');
}

?>