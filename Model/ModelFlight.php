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

}
