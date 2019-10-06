<?php
/**
 * Category Controller
 */
class Category extends DController
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function categoryList(){
        
        $data = array();
        $table = "tbl_category";
		$catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList($table);
        $this->load->view("category", $data);
	}
	public function catById(){
		$data = array();
        $table = "tbl_category";
        $id = 2;
		$catModel = $this->load->model("CatModel");
        $data['catbyid'] = $catModel->catByID($table, $id);
        $this->load->view("catbyid", $data);
	}
	public function addCategory(){
		$this->load->view("addcategory");
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

		$this->load->view("addcategory", $mdata);
	}
	public function editCategory(){
		$data = array();
        $table = "tbl_category";
        $id = 9;
		$catModel = $this->load->model("CatModel");
        $data['categoryData'] = $catModel->catByID($table, $id);
        $this->load->view("category_edit", $data);
	}
	public function updateCat(){
		$table = "tbl_category";

        $id    = $_POST['id'];
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

		$this->load->view("category_edit", $mdata);
	}
	public function deleteCatById(){
		$table = "tbl_category";
		$cond  = "id=10";
		$catModel = $this->load->model("CatModel");
		$catModel->catDeleteById($table, $cond);

	}
}