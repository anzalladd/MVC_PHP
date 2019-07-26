<?php 
	
	class Home extends Controller{
		public function index(){
			$data['product']  = $this->model('Post_model')->showLimit('product');
			$data['news']  = $this->model('Post_model')->showLimit('news');
			$this->view('home/index', $data);
		}
		public function login(){
			$this->view('home/login');
		}
		public function detail_product($id){
			$data['table'] = $this->model('Post_model')->getById($id);
			$this->view('home/detailProduct', $data);
		}
		public function detail_news($id){
			$data['table'] = $this->model('Post_model')->getById($id);
			$this->view('home/detailNews', $data);
		}
		public function product(){
			if (isset($_GET['search'])) {
				$data['table'] = $this->model('Post_model')->searchPost($_GET['search'], 'product');
				$this->view('home/listProduct', $data);
			}

			else{
				$data['table'] = $this->model('Post_model')->getAllPost('product');
				$this->view('home/listProduct', $data);
			}
		}
		public function news(){
			if (isset($_GET['search'])) {
				$data['table'] = $this->model('Post_model')->searchPost($_GET['search'], 'news');
				$this->view('home/listNews', $data);
			}

			else{
				$data['table'] = $this->model('Post_model')->getAllPost('news');
				$this->view('home/listNews', $data);
			}
		}
		public function guest(){
			if ($this->model('Guestbook_model')->post($_POST) > 0) {
				session_start();
				$_SESSION['guest'] = 'done';
				header('location:' . BASEURL . '/home');
				exit();
			}
			else{
				header('location:' . BASEURL . '/home');
				exit();
			}
		}

	}

 ?>