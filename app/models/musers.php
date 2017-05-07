<?php 

namespace X\App\Models;

use X\Sys\Model;

Class mUsers extends Model
{

		public function __construct()
		{
			parent::__construct();
			
		}

		

		function get_users()
		{
			$sql='select * from users ';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
		}

		

		function set_rol($id,$rol)
		{
			$sql='Update users Set roles =:rol Where idusers = :id';
			$this->query($sql);
			$this->bind(":rol", $rol);
			$this->bind(":id", $id);
            $this->execute();
		}

		

		function delete_user($id)
		{
			$sql='Delete from users Where idusers = :id';
			$this->query($sql);
			$this->bind(":id", $id);
            $this->execute();

		}

}