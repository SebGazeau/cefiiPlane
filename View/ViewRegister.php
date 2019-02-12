<?php

class ViewRegister extends ViewBase
{
    public function __construct() {
        parent::__construct();
    }
    
    public function addUserError(){
        echo "Un compte est deja lié à cet email";
    }
}
