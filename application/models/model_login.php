<?php

class Model_Login extends Model
{


	public function get_data(){
		$res = mysqli_query($this->db, "SELECT * FROM `users`") ;
		$row = mysqli_fetch_assoc($res);

		return $row;
	}

	public function login($login, $password){
		$l = (string)$login;
		$p = (string)$password;
		$res = mysqli_query($this->db, "SELECT * FROM `users` WHERE `login` = '".$l."' AND `password` = '".$p."' ");
		$res = mysqli_fetch_assoc($res);

		// print_r($res);
		if ($res) {
			return true;
		}else {
			return false;
		}
	}

	public function set_task($login, $password, $admin){
		$res = mysqli_query($this->db, "INSERT INTO `tasks` (`id`, `login`, `password`, `admin`) VALUES (NULL, $login, $password, $admin);");
		$row = mysqli_fetch_assoc($res);

		return "true";

	}

}
