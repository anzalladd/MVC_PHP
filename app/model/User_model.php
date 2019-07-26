<?php 

	class User_model{
		private $table = 'user';
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
		public function login($data){
			$old = $this->getByEmail($data['email']);
			if (password_verify($data['password'], $old['password'])) {
				return 1;
			}
			else{
				return 0;
			}
		}
		public function getAll(){
			return $this->db->gets($this->table); 
		}
		public function post($data){
			try{
			
			$image;
			$target_dir = '/media/' . basename($_FILES['image']['name']);
			$target_file = BASEPATH . $target_dir;
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
				$image = '/' . basename($_FILES['image']['name']);
			}
			else{
				$image = '/mendoan.jpg';
			}
			$this->db->query("INSERT INTO {$this->table} VALUES (null, :email, :fullname, :password, :img)");
			$this->db->bind('email', $data['email']);
			$this->db->bind('fullname', $data['fullname']);
			$this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
			$this->db->bind('img', $image);
			$this->db->execute();
			return $this->db->rowCount();
			}
			catch(Exception $e){
				return 0;			
			}
		}
		public function delete($id){
			$this->db->query("DELETE FROM {$this->table} WHERE id = :id");
			$this->db->bind('id', $id);
			$this->db->execute();
			return $this->db->rowCount();
		}
		public function edit($data){
			$old_data = $this->getById($data['id']);
			$image;
			$password;
			$target_dir = '/media/' . basename($_FILES['image']['name']);
			$target_file = BASEPATH . $target_dir;
			if ($_FILES['image'] != '') {
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
				$image = '/' . basename($_FILES['image']['name']);
				unlink(BASEPATH . '/media' . $old_data['img']);	
			}
				else{
					$image = $old_data['img'];
				}
			}
			else if($_FILES['image'] == ''){
				$image = $old_data['img'];
			}
			if ($data['password'] == '') {
				$password = $old_data['password'];
			}
			else{
				$password = password_hash($data['password'], PASSWORD_DEFAULT);
			}
			$this->db->query("UPDATE {$this->table} SET email = :email, fullname = :fullname, password = :password, img = :img WHERE id = :id");
			$this->db->bind('email', $data['email']);
			$this->db->bind('fullname', $data['fullname']);
			$this->db->bind('password', $password);
			$this->db->bind('img', $image);
			$this->db->bind('id', $data['id']);
			$this->db->execute();
			return $this->db->rowCount();
		}
	}

 ?>