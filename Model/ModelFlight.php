<?php

class ModelFlight extends ModelBase{

   
public function newFlight($user){
        
    $requete = $this->database->prepare ("INSERT INTO flight VALUES (NULL, :user)");
        
    $requete->bindParam(':user',$user);
    $resultat = $requete->execute();
    if($resultat){
        $id=$this->database->lastInsertId();
            
        $_SESSION['id_flight']=$id;
    }
        return $resultat;
}    

public function selectFlight($id_user){
    /* var_dump($id_user); */
    $requete = $this->database->prepare("SELECT * FROM flight WHERE id_user=:id_user");
    $requete->bindParam(':id_user',$id_user);    
    $requete->execute();
    $list=$requete->fetchAll(PDO::FETCH_NUM);    
       /*   var_dump($list);*/
        return $list;
        } 



public function supprFlight($id){
    $requete = $this->database->prepare("DELETE FROM flight WHERE id=:id");
    $requete->bindParam(':id',$id);    
    $resultat=$requete->execute();    
        return $resultat;
   
        
        

}



