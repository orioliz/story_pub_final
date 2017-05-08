<?php

namespace X\App\Controllers;

use X\Sys\Controller;
use X\Sys\Session;


class Storyview extends Controller{
    
    public function __construct($params) {       
        parent::__construct($params);
        $this->addData(array('page'=>'login'));
        $this->model=new \X\App\Models\mStoryview();
        $this->view =new \X\App\Views\vStoryview($this->dataView,$this->dataTable);    
    }

   

    function home() {   
        $this->view->show();
    }

    
    function load()  {
       $id= $this->params['id'];
       $data['story']=$this->model->get_story($id); 
       $data['user']=$this->model->get_user($data['story'][0]['users']); 
       $data['assess']=$this->model->get_assess($_SESSION['iduser'],$data['story'][0]['idstories']); 
       $data['tags']=$this->model->get_tags($data['story'][0]['idstories']); 


       $this->addData($data);
       $this->view->__construct($this->dataView,$this->dataTable);
       $this->view->show();
    }

   function assess()
    {
        $story= $this->params['story'];
        $user= $this->params['user'];
        $val= $this->params['val'];

        $this->model->set_assess($story, $user, $val); 

        header("Location:/storypub/storyview/load/id/$story");
    }


    
}