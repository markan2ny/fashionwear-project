<?php
	class manageFunction {

		public $new;

		public function __construct(){

			include_once('database.php');
			$conn = new manageDatabase;
			$this->new = $conn->connect();

			return $this->new;
		}

		public function getData($query){

			$sql = $this->new->prepare($query);
			$sql->execute();
			$result = $sql->fetchAll(PDO::FETCH_OBJ);

			return $result;
		}

		public function getSpecific($arr, $query){

			$sql = $this->new->prepare($query);
			$sql->execute($arr);
			$result = $sql->fetchAll(PDO::FETCH_OBJ);

			return $result;
		}

		public function login($arr, $query){

			$sql = $this->new->prepare($query);
			$sql->execute($arr);
			$result = $sql->fetchAll(PDO::FETCH_OBJ);

			return $result;
		}

		public function insertData($arr, $query){

			$sql = $this->new->prepare($query);
			$sql->execute($arr);
			$result = $sql->rowCount();

			return $result;
		}

		public function updateData($arr, $query){

			$sql = $this->new->prepare($query);
			$sql->execute($arr);
			$result = $sql->rowCount();

			return $result;


		}
		public function deleteData($arr, $query){
			$sql = $this->new->prepare($query);
			$sql->execute($arr);
			$result = $sql->rowCount();

			return $result;
		}

	}












 ?>