<?php

class Model_Task  extends Model
{


	public function get_data($sort = false, $por = 'ASC'){
		if ($sort) {
				$res = mysqli_query($this->db, "SELECT * FROM `tasks` ORDER BY `tasks`.".$sort." ".$por);
		}else {
			$res = mysqli_query($this->db, "SELECT * FROM `tasks`");
		}
		$res = $this->pagin($res);
		return $res;
	}


	public function new_task($name_us, $email, $text){
		$text = urldecode($text);
		$text = strip_tags($text);
		// $text = htmlspecialchars($text, ENT_QUOTES);
		$res = mysqli_query($this->db, "INSERT INTO `tasks` (`id`, `name_us`, `email`, `text`, `finish`, `redadmin`) VALUES (NULL, '".urldecode($name_us)."', '".urldecode($email)."', '".$text."', 'false', 'false');");
		// print_r($res);
		return "true";
	}

	public function success($id, $finish){
		$res = mysqli_query($this->db, "UPDATE `tasks` SET `finish` = '".$finish."' WHERE `tasks`.`id` = ".$id.";");
		// print($res);
		return "true";
	}

	public function update_task($id, $text){
		$id = (int)urldecode($id);
		$text = urldecode($text);
		$res = mysqli_query($this->db, "UPDATE `tasks` SET `text` = '".$text."', `redadmin` = 'true' WHERE `tasks`.`id` = ".$id.";");
		// $res = mysqli_query($this->db, "UPDATE `tasks` SET `text` = '".$text."', `redadmin` = 'true' =  WHERE `tasks`.`id` = ".$id);
		// print($res);
		return "true";
	}


	public function get_text($id){
		$res = mysqli_query($this->db, "SELECT * FROM `tasks` WHERE `tasks`.`id` = ".$id);
		$res = mysqli_fetch_assoc($res);
		return $res;
	}



	public function pagin($arr){
		$a = $arr->num_rows;
		$arrPag = [];
		$one = [];
		foreach ($arr as $key => $value) {
			if (count($one) > 2) {
				array_push($arrPag, $one);
				$one = [];
			}
			array_push($one, $value);
			$a--;
			if ($a == 0) {
				array_push($arrPag, $one);
			}
		}

		// print_r($arrPag);
		// return $arr;
		return $arrPag;

	}

}
