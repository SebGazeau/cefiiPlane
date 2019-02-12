<?php

class ModelRegister extends ModelBase
{
public function verifEmail($email){
        $requete = $this-> databasse ->prepare("SELECT email FROM user WHERE email = :email");
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
    $requete = $this->databasse->prepare("INSERT INTO user (id, name, email,password) VALUES (NULL,:name,:email,:password)");
$requete->bindParam(':name',$info['name']);;
$requete->bindParam(':email',$info['email']);
$requete->bindParam(':password',$info['password']);
$result = $requete -> execute();
  }
public function getIdUser($email){
        $requete = $this -> databasse -> prepare('SELECT id FROM user WHERE email = :email');
        $requete->bindParam(':email',$email);
        $id = $requete -> fetchALL(PDO::FETCH_NUM);
        $id=$id[0][0];
        return $id;
    }
}
