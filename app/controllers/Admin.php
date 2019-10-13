<?php
/**
 * Admin Controller....
 */
class Admin extends DController
{
	
	public function __construct()
	{
		parent:: __construct();
		Session::checkSession();
		$data = array();
	}

	public function Index(){
		$this->home();
	}

	public function home(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	public function addCategory(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addcategory');
		$this->load->view('admin/footer');
	}
	
	public function categoryList(){
        $table = "tbl_category";
		$catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList($table);

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
        $this->load->view("admin/category", $data);
        $this->load->view('admin/footer');
	}

	public function insertCategory(){

		$table = "tbl_category";

		$name  = $_POST['name'];
		$title = $_POST['title'];
		$data = array('name' => $name, 'title' => $title );
		$catModel = $this->load->model("CatModel");
		$result = $catModel->insertCat($table, $data);

		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Category Added Successfully...";
		}else{
            $mdata['msg'] = "Category Not Added";
		}
        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
	}

	public function editCategory($id=NULL){
        $table = "tbl_category";
		$catModel = $this->load->model("CatModel");
        $data['categoryData'] = $catModel->catByID($table, $id);

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
        $this->load->view("admin/catupdate", $data);
        $this->load->view('admin/footer');
	}

	public function updateCat($id=NULL){

		$table = "tbl_category";
		$name  = $_POST['name'];
		$title = $_POST['title'];
		$data = array('name' => $name, 'title' => $title );

		$cond  = "id=$id";
		$catModel = $this->load->model("CatModel");
		$catResult = $catModel->catUpdate($table, $data, $cond);

		$mdata = array();
		if ($catResult == 1) {
			$mdata['msg'] = "Category Updated Successfully...";
		}else{
            $mdata['msg'] = "Category Not Updated";
		}

        $url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
	}
	public function delCategory($id=NULL){
		$table = "tbl_category";
		$cond  = "id=$id";
		$catModel = $this->load->model("CatModel");
		$catResult = $catModel->catDeleteById($table, $cond);

		$mdata = array();
		if ($catResult == 1) {
			$mdata['msg'] = "Category Deleted Successfully...";
		}else{
            $mdata['msg'] = "Category Not Deleted";
		}

		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
	}

	public function addArticle(){
        $table = "tbl_category";
		$catModel = $this->load->model("CatModel");
        $data['catlist'] = $catModel->catList($table);

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addPost', $data);
		$this->load->view('admin/footer');
	}
	
	public function articleList(){
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";

        $postModel = $this->load->model("PostModel");
        $data['listpost'] = $postModel->getpostList($tablePost);

        $catModel         = $this->load->model("CatModel");
        $data['catlist']  = $catModel->catList($tableCat);

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/postLists', $data);
		$this->load->view('admin/footer');
	}
	public function addNewPost(){
        
        if(!$_POST['submit']){
           header("Location: ".BASE_URL."/Admin");
        } else{

		$tablePost = "tbl_post";

		$title  = $_POST['title'];
		$content = $_POST['content'];
		$cat = $_POST['cat'];
		$data = array('title' => $title, 'content' => $content, 'cat' => $cat );

		$postModel = $this->load->model("PostModel");
        $result = $postModel->addpostinsert($tablePost, $data);

		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Post Added Successfully...";
		}else{
            $mdata['msg'] = "Post Not Added";
		}
        $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
	}
   }
}