<?php

class database {

	function connect() {

		$conn = new mysqli('localhost', 'root', '@ven2017', 'fashionwear');

		if(!$conn->connect_errno) {
			return $conn;
		} else {
			return "Connections failed!";
		}
	}
}
