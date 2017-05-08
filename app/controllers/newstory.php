<?php

namespace X\App\Controllers;

use X\Sys\Controller;
use X\Sys\Session;


class Newstory extends Controller{
    
    public function __construct($params)  {		
        parent::__construct($params);
        $this->addData(array(
           'page'=>'login'));
        $this->model=new \X\App\Models\mNewstory();
        $this->view =new \X\App\Views\vNewstory($this->dataView,$this->dataTable);    

    }

   
    function home() {
        $this->view->show();
    }

   

    function add_story()    {
        //Recogemos los datos
        $titulo=filter_input(INPUT_POST, 'titulo');
        $sinopsis=filter_input(INPUT_POST, 'sinopsis');
        $historia=filter_input(INPUT_POST, 'historia');
        $tags=filter_input(INPUT_POST, 'tags');

        $a_tags = split(',',$tags);
        if(!is_dir(DATA.$_SESSION['user']))    {
            mkdir(DATA.$_SESSION['user'], 0700);
        }

        $data=$this->model->add_story($_SESSION['iduser'],$titulo,$sinopsis);
        $story = $data=$this->model->get_last_story($_SESSION['iduser']);

        foreach ($a_tags as $tag) {   
            $this->model->add_tag($story[0]['idstories'], $tag);
        }

        $file = fopen(DATA.$_SESSION['user'].DS.$story[0]['path'].'.txt', "w");

        fwrite($file, $historia);
        fclose($file);

        header('Location: /storypub/storyview/load/id/'.$story[0]['idstories']);

    } //fin de add
 }