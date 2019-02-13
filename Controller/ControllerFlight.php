<?php

include "Model/ModelFlight.php";
include "View/ViewFlight.php";

class ControllerHome extends ControllerBase
{
    public function __construct() {
        parent::__construct("Flight");
    }

/* Création d'un vol*/
public function newFlight() {
    var_dump($_SESSION);
    if(isset($_SESSION['id_user'])&&(is_int($_SESSION['id_user'])){
        $user=$_SESSION['id_user'];
        if($this->model->newFlight2($user)){
            $this->model->recordFlight();
        }
    }else{
        $this->view displayErreur();
    }
}

/* Envoi sur session*/
public function addSession() {
    $list=$this->model->addSession2($list);
}



}
