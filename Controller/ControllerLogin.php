<?php

include "Model/ModelLogin.php";
include "View/ViewLogin.php";

class ControllerLogin extends ControllerBase
{
    public function __construct() {
        parent::__construct("Login");
    }
}
