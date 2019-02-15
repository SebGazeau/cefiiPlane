<?php

class ModelLogin extends ModelBase {

	public function checkPasswordUser($PostEmail, $PostPassword) {

		// var_dump($_SESSION);

		$requete = $this->database->prepare("SELECT * FROM `user` WHERE `email` = :email AND `password` = :password");

		$requete->bindParam(":email", $PostEmail);
		$requete->bindParam(":password", $PostPassword);

		$requete->execute();

		$passwordOk = $requete->fetch(PDO::FETCH_ASSOC);

		return $passwordOk;
		// var_dump($userOk);

	}

	public function checkMailUser($PostEmail) {

		// var_dump($_SESSION);

		$requete = $this->database->prepare("SELECT * FROM `user` WHERE `email` = :email");

		$requete->bindParam(":email", $PostEmail);

		$requete->execute();

		$mailOk = $requete->fetch(PDO::FETCH_ASSOC);

		return $mailOk;
		// var_dump($userOk);

	}

	public function checkAdmin() {

		$requete = $this->database->prepare("SELECT * FROM `user` WHERE `acces` = :acces");

		$requete->bindParam(":acces", $Acces);

		$requete->execute();

		$adminOk = $requete->fetch(PDO::FETCH_ASSOC);

		return $adminOk;

	}

	public function getUserId($PostEmail) {

		$requete = $this->database->prepare("SELECT `id` FROM `user` WHERE `email`  = :email");

		$requete->bindParam(":email", $PostEmail);

		$requete->execute();

		$userId = $requete->fetch(PDO::FETCH_ASSOC);

		return $userId;

	}

}
