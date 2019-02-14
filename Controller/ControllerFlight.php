<?php

include "Model/ModelFlight.php";
include "View/ViewFlight.php";

class ControllerFlight extends ControllerBase {
        public function __construct() {
        parent::__construct("Flight");
    }

/* Création d'un vol et retourne une $_SESSION*/
public function newFlight() {
    $_SESSION['id_user']=3; 
    if(isset($_SESSION['id_user'])&&(is_int($_SESSION['id_user']))){
        $user=$_SESSION['id_user'];
                
        $this->model->newFlight($user);
           
    }else{
        $this->view->displayErreur();
         }
    }

/* sélection des vols d'un utilisateur*/    

public function selectFlight(){
    $_SESSION['id_user']=3;
    $_SESSION['admin']=1;

 

    $id_user=$_SESSION['id_user'];
   /*  var_dump($id_user); */

    $list=$this->model->selectFlight($id_user);
    $this->view->selectFlight($list);
    
}

public function ajaxFlight(){
    $_SESSION['id_user']=3;
    $_SESSION['admin']=1;
    $_SESSION['id_flight']=40;
 
    $id_user=$_SESSION['id_user'];
   /*  var_dump($id_user); */

    $list=$this->model->selectFlight($id_user);
    $this->view->ajaxFlight($list);
}


public function supprFlight(){
    $id=$_GET['id'];
    var_dump($id);
    $this->model->supprFlight($id);
    $this->selectFlight();
        



}

}