<?php

class ModelFlight extends ModelBase
{

   
public function newFlight2($user)(){
        $requete = $connexion->prepare ("INSERT INTO flight VALUES (NULL, :user)");

        $result = $this->connexion->query($requete);
        $list=$result->fetchall(PDO::FETCH_NUM);    
       

        $requete->bindParam(':user',$user);
                    
        $resultat = $requete->execute();
        return $resultat;
    }    

public function recordFlight(){
         $requete = $connexion->prepare ("SELECT MAX(id) FROM flight WHERE id_user=:id");

         $requete->bindParam(':id',$_SESSION['id_user']);
}




}
