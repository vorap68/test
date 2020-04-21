<?php

//use PDO;
  
 class Db {
 	
 	protected $db;
 	 public $host = '127.0.0.1';
   public $dbmane  = 'words';
  public  $user = 'root';
  public  $pass = 'dmitry13';
   public $charset = 'utf8';
 	
 	 public function __construct(){
		 	try {
			 	$dsn ="mysql:host=$host;dbname=$dbname;charset=utf8";
			 	$this->db = new PDO($dsn,$this->user,$this->pass);
		 	} 
		 	catch (PDOException $e) {
		   		 die('Подключение не удалось: ' . $e->getMessage());
				}
	}

	public function query($temp){
		//echo $temp;
		// $this->db->exec($temp);
		var_dump($this->db);

		}


 	}
