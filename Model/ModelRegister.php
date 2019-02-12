<?php

class ModelRegister extends ModelBase
{
public function verifEmail($email){

        $requete = $this-> database ->prepare("SELECT email FROM user WHERE email = :email");

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

    $requete = $this->database->prepare("INSERT INTO user (id, name, email,password,access) VALUES (NULL,:name,:email,:password,0)");


$requete->bindParam(':name',$info['name']);
$requete->bindParam(':email',$info['email']);
$requete->bindParam(':password',$info['password']);
$result = $requete -> execute();
    var_dump($result);
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
