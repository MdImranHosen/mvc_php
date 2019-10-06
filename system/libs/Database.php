<?php
/**
 * Database class...
 */
class Database extends PDO{
	
	public function __construct($dsn, $user, $pass)
	{
      //$db_connect = new PDO($dsn, $user, $pass);
      parent::__construct($dsn, $user, $pass);
	}

	public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC){
		$stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
         $stmt->bindParam($key, $value);
        }
		$stmt->execute();
		return $stmt->fetchAll($fetchStyle);
	}
	public function insert($table, $data = array()){
           $keys = implode(",", array_keys($data));
           $values = ":".implode(", :", array_keys($data));

		$sql = "INSERT INTO $table($keys) VALUES($values)";

		$stmt = $this->prepare($sql);

		foreach ($data as $key => $value) {
			$stmt->bindParam(":$key", $value);
		}
		
		return $stmt->execute();
	}
	public function update($table, $data = array(), $cond){
      $updateKeys = NULL;
      foreach ($data as $key => $value) {
      	$updateKeys .= "$key=:$key,";
      }

      $updateKeys = rtrim($updateKeys, ", ");
      $updateSql = "UPDATE $table SET $updateKeys WHERE $cond";
      $stmt = $this->prepare($updateSql);

      foreach ($data as $key => $value) {
			$stmt->bindParam(":$key", $value);
		}
		
		return $stmt->execute();
	}
	// Delete Query.....
	public function delete($table, $cond, $limit = 1){
		$deleteSql = "DELETE FROM $table WHERE $cond LIMIT $limit";
		return $this->exec($deleteSql);
	}
}