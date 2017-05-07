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
}            