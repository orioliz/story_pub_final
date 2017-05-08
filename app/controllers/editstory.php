<?php

namespace X\App\Controllers;

use X\Sys\Controller;
use X\Sys\Session;



class Editstory extends Controller{
    
    public function __construct($params)   {       
        parent::__construct($params);
        $this->addData(array(
           'page'=>'login'));
        $this->model=new \X\App\Models\mEditstory();
        $this->view =new \X\App\Views\vEditstory($this->dataView,$this->dataTable);    

    }

   
    function home()   {   
        $this->view->show();
    }

   

    function load()  {
       $id= $this->params['id'];
       $data['story']=$this->model->get_story($id); 
       $data['user'] =$this->model->get_user($id);
       $this->addData($data);
            $this->view->__construct($this->dataView,$this->dataTable);
        $this->view->show();
    }

    
    function update_story()  {
        //Recogmeos id de la hisotria
        $id= $this->params['id'];
        $titulo=filter_input(INPUT_POST, 'titulo');
        $sinopsis=filter_input(INPUT_POST, 'sinopsis');
        $historia=filter_input(INPUT_POST, 'historia');
        $user =$this->model->get_user($id);

        $this->model->update_story($user[0]['iduser'],$titulo,$sinopsis);

        $story = $data=$this->model->get_path_story($id);

        $file = fopen(DATA.$user[0]['username'].DS.$story[0]['path'].'.txt', "w");

        fwrite($file, $historia);
        fclose($file);
        
        header('Location: /storypub/storyview/load/id/'.$id);
    }
}