<?php 
	require_once('models/Author.php');
	class AuthorController{
		var $author_model;

		function __construct(){
			$this->author_model = new Author();
		}

		public function list(){
			$data = array();
            $data = $this->author_model->All();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
			require_once('views/author/list.php');
		}
		public function detail(){
            $id = isset($_GET['id'])?$_GET['id']:0;
			//var_dump($id);
		$cate = $this->author_model->find($id);
			//var_dump($cate);
		require_once('views/author/detail.php');
		}

		public function add(){
			
			require_once("views/author/add.php");
			
		}
		public function delete(){
			$id = isset($_GET['id'])?$_GET['id']:0;
			$cate = $this->author_model->find($id);
			
			$status = $this->author_model->delete($id);
			var_dump($id);

			if($status == NULL){
				header("location:?mod=author");
			}
			//require_once('views/category/list.php');
		}
		public function store(){	
			$data = array();
			$data['name'] = $_POST['name'];
			$data['email'] = $_POST['email'];
			//var_dump($data);
			$status = $this->author_model->store($data);
			//var_dump($status);
			if($status == true){
				header("location:?mod=author");
			}
			
		}
		
	}
 ?>