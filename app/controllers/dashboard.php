<?php

namespace X\App\Controllers;

use X\Sys\Controller;
use X\Sys\Session;

class Dashboard extends Controller{
    
    public function __construct($params)  {		
        parent::__construct($params);
        $this->addData(array('page'=>'login'));
        $this->model=new \X\App\Models\mDashboard();
        $this->view =new \X\App\Views\vDashboard($this->dataView,$this->dataTable);    

    }
    
    function home() {
        $data['all_stories']=$this->model->get_all_stories();
        if(!empty($_SESSION["idusers"]))
        {
            $data['my_stories']= $this->model->get_my_stories($_SESSION["idusers"]); 
        }
        $this->addData($data);
        $this->view->__construct($this->dataView,$this->dataTable);
        $this->view->show();
    }

    
    function logout(){
        
        Session::destroy();
        header('Location: https://oizquierdo.cesnuria.com/storypub/');
    }   

    function delete(){
        $id= $this->params['id'];
        $this->model->del_story($id); 
        header('Location: https://oizquierdo.cesnuria.com/storypub/dashboard');
    } 
}


