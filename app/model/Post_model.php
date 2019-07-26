<?php 

	class Post_model{
		private $table = 'post';
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

		public function gets($table){
			return $this->db->gets($table);
		}


		public function getAllPost($type){
			$this->db->query("SELECT * FROM {$this->table} where type = :type");
			$this->db->bind('type', $type);
			return $this->db->all();
		}

		public function getByEmail($email){
			$this->db->query("SELECT * FROM {$this->table} WHERE email = :email");
			$this->db->bind('email', $email);
			$this->db->execute();
			return $this->db->get();
		}
		public function getAll(){
			$jumlahData = count($this->db->gets($this->table));
			$jumlahHalaman = ceil($jumlahData / 4);
			if($_GET['halaman'] != null){
				$awalData = (4 * $_GET['halaman']) - 4;
			}else{
				$awalData = 0;
			}
			$this->db->query("SELECT * FROM {$this->table} LIMIT :awal, 4");
			$this->db->bind('awal', $awalData);
				$this->db->execute();
			return $this->db->all();
		}
		public function post($data){
			$image;
			$target_dir = '/media/' . basename($_FILES['image']['name']);
			$target_file = BASEPATH . $target_dir;
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
				$image = '/' . basename($_FILES['image']['name']);
			}
			else{
				$image = '/mendoan.jpg';
			}
			$this->db->query("INSERT INTO {$this->table} VALUES (null, :title, :description, :img, :type, :is_published)");
			$this->db->bind('title', $data['title']);
			$this->db->bind('description', $data['description']);
			$this->db->bind('img', $image);
			$this->db->bind('type', $data['type']);
			$this->db->bind('is_published', $data['is_published']);
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
			$old_data = $this->getById($data['id']);
			$image;
			$password;
			$target_dir = '/media/' . basename($_FILES['image']['name']);
			$target_file = BASEPATH . $target_dir;
			if (isset($_FILES['image'])) {
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
				$image = '/' . basename($_FILES['image']['name']);
				unlink(BASEPATH . '/media' . $old_data['img']);	
			}
			else{
				$image = '/mendoan.jpg';
			}
			}
			else{
				$image = $old_data['img'];
			}
			$this->db->query("UPDATE {$this->table} SET title = :title, description = :description, type = :type, is_published = :is_published, img = :img WHERE id = :id");
			$this->db->bind('title', $data['title']);
			$this->db->bind('description', $data['description']);
			$this->db->bind('type', $data['type']);
			$this->db->bind('is_published', $data['is_published']);
			$this->db->bind('img', $image);
			$this->db->bind('id', $data['id']);
			$this->db->execute();
			return $this->db->rowCount();
		}
		public function showLimit($type){
			$this->db->query("SELECT * FROM {$this->table} where type = :type limit 5");
			$this->db->bind('type', $type);
			return $this->db->all();
		}
		public function searchPost($search, $type){
			$this->db->query("SELECT * FROM {$this->table} WHERE title LIKE :search and type = :type");
			$this->db->bind('search', "%$search%");
			$this->db->bind('type', $type);
			return $this->db->all();
		}
	}

 ?>