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

	public function checkAdmin($PostEmail) {

		// var_dump($_SESSION);

		$requete = $this->database->prepare("SELECT `acces` FROM `user` WHERE `email`  = :email");

		$requete->bindParam(":email", $PostEmail);

		$requete->execute();

		$adminOk = $requete->fetch(PDO::FETCH_NUM)[0];

		return $adminOk;

	}

	public function getUserId($PostEmail) {

		$requete = $this->database->prepare("SELECT `id` FROM `user` WHERE `email`  = :email");

		$requete->bindParam(":email", $PostEmail);

		$requete->execute();

		$userId = $requete->fetch(PDO::FETCH_ASSOC);

		return $userId;
		var_dump($userId);
		die;

	}

	public function getList() {

		$requete  = "SELECT * FROM user";
		$resultat = $this->database->query($requete);
		$listUser = $resultat->fetchAll(PDO::FETCH_ASSOC);

		return $listUser;

	}

	public function DeleteThisItem($itemId) {

		$requete = $this->database->prepare("DELETE FROM `user` WHERE `user`.`id` = :id ");
		$requete->bindParam(":id", $itemId);
		$requete->execute();
		var_dump($itemId);

	}

	public function modifItem($postName, $postEmail, $postPassword, $postAcces, $itemId) {

		$requete = $this->database->prepare("UPDATE `user` SET `name` = :name, `email` = :email, `password` = :password, `acces` = :acces WHERE `user`.`id` = :id");

		$requete->bindParam(":name", $postName);
		$requete->bindParam(":email", $postEmail);
		$requete->bindParam(":password", $postPassword);
		$requete->bindParam(":acces", $postAcces);
		$requete->bindParam(":id", $itemId);
		$requete->execute();

		$requete->fetch(PDO::FETCH_ASSOC);
		$modifOk = $requete;

		return $modifOk;

	}

	public function getUserInfo($id) {

		$requete = $this->database->prepare("SELECT * FROM `user` WHERE `id` = :id");

		$requete->bindParam(":id", $id);
		$requete->execute();

		$userInfo = $requete->fetch(PDO::FETCH_ASSOC);
		// var_dump($userInfo);

		return $userInfo;

	}

}

// 1
