<?php

class Model {
	
	public $pdo;
	
	public function insertExcel($arr) {
		$this->pdo = new Db;
		
		$fields = '';

		foreach($arr[2] as $key => $cell) {
			$fields .= '`'.$key.'`'.',';
		}	
		$fields = trim($fields,',');
		print_r($fields);
		$str = '';
		// INSERT INTO `main` (``,``,``..) VALUES ('','','',),(),(),();
		foreach($arr as $item) {
			$str .= "(";
			foreach($item as $cell) { 
				$str .= "'".$cell."',";
			}
			$str = trim($str,",");
			$str .= "),";
		}
		$str = trim($str,",");
		//print_r($arr);
		$sql = "INSERT INTO `items` (".$fields.") VALUES ".$str;
		//echo $query;
		$result = $this->pdo->query($sql);

		
		
	
	
	}
	
	
	
	
}
?>