<?php


namespace X\App\Controllers;

use X\Sys\Controller;

class Registry extends Controller{
    
    public function __construct($params)
    {		
        parent::__construct($params);
        $this->addData(array(
           'page'=>'Registry'));
        $this->model=new \X\App\Models\mRegistry();
        $this->view =new \X\App\Views\vRegistry($this->dataView,$this->dataTable);    

    }

    function home(){
        $this->view->show();
    }
    
   
    function registry()
    {
        $user=filter_input(INPUT_POST, 'user');
        $pass=filter_input(INPUT_POST, 'pass');
        $email=filter_input(INPUT_POST, 'email');
       
        
        $data=$this->model->get_user($user,$pass);
        $data+=$this->model->check_email($email);
        $data+=$this->model->check_user($user);
        
        if(empty($data))
        {
            $this->model->insert_user($user,$pass,$email,$altitud,$latitud);
            echo 1;
        }   
        else
        {
            echo "Error de registro :( ";
        }
    }
    
    
    function check_email()
    {
        $email1=filter_input(INPUT_POST, 'email');
        $data=$this->model->check_email($email1);
        
        if(!empty($data))
        {
            die("Email en uso");
        }
        
    }
    
    function check_user()
    {
        $user=filter_input(INPUT_POST, 'user');
        $data=$this->model->check_user($user);
        
        if(!empty($data))
        {
            die("Usuario en uso ! Pruebe Otro");
        }
        
    }
}

