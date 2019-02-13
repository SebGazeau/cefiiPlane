<?php

class ViewFlight extends ViewBase
{
    public function __construct() {
        parent::__construct();
    }

    public function displayErreur(){
        $this->pageHTML .="<p> une erreur est survenue </p>";
        $this -> displayHTML();
    }

    











}
