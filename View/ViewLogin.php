<?php

class ViewLogin extends ViewBase {
	public function __construct() {
		parent::__construct();

	}

	public function displayGame($idUser) {

		// echo "<h1>Your are logedin</h1>";
		$this->pageHTML .= file_get_contents("View/html/GameMainPage.html");
		$this->displayHTML();

	}

	public function displayGameAdmin() {
		echo "you are on the page admin";
	}

	public function erreur($message) {
		$message;
		$this->pageHTML .= $message;
		$this->displayHTML();

	}

}
