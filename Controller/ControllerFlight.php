<?php

include "Model/ModelFlight.php";
include "View/ViewFlight.php";

class ControllerFlight extends ControllerBase {
        public function __construct() {
        parent::__construct("Flight");
    }

/* Création d'un vol et retourne une $_SESSION*/
public function newFlight() {
    var_dump($_SESSION['id_user']);
    if(isset($_SESSION['id_user']) && is_int($_SESSION['id_user'])){
        $user=$_SESSION['id_user'];
                
        $this->model->newFlight($user);
           
    }else{
        $this->view->displayErreur();
         }
    }

/* sélection des vols d'un utilisateur*/    

public function selectFlight(){
    $id_user=$_SESSION['id_user'];
   /*  var_dump($id_user); */

    $list=$this->model->selectFlight($id_user);
    $this->view->selectFlight($list);
    
}

public function ajaxFlight(){
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