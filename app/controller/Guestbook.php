<?php 
	
	class Guestbook extends Controller{
		public function index(){
			session_start();
			if (isset($_SESSION['status'])) {
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('Guestbook_model')->getAll();
				$this->view('admin/guestbook/index', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
		public function add(){
			session_start();
			if (isset($_SESSION['status'])) {
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('User_model')->getAll();
				$this->view('admin/guestbook/post', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
		public function register(){
			if ($this->model('Guestbook_model')->post($_POST) > 0) {
				header('location:' . BASEURL . '/post');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('Gagal Menambahkan User');
					window.location.href = '/lks_6/public/guestbook';
				</script>";
			}
		}
		public function delete($id){
			if ($this->model('Guestbook_model')->delete($id) > 0) {
				header('location:' . BASEURL . '/guestbook');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('Gagal Menghapus User');
					window.location.href = '/lks_6/public/guestbook';
				</script>";
			}
		}
		public function edit($id){
			session_start();
			if (isset($_SESSION['status'])) {
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('Guestbook_model')->getById($id);
				$this->view('admin/guestbook/edit', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
		public function update(){
			if ($this->model('Guestbook_model')->edit($_POST) > 0) {
				header('location:' . BASEURL . '/guestbook');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('Gagal Menambahkan User');
					window.location.href = '/lks_6/public/guestbook';
				</script>";
			}
		}

	}

 ?>