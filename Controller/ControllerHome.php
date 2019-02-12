<?php

include "Model/ModelHome.php";
include "View/ViewHome.php";

class ControllerHome extends ControllerBase
{
    public function __construct() {
        parent::__construct("Home");
    }
}
