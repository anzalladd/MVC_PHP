<?php 
	
	class Database{
		private $db_host = DB_HOST;
		private $db_name = DB_NAME;
		private $username = DB_USERNAME;
		private $password = DB_PASSWORD;
		private $data_handler;
		private $statement;
		public function __construct(){
			$source = "mysql:host={$this->db_host};dbname={$this->db_name}";
			$options = [
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			];
			try {
				$this->data_handler = new PDO($source, $this->username, $this->password, $options);
			} catch (PDOException $e) {
				die($e -> getMessage());
			}
		}
		public function query($query){
			$this->statement = $this->data_handler->prepare($query);
		}
		public function bind($param, $value, $type = null){
			if (is_null($type)) {
				switch (true) {
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
						break;
				}
			}
			$this->statement->bindValue($param, $value, $type);
		}
		public function execute(){
			$this->statement->execute();
		}
		public function all(){
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_ASSOC);
		}
		public function gets($table){
			$this->query("SELECT * FROM {$table}");
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get(){
			$this->execute();
			return $this->statement->fetch(PDO::FETCH_ASSOC);
		}
		public function rowCount(){
			return $this->statement->rowCount();
		}
	}
 ?>