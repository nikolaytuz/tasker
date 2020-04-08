<?php

class Controller_Login extends Controller
{

	function __construct(){
		// $this->$params = $param;
		$this->model = new Model_Login();
		$this->view = new View();
	}

	function action_index(){
		$mist = false;
		// print($this->isGuest());
		$this->view->generate('login_view.php', 'template_view.php', $mist);
	}

	public function action_log(){

		if ($this->params[login] && $this->params[password]) {
			$auth = $this->model->login($this->params[login],$this->params[password]);
			if ($auth) {
				$this->auth($this->params[login]);
				// print($this->isGuest());
				header("Location: /");
			}else {
				$mist = true;
				$this->view->generate('login_view.php', 'template_view.php', $mist);
			}
		}else {
			header("Location: /login");

		}
	}

	public function action_out(){
		$this->actionLogout();
		header("Location: /");
	}

	public static function auth($userId){
    // Записываем идентификатор пользователя в сессию
    $_SESSION['user'] = $userId;
	}

	public function actionLogout(){

    unset($_SESSION["user"]);
    session_destroy();
    // header("Location: /");
    return true;
	}

	public static function isGuest(){
    if (isset($_SESSION['user'])) return 'false';
    else return 'true';
}

}
