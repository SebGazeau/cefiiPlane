<?php

class ModelFlight extends ModelBase
{

   
public function newFlight2($user)(){
        $requete = "SELECT flight.id_user FROM flight JOIN user ON flight.id_user=user.id ";
        $result = $this->connexion->query($requete);
        $list=$result->fetchall(PDO::FETCH_NUM);    
        return $list;
    }    

        
public function addSession2(){
        
}





}
