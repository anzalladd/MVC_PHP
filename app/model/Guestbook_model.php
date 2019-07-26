<?php 

	class Guestbook_model{
		private $table = 'guestbook';
		private $db;
		public function __construct(){
			$this->db = new Database;
		}

		public function getById($id){

			$this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
			$this->db->bind('id', $id);
			$this->db->execute();
			return $this->db->get();
		}

		public function getByEmail($email){
			$this->db->query("SELECT * FROM {$this->table} WHERE email = :email");
			$this->db->bind('email', $email);
			$this->db->execute();
			return $this->db->get();
		}
		public function getAll(){
			return $this->db->gets($this->table); 
		}
		public function post($data){
			$this->db->query("INSERT INTO {$this->table} VALUES (null, :fullname, :email)");
			$this->db->bind('fullname', $data['fullname']);
			$this->db->bind('email', $data['email']);
			$this->db->execute();
			return $this->db->rowCount();
		}
		public function delete($id){
			$this->db->query("DELETE FROM {$this->table} WHERE id = :id");
			$this->db->bind('id', $id);
			$this->db->execute();
			return $this->db->rowCount();
		}
		public function edit($data){
			$this->db->query("UPDATE {$this->table} SET fullname = :fullname, email = :email WHERE id = :id");
			$this->db->bind('fullname', $data['fullname']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('id', $data['id']);
			$this->db->execute();
			return $this->db->rowCount();
		}
	}

 ?>