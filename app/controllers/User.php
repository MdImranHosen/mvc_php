<?php
/**
 * User Controller...
 */
class User extends DController
{
	
	public function __construct()
	{
		parent::__construct();
		$data = array();
	}
	public function Index(){
		$this->create_user();
	}
	public function create_user(){
		
        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
        $this->load->view("admin/adduser");
        $this->load->view('admin/footer'); 
	}
	public function insertUser(){
		if (!($_POST)) {
			header("Location: ".BASE_URL."/User");
		}

		$input = $this->load->validation('DForm');

        $input->post('username')->isEmpty()->length(2, 30);
        $input->post('password')->isEmpty()->length(6, 32);
        $input->post('level')->isCatEmpty();
        
        if ($input->submit()) {
		$tableUser = "tbl_user";

		$username  = $input->values['username'];
        $password  = md5($input->values['password']);
        $level     = $input->values['level'];

		$data = array('username' => $username, 'password' => $password, 'level' => $level );
		$userModel = $this->load->model("UserModel");
		$result = $userModel->addUser($tableUser, $data);

		$mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "User Added Successfully...";
		} else{
            $mdata['msg'] = "User Not Added";
		}
        $url = BASE_URL."/User/user_list?msg=".urlencode(serialize($mdata));
        header("Location:$url");
       } else{

       	$data['userError'] = $input->errors;

       	$tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
        $this->load->view("admin/adduser", $data);
        $this->load->view('admin/footer');
       }
	}
	public function user_list(){
        $tableUser = "tbl_user";
		$userModel = $this->load->model("UserModel");
        $data['user'] = $userModel->userList($tableUser);

        $tableUi = "tbl_ui";
        $uiModel = $this->load->model("UiModel");
        $data['color'] = $uiModel->getColor($tableUi);

        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
        $this->load->view("admin/users", $data);
        $this->load->view('admin/footer');
	}

	public function delUser($id=NULL){

		$table = "tbl_user";
		$cond  = "id=$id";
		$userModel = $this->load->model("UserModel");
		$result = $userModel->userDeleteById($table, $cond);

        $mdata = array();
		if ($result == 1) {
			$mdata['msg'] = "User Deleted Successfully...";
		} else{
            $mdata['msg'] = "User Not Deleted";
		}
        $url = BASE_URL."/User/user_list?msg=".urlencode(serialize($mdata));
        header("Location:$url");
	}
}