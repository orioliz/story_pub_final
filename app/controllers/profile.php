<?php

namespace X\App\Controllers;

use X\Sys\Controller;
use X\Sys\Session;

class Profile extends Controller{
    
    public function __construct($params)   {		
        parent::__construct($params);
        $this->addData(array('page'=>'login'));
        $this->model=new \X\App\Models\mProfile();
        $this->view =new \X\App\Views\vProfile($this->dataView,$this->dataTable);   
    }  

    function home()  {   
    	$data['user']=$this->model->get_user($_SESSION['iduser']);
    	$data['stories']=$this->model->get_user_stories($_SESSION['iduser']);
        $this->addData($data);
        $this->view->__construct($this->dataView,$this->dataTable);
        $this->view->show();
    }
}