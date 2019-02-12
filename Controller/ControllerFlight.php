<?php

include "Model/ModelFlight.php";
include "View/ViewFlight.php";

class ControllerHome extends ControllerBase
{
    public function __construct() {
        parent::__construct("Flight");
    }
}
