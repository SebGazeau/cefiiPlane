<?php

include "Model/ModelFlight.php";
include "View/ViewFlight.php";

class ControllerFlight extends ControllerBase {
        public function __construct() {
        parent::__construct("Flight");
    }

/* Création d'un vol et retourne une $_SESSION*/
public function newFlight() {
     
    if(isset($_SESSION['id_user'])&&(is_int($_SESSION['id_user']))){
        $user=$_SESSION['id_user'];
                
        $this->model->newFlight($user);
           
    }else{
        $this->view->displayErreur();
         }
    }
   
}