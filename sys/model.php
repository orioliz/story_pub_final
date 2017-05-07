<?php 	

	namespace X\Sys;


	Class Model {

		protected $db;
		protected $stmt;

		public function __construct(){
			$this->db=DB::singleton();
		}
		public function query($sql)
		{
			$this->stmt=$this->db->prepare($sql);
		}

		public function bind($param,$value,$type=null)
		{
			if($type != null)
			{
				$this->stmt->bindValue($param,$value,$type);
			}
			else
			{
				if(is_int($value))
				{
					$type=\PDO::PARAM_INT;
					$this->stmt->bindValue($param,$value,$type);
				}
				else if(is_bool($value))
				{
					$type=\PDO::PARAM_BOOL;
					$this->stmt->bindValue($param,$value,$type);
				}
				else if(is_null($value))
				{
					$type=\PDO::PARAM_NULL;
					$this->stmt->bindValue($param,$value,$type);
				}
				else 
				{
					$type=\PDO::PARAM_STR;
					$this->stmt->bindValue($param,$value,$type);
				}
			}
		}

		//ejecuta sentencia 
		function execute()	{
			return $this->stmt->execute();
		}

		//Convierte el resultado  en array
		function resultSet() {
			$result = $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
			return $result;
		}

		// 1 resultado
		function single() {
			$result = $this->stmt->fetch(\PDO::FETCH_ASSOC);
			return $result;
		}

		//Devuelve el num de filas 
		function rowCount()	{
			$count = $this->stmt->rowCount();
			return $count;
		}

		//Devuelve el ultimo id
		function lastInsertId()	{
			return $this->stmt->lastInsertId(); 
		}
        
		function beginTransaction()	{
			$this->stmt->beginTransaction(); 
		}

        function endTransaction() {
			$this->stmt->commit(); 
		}
		//cancela una transaccion
		function cancelTransactio()	{
			$this->stmt->rollback(); 
		}
		// comando preparado SQL
		function debugDumpParams()	{
			$this->stmt->debugDumpParams();
		}
	}