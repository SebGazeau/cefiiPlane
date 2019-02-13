<?php

include "Model/ModelLogin.php";
include "View/ViewLogin.php";

class ControllerLogin extends ControllerBase {
	public function __construct() {
		parent::__construct("Login");

	}

	public function login() {

		$PostEmail    = $_POST['email'];
		$PostPassword = $_POST['password'];

		$passwordOk = $this->model->checkPasswordUser($PostEmail, $PostPassword);
		$mailOk     = $this->model->checkMailUser($PostEmail);

		// =================start check that the Post are not empty ==========================
		

		$message = "";
		if ($PostPassword == "" && $PostEmail == "") {
			$message = "your fields are empty! Please try again ";
			$this->view->erreur($message);
		} elseif ($PostEmail == "") {
			$message = "You haven't entered your email! Please enter your email!";
			$this->view->erreur($message);
		} elseif ($PostPassword == "") {

			$message = "You haven't entered your password! Please enter your password!";
			$this->view->erreur($message);
		} else {
  

// =================End check that the Post are not empty ==========================

// =================start Test regex==========================
// ------variabels----------------
	$info = $_POST;

	$regex_email = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";

	$regex_password = "(^[a-zA-Z]{0,20}[0-9]{0,20}$)";
// -----end variabels----------------

 if(preg_match($regex_email,$info['email'])){

   if (strlen($info['password'])>=4 && strlen($info['password'])<=20 && preg_match($regex_password , $info['password'])){


			// =================start check email exist in the DBB==========================

			if ($mailOk == "") {
				$message = "Your email is incorrect please try!";
				$this->view->erreur($message);

			} else {

				// =================End check check email exist in the DBB==========================

				// =================start check password DBB==========================

				if ($passwordOk != "") {

					$idUser              = $this->model->getUserId($PostEmail);
					$_SESSION["id_user"] = $idUser;

					var_dump($_SESSION["id_user"]);
					$this->view->displayGame($idUser);

				} elseif ($passwordOk == "") {
					$message = "Your password is incorrect please try!";
					$this->view->erreur($message);
				}

			}
			// =================End check password DBB==========================


   } else {
   	echo "password is not good";
   }

} else {

	echo "email is not good";
}



// =================End Test regex==========================

		

		}

	}

}
