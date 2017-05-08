<?php

namespace X\App\Controllers;

use X\Sys\Controller;

class login extends Controller{
    
    public function __construct($params)  {		
        parent::__construct($params);
        $this->addData(array('page'=>'login'));
        $this->model=new \X\App\Models\mLogin();
        $this->view =new \X\App\Views\vLogin($this->dataView,$this->dataTable); 
    }

    function home() {
        $this->view->show();
    }
    
   
    function login()  {
        $user=filter_input(INPUT_POST, 'user'); // coje lo escrito de los INPUTS 
        $pass=filter_input(INPUT_POST, 'pass');     
        $data=$this->model->get_user($user,$pass);

        if(!empty($data))  {            
            $_SESSION["user"]=$data['username'];
            $_SESSION["iduser"]=$data['idusers'];
            $_SESSION["rol"]=$data['roles'];
           
            echo 1;
        }
        else {
            echo "Error en el login :( ";
        }
    } //fin de login
}
