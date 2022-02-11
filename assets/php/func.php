<?php 

	require_once 'config.php';

	class Func extends Database {

//count Total No. of Rows
		public function totalCount($tablename){
			$sql = "SELECT * FROM $tablename";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$count = $stmt->rowCount();
			return $count;
		}
	
	}

 ?>