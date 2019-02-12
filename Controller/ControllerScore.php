<?php

include "Model/ModelScore.php";
include "View/ViewScore.php";

class ControllerScore extends ControllerBase
{
    public function __construct() {
        parent::__construct("Score");
    }
}
