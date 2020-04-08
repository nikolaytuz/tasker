<?php

class Model
{
	protected $db;

	public function __construct() {
		$this->db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if (mysqli_connect_errno()) {
    	echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		}

	}
	// метод выборки данных
	public function get_data(){

	}
}
