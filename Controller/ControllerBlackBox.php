<?php

include "Model/ModelBlackBox.php";
include "View/ViewBlackBox.php";

class ControllerBlackBox extends ControllerBase
{
    public function __construct() {
        parent::__construct("BlackBox");
    }
}
