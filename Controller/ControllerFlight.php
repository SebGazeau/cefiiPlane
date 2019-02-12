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
    $user=GET_['id_user']
    $this->model->newFlight2($user);
    }

/* Envoi sur session*/
public function addSession() {
    $list=$this->model->addSession2($list);
}



}
