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
        
        $data = array();
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
		$data = array();
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

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view("catupdate", $mdata);
		$this->load->view('admin/footer');
	}
}