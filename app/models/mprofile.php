<?php

namespace X\App\Models;

use X\Sys\Model;

Class mProfile extends Model
{

        public function __construct()
        {
                parent::__construct();

        }

        

        function get_user($user)
        {
        	$sql="SELECT * FROM users WHERE idusers=:user";
        	$this->query($sql);
            $this->bind(":user", $user);
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

        

        function get_user_stories($user)
        {
            $sql="SELECT * FROM stories WHERE users =:user";
            $this->query($sql);
            $this->bind(":user", $user);
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }
}