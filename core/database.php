<?php

class manageDatabase {

	protected $conn;
	protected $servername = 'localhost';
	protected $hostname = 'fashionwear';
	protected $username = 'root';
	protected $password = '@ven2017';

	function connect(){

		try {

			$this->conn = new PDO('mysql:host='.$this->servername.';dbname='.$this->hostname, $this->username, $this->password);
			// echo 'Working';
			return $this->conn;

		} catch (PDOException $e) {

			echo $e->getMessage();

		}



	}



}
?>