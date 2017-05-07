<?php

namespace X\App\Models;

use X\Sys\Model;

Class mRegistry extends Model
{

        public function __construct()
        {
                parent::__construct();

        }

       
        
        public function get_user($user,$pass)
        {
            $sql='select * from users where username="'.$user.'" AND password="'.$pass.'"';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

        
        
        public function check_email($email)
        {
            $sql='select * from users where email="'.$email.'"';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

       
        
        public function check_user($user)
        {
            $sql='select * from users where username="'.$user.'"';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

       
        
        public function insert_user($user,$pass,$email)
        {
            $sql='CALL sp_new_user(2,"'.$email.'","'.$pass.'","'.$user.'")';
            $this->query($sql);
            $this->execute();
        }
}
