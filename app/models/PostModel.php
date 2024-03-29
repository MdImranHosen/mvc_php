<?php
/**
 * Post Model....
 */
class PostModel extends DModel{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function postList($table){
        $sql  = "SELECT * FROM $table ORDER BY id DESC LIMIT 3";
		return $this->db->select($sql);
	}
	public function getpostList($table){
        $sql  = "SELECT * FROM $table ORDER BY id DESC";
		return $this->db->select($sql);
	}

	public function postByID($tablePost, $tableCat, $id){

       $sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost INNER JOIN  $tableCat ON $tablePost.cat = $tableCat.id WHERE $tablePost.id = $id";
       return $this->db->select($sql);
	}
	public function getPostByCat($tablePost, $tableCat, $id){
		$sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost INNER JOIN  $tableCat ON $tablePost.cat = $tableCat.id WHERE $tableCat.id = $id";
       return $this->db->select($sql);
	}

	public function newpostList($table){
        $sql  = "SELECT * FROM $table ORDER BY id DESC LIMIT 5";
		return $this->db->select($sql);
	}
	
	public function getSearchbyCatPost($tablePost, $keyword, $cat){
         
         if(empty($keyword) && empty($cat)){
            header("Location: ".BASE_URL."/");
         } elseif(!empty($keyword) && !empty($cat)){

           $sql = "SELECT * FROM $tablePost WHERE cat = $cat AND title LIKE '%$keyword%' OR content LIKE '%$keyword%'";

         } elseif(isset($keyword) && !empty($keyword)){
         $sql = "SELECT * FROM $tablePost WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
		} elseif(isset($cat)){
          $sql = "SELECT * FROM $tablePost WHERE cat = $cat";
		}
		
        return $this->db->select($sql);
	}
	public function addpostinsert($tablePost, $data){
     return $this->db->insert($tablePost, $data);
	}

	public function editPostById($table, $id){

       $sql = "SELECT * FROM $table WHERE id=:id";
       $data = array(":id" => $id);
       return $this->db->select($sql, $data);
	}

	public function editpostupdate($table, $data, $cond){
		return $this->db->update($table, $data, $cond);
	}
	public function postDeleteById($table, $cond){
		return $this->db->delete($table, $cond);
	}
}