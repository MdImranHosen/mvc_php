<?php
/**
 * Index Controller
 */
class Index extends DController
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function Index(){
      $this->home();
	}

	public function home(){

		$data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";

        $catModel         = $this->load->model("CatModel");
        $data['catlist']  = $catModel->catList($tableCat);

		$postModel        = $this->load->model("PostModel");
        $data['post']     = $postModel->postList($tablePost);
        $data['newpost']  = $postModel->newpostList($tablePost);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view("header", $data);
        $this->load->view("search", $data);
        $this->load->view("content", $data);
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
		
	}
	public function postDetails($id=NULL){

	    $data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";

		$postModel = $this->load->model("PostModel");
        $data['postbyid'] = $postModel->postByID($tablePost, $tableCat, $id);

       
		$catModel = $this->load->model("CatModel");
        $data['catlist']  = $catModel->catList($tableCat);
        $data['newpost']  = $postModel->newpostList($tablePost);
        
        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view("header", $data);
        $this->load->view("search", $data);
        $this->load->view("post_details", $data);
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
	}
	public function postByCat($id=NULL){

		$data = array();
        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";
		
		$postModel = $this->load->model("PostModel");
        $data['postbycats'] = $postModel->getPostByCat($tablePost, $tableCat, $id);

        $catModel = $this->load->model("CatModel");
        $data['catlist']  = $catModel->catList($tableCat);
        $data['newpost']  = $postModel->newpostList($tablePost);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view("header", $data);
        $this->load->view("search", $data);
        $this->load->view("postbycat", $data);
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
	}
	public function search(){

		$data = array();
		$keyword   = $_REQUEST['keyword'];
		$cat       = $_REQUEST['cat'];

        $tablePost = "tbl_post";
        $tableCat  = "tbl_category";
		
		$postModel = $this->load->model("PostModel");
        $data['postbysearch'] = $postModel->getSearchbyCatPost($tablePost, $keyword, $cat);

        $catModel = $this->load->model("CatModel");
        $data['catlist']  = $catModel->catList($tableCat);
        $data['newpost']  = $postModel->newpostList($tablePost);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view("header", $data);
        $this->load->view("search", $data);
        $this->load->view("sresult", $data);
		$this->load->view("sidebar", $data);
		$this->load->view("footer");
	}

	public function notFound(){
		$this->load->view("404");
	}
}