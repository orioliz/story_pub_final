<?php 

namespace X\App\Models;

use X\Sys\Model;

Class mEditstory extends Model
{

		public function __construct()
		{
			parent::__construct();
			
		}
		 
    
		function update_story($usuario, $titulo, $sinopsis)
		{
			 
			 $sql='UPDATE stories SET title = ":titulo", sinopsis = ":sinopsis" WHERE users =":users"';
           	 $this->query($sql);
             $this->bind(":titulo", $id);
             $this->bind(":sinopsis", $id);
             $this->bind(":users", $id);
             $this->execute();
		}


		
		function get_path_story($story)
		{
			 $sql='Select path FROM stories where idstories = :story';
           	 $this->query($sql);
             $this->bind(":story", $story);
             $this->execute();
             $res=$this->execute();
             $result="";
             if($res){
                $result=$this->resultset();
             }
             return $result;
		}

		

		function get_story($id)
		{
			$sql='Select * From stories Where idstories=:id';
            $this->query($sql);
            $this->bind(":id", $id);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
		}

		

		function get_user($story)
		{
			$sql='SELECT username, idusers
					FROM users inner join stories on users.idusers = stories.users
					WHERE idstories =:story';
			$this->query($sql);
            $this->bind(":story", $story);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
		}


}