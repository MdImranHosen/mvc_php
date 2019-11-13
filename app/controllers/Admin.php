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
		$tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	public function addCategory(){
		$tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addcategory');
		$this->load->view('admin/footer');
	}
	
	public function categoryList(){
        $table = "tbl_category";
		$catModel = $this->load->model("CatModel");
        $data['cat'] = $catModel->catList($table);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
        $this->load->view("admin/category", $data);
        $this->load->view('admin/footer');
	}

	public function insertCategory(){

		if (!($_POST)) {
       	header("Location: ".BASE_URL."/Admin/addCategory");
       }

        $input = $this->load->validation('DForm');

        $input->post('name')->isEmpty()->length(2, 50);
        $input->post('title')->isEmpty()->length(10, 500);
        
        if ($input->submit()) {
		$table = "tbl_category";

		$name  = $input->values['name'];
        $title = $input->values['title'];
		

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
       } else{

       	$data['catError'] = $input->errors;

       	$tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addcategory', $data);
		$this->load->view('admin/footer');
       }
	}

	public function editCategory($id=NULL){
        $table = "tbl_category";
		$catModel = $this->load->model("CatModel");
        $data['categoryData'] = $catModel->catByID($table, $id);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
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

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/addPost', $data);
		$this->load->view('admin/footer');
	}
	
	public function addNewPost(){
       
       if (!($_POST)) {
       	header("Location: ".BASE_URL."/Admin/addArticle");
       }

       $input = $this->load->validation('DForm');

       $input->post('title')->isEmpty()->length(10, 500);
       $input->post('content')->isEmpty();
       $input->post('cat')->isCatEmpty();

        if ($input->submit()) {
        	$tablePost = "tbl_post";

			$title   = $input->values['title'];
			$content = $input->values['content'];
			$cat     = $input->values['cat'];

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
        } else{

            $data['postError'] = $input->errors;

            $table = "tbl_category";
			$catModel = $this->load->model("CatModel");
	        $data['catlist'] = $catModel->catList($table);

	        $tableUi = "tbl_ui";
            $uiModel = $this->load->model("UiModel");
            $data['color'] = $uiModel->getColor($tableUi);

            $this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/addPost', $data);
			$this->load->view('admin/footer');
        }
   }

   public function articleList(){
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";

        $postModel = $this->load->model("PostModel");
        $data['listpost'] = $postModel->getpostList($tablePost);

        $catModel         = $this->load->model("CatModel");
        $data['catlist']  = $catModel->catList($tableCat);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/postLists', $data);
		$this->load->view('admin/footer');
	}

   public function editArticle($id=NULL){

        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";

        $postModel = $this->load->model("PostModel");
        $data['postbyid'] = $postModel->editPostById($tablePost, $id);

        $catModel  = $this->load->model("CatModel");
        $data['catlist']  = $catModel->catList($tableCat);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/editpost', $data);
		$this->load->view('admin/footer');
   }
   public function updatePost($id=NULL){

       if (!($_POST)) {
       	header("Location: ".BASE_URL."/Admin/articleList");
       }

       $input = $this->load->validation('DForm');

       $input->post('title')->isEmpty()->length(10, 500);
       $input->post('content')->isEmpty();
       $input->post('cat')->isCatEmpty();
       
       if ($input->submit()) {

       $cond  = "id=$id";
       $tablePost = "tbl_post";

	   $title   = $input->values['title'];
	   $content = $input->values['content'];
	   $cat     = $input->values['cat'];

	   $data = array('title' => $title, 'content' => $content, 'cat' => $cat );

	   $postModel = $this->load->model("PostModel");
       $result = $postModel->editpostupdate($tablePost, $data, $cond);

       $mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Post Updated Successfully...";
		}else{
            $mdata['msg'] = "Post Not Updated";
		}

        $url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
        header("Location:$url");

    } else{

            $data['postError'] = $input->errors;

            $tablePost = "tbl_post";
	        $tableCat  = "tbl_category";

	        $postModel = $this->load->model("PostModel");
	        $data['postbyid'] = $postModel->editPostById($tablePost, $id);

	        $catModel  = $this->load->model("CatModel");
	        $data['catlist']  = $catModel->catList($tableCat);

	        $tableUi = "tbl_ui";
		    $uiModel = $this->load->model("UiModel");
		    $data['color'] = $uiModel->getColor($tableUi);

		    $this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/editpost', $data);
			$this->load->view('admin/footer');
        }
   }

   public function delArticle($id=NULL){

   	    $tablePost = "tbl_post";
		$cond  = "id=$id";
		$postModel = $this->load->model("PostModel");
		$result = $postModel->postDeleteById($tablePost, $cond);

		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "Post Deleted Successfully...";
		}else{
            $mdata['msg'] = "Post Not Deleted";
		}

		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
        header("Location:$url");
   }

   public function uioption(){
    $tableUi = "tbl_ui";
    $uiModel = $this->load->model("UiModel");
    $data['color'] = $uiModel->getColor($tableUi);

    $this->load->view('admin/header', $data);
	$this->load->view('admin/sidebar');
	$this->load->view('admin/ui', $data);
	$this->load->view('admin/footer');
   }

   public function changeui(){

   	$input = $this->load->validation('DForm');

       $input->post('color')->isEmpty();
       
       if ($input->submit()) {
       $id = 1;
       $cond  = "id=$id";
       $tableUi = "tbl_ui";

	   $color   = $input->values['color'];

	   $data = array('color' => $color);

	   $uiModel = $this->load->model("UiModel");
       $result = $uiModel->editUIupdate($tableUi, $data, $cond);

       $mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "UI Updated Successfully...";
		}else{
            $mdata['msg'] = "UI Not Updated";
		}

        $url = BASE_URL."/Admin/uioption?msg=".urlencode(serialize($mdata));
        header("Location:$url");

   }
  }


}