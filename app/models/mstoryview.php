<?php 

namespace X\App\Models;

use X\Sys\Model;

Class mStoryview extends Model
{

		public function __construct()
		{
			parent::__construct();
			
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

        

		function set_assess($story, $user, $val)
		{
			$sql='CALL sp_new_valoration("'.$user.'","'.$story.'","'.$val.'")';
            $this->query($sql);
            $this->execute();
		}

        

		function get_user($id)
        {
            $sql='Select username From users where iduser =:id';
            $this->query($sql);
            $this->bind(":id", $id);
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

       

        function get_assess($user, $story)
        {
            $sql='Select value From valorations where users =:user AND stories =:story';
            $this->query($sql);
            $this->bind(":user", $user);
            $this->bind(":story", $story);
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

       

        function get_tags($story)
        {
            $sql="SELECT nom, idtags
                    FROM tags inner join stories_has_tags on idtags = tags
                    inner join stories on stories = idstories
                    where idstories = :story";
            $this->query($sql);
            $this->bind(":story", $story);
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

       

        function del_tag($tags)
        {
            $sql="DELETE FROM stories_has_tags where tags =:tags";
            $this->query($sql);
            $this->bind(":tags", $tags);
            $this->execute();
        }
}

