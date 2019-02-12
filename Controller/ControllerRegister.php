<?php

include "Model/ModelRegister.php";
include "View/ViewRegister.php";

class ControllerRegister extends ControllerBase
{
    public function __construct() {
        parent::__construct("Register");
    }
    
    public function addUser(){
        $info = array (
        'name'=> $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']);
        $exist = $this -> model -> verifEmail($info['email']);
        if ($exist == 'oui'){
        /*le compte existe deja */
        }else{
        $this -> model -> addUser($info);
        }
    }

}
