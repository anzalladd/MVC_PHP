<?php 
	
	class Post extends Controller{
		public function index(){
			session_start();
			if (isset($_SESSION['status'])) {
				$jumlahData = count($this->model('Post_model')->gets('post'));
				$data['halaman'] = ceil($jumlahData / 4);
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('Post_model')->getAll();
				$this->view('admin/post/index', $data);
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
				$this->view('admin/post/post', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
		public function register(){
			if ($this->model('Post_model')->post($_POST) > 0) {
				header('location:' . BASEURL . '/post');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('Gagal Menambahkan User');
					window.location.href = '/lks_6/public/admin';
				</script>";
			}
		}
		public function delete($id){
			$data['user'] = $this->model('Post_model')->getById($id);
			if ($this->model('Post_model')->delete($id) > 0) {
				unlink(BASEPATH . '/media' . $data['user']['img']);
				header('location:' . BASEURL . '/admin');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('Gagal Menghapus User');
					window.location.href = '/lks_6/public/post';
				</script>";
			}
		}
		public function edit($id){
			session_start();
			if (isset($_SESSION['status'])) {
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('Post_model')->getById($id);
				$this->view('admin/post/edit', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
		public function update(){
			if ($this->model('Post_model')->edit($_POST) > 0) {
				header('location:' . BASEURL . '/admin');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('Gagal Menambahkan User');
					window.location.href = '/lks_6/public/post';
				</script>";
			}
		}

	}

 ?>