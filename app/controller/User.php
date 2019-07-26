<?php 
	
	class User extends Controller{
		public function login(){
			if ($this->model('User_model')->login($_POST) > 0) {
				session_start();
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['status'] = 'login';
				header('location:' . BASEURL . '/admin');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('User tidak ditemukan');
					window.location.href = '/lks_6/public/home/login';
				</script>";

			}
		}
		public function logout(){
			session_start();
			session_destroy();
			header('location:' . BASEURL . '/home/login');
		}
		public function post(){
			if ($this->model('User_model')->post($_POST) > 0) {
				header('location:' . BASEURL . '/admin');
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
			$data['user'] = $this->model('User_model')->getById($id);
			if ($this->model('User_model')->delete($id) > 0) {
				unlink(BASEPATH . '/media' . $data['user']['img']);
				header('location:' . BASEURL . '/admin');
				exit();
			}
			else{
				echo "<script type='text/javascript'>
					alert('Gagal Menghapus User');
					window.location.href = '/lks_6/public/admin';
				</script>";
			}
		}
		public function edit(){
			if ($this->model('User_model')->edit($_POST) > 0) {
				header('location:' . BASEURL . '/admin');
				exit();
			}
		}
	}

 ?>