<?php 
	
	class Admin extends Controller{
		public function index(){
			session_start();
			if (isset($_SESSION['status'])) {
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('User_model')->getAll();
				$this->view('admin/index', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
		public function post(){
			session_start();
			if (isset($_SESSION['status'])) {
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('User_model')->getAll();
				$this->view('admin/user/post', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
		public function edit($id){
			session_start();
			if (isset($_SESSION['status'])) {
				$data['user'] = $this->model('User_model')->getByEmail($_SESSION['email']);
				$data['table'] = $this->model('User_model')->getById($id);
				$this->view('admin/user/edit', $data);
			}
			else{
				header('location:' . BASEURL . '/home/login');
				exit();
			}
		}
	}

 ?>