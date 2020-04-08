<?php

class Controller_Main extends Controller
{

	function __construct(){
		// $this->$params = $param;
		$this->model = new Model_Task();
		$this->view = new View();
	}

	function action_index(){
		$page = 1;
		if ($this->params[page]) {
			$page = $this->params[page];
		}
		$data = $this->model->get_data($this->params[sort], $this->params[por]);
		$pages = count($data);
		if ($page>$pages) {
			$page = $pages;
		}
		$dats = $data;
		// print($this->isGuest());
		$data = array('dat' => $data[$page-1], 'dats' => $dats, 'isadmin' => $this->isGuest(), 'sort' => $this->params[sort], 'por' => $this->params[por]);
		$this->view->generate('main_view.php', 'template_view.php', $data );
	}

	public function action_succses(){
		if ($this->isGuest()) {
			if ($this->params[id]) {
				$this->model->success($this->params[id], 'true');
				header("Location: /");

			}
		}else {
			header("Location: /");
		}
	}

	public function action_add(){
		$data = false;
		if ($this->params[name] && $this->params[email] && $this->params[text]) {
			$this->model->new_task($this->params[name], $this->params[email], $this->params[text]);
			$data = true;
		}
		$this->view->generate('add_view.php', 'template_view.php',$data );
	}




	public function action_redact(){
		if ($this->isGuest()) {
			$redact = false;
			if ($this->params[id]) {
				$task = $this->model->get_text($this->params[id]);
			}else {
				header("Location: /");
			}
			// print_r($task[text]);
			if ($this->params[text] && (urldecode($this->params[text]) != $task[text]) ) {
				$this->model->update_task($this->params[id], $this->params[text]);
				$task[text] = urldecode($this->params[text]);
				$redact = true;
			}
			$data = array('id' => $this->params[id], 'task' => $task, 'redact' => $redact  );
			$this->view->generate('redact_view.php', 'template_view.php',$data );
		}else {
			header("Location: /");

		}




	}




	public static function isGuest(){
    if (isset($_SESSION['user'])) return 1;
    else return 0;
	}
}
