<?php

namespace X\App\Models;

use X\Sys\Model;

Class mLogin extends Model {

        public function __construct() {
                parent::__construct();

        }        
        /**        
        *   comprueba si existe        
        */

        public function get_user($user,$pass)
        {
           
            
            $sql='select * from users where username=:user and password=:pass ';
            
            
            $this->query($sql);
            $this->bind(':user',$user); 
            $this->bind(':pass',$pass);
            
            //$this->execute();
            
            $res=$this->execute();
            $r=$this->rowCount();
            $user=$this->single();
            
           // var_dump($r);
          //  die;
            
            //$result="";
            if($r==1){
                $result=$user;
            }
            return $result; 
         
        }
}            