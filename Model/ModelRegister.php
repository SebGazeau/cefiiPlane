<?php

class ModelRegister extends ModelBase
{
public function verifEmail($email){
        $requete = $this->database->prepare("SELECT email FROM user WHERE email = :email");
		$requete->bindParam(':email',$email);
		$result = $requete -> execute();
        $email = $requete -> fetchALL(PDO::FETCH_NUM);
		if ($email==NULL){
			$exist='non';
		}else{
		$exist='oui';
		}
		return $exist;
    }  
public function addUser($info){
    $requete = $this->database->prepare("INSERT INTO user (id, nom, email,password) VALUES (NULL,:nom,:email,:password)");
$requete->bindParam(':nom',$info['nom']);;
$requete->bindParam(':email',$info['email']);
$requete->bindParam(':password',$info['password']);
$result = $requete -> execute();
  }
public function getIdUser($email){
        $requete = $this -> database -> prepare('SELECT id FROM user WHERE email = :email');
        $requete->bindParam(':email',$email);
        $id = $requete -> fetchALL(PDO::FETCH_NUM);
    var_dump($id);die;
        $id=$id[0][0];
        return $id;
    }
}
