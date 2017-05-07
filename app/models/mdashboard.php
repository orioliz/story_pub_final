<?php

namespace X\App\Models;

use X\Sys\Model;

Class mDashboard extends Model
{

        public function __construct()
        {
                parent::__construct();

        }
        
    
        function get_all_stories(){

        	$sql='Select * From stories';
            $this->query($sql);
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;


        }

        

        function get_my_stories($user){

            $sql='Select * From stories where users =:user';
            $this->query($sql);
            $this->bind(":user", $user);
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;


        }

        

        function del_story($id)
        {
            $sql='DELETE FROM valorations where story =:id';
            $this->query($sql);
            $this->bind(":id", $id);
            $this->execute();

            $sql='DELETE FROM stories_has_tags where stories_idstories1 =:id';
            $this->query($sql);
            $this->bind(":id", $id);
            $this->execute();

            $sql='DELETE FROM stories where idstories =:id';
            $this->query($sql);
            $this->bind(":id", $id);
            $this->execute();
        }

}