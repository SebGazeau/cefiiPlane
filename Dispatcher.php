<?php

include "Model/ModelBase.php";
include "View/ViewBase.php";
include "Controller/ControllerBase.php";
include "Controller/ControllerHome.php";
include "Controller/ControllerBlackBox.php";
include "Controller/ControllerLogin.php";
include "Controller/ControllerRegister.php";
include "Controller/ControllerScore.php";


class Dispatcher
{
    public function dispatch() {
        if (isset($_GET["controller"])) {
            $controller = $_GET["controller"];
        }
        else {
            $controller = "home";
        }

        $myController = "Controller" . ucfirst($controller);

        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        }
        else {
            $action = "display";
        }

        $myController = new $myController();
        $myController -> $action();
    }
}
