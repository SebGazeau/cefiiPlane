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

			if (preg_match($regex_email, $info['email'])) {

				if (strlen($info['password']) >= 4 && strlen($info['password']) <= 20 && preg_match($regex_password, $info['password'])) {

					// =================start check email exist in the DBB==========================

					if ($mailOk == "") {
						$message = "Your email is incorrect please try!";
						$this->view->erreur($message);

					} else {

						// =================End check check email exist in the DBB==========================

						// =================start check password DBB==========================

						if ($passwordOk != "") {
							$adminOk             = $this->model->checkAdmin($PostEmail);
							$idUser              = $this->model->getUserId($PostEmail);
							$_SESSION["id_user"] = $idUser;
							$_SESSION["admin"]   = $adminOk;
							// var_dump($_SESSION["admin"]);
							// die;
							if ($adminOk == "1") {

								$listUser = $this->model->getList();
								$this->view->displayAdmin($listUser);

							} else {

								$this->view->displayGame($idUser);

							}

						} elseif ($passwordOk == "") {
							$message = "Your password is incorrect please try!";
							$this->view->erreur($message);
						}

					}
					// =================End check password DBB==========================

				} else {
					echo "Your password is not in the right format";
				}

			} else {

				echo "Your email is not in the right format";
			}

			// =================End Test regex==========================

		}

	}

	public function deleteUser() {
		$itemId   = $_GET['id'];
		$delete   = $this->model->DeleteThisItem($itemId);
		$listUser = $this->model->getList();
		$this->view->displayAdmin($listUser);

	}

	public function modifForm() {
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id       = $_GET['id'];
			$userInfo = $this->model->getUserInfo($id);
			$this->view->displayModifFrom($userInfo, $id);

		}

	}

	public function modifUser() {

		// $FormPost     = $_POST;

		$itemId       = $_GET['id'];
		$postName     = $_POST['name'];
		$postEmail    = $_POST['email'];
		$postPassword = $_POST['password'];
		$postAcces    = $_POST['acces'];
		var_dump($_POST);

		$update = $this->model->modifItem($postName, $postEmail, $postPassword, $postAcces, $itemId);

		$listUser = $this->model->getList();
		$this->view->displayAdmin($listUser);

	}

	public function logout() {
		session_destroy();
		$this->view->GoBackToLoginPage();
	}

}
// !
