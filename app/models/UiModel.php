<?php
/**
 * UiModel Model....
 */
class UiModel extends DModel{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function getColor($table){
        $sql  = "SELECT * FROM $table ORDER BY id DESC";
		return $this->db->select($sql);
	}

	public function editUIupdate($table, $data, $cond){
		return $this->db->update($table, $data, $cond);
	}


}