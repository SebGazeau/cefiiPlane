<?php

include "Model/ModelBlackBox.php";
include "View/ViewBlackBox.php";

class ControllerBlackBox extends ControllerBase {
    public function __construct() {
        parent::__construct("BlackBox");
    }
    /**
     * To display the list of infos of the flight
     * @param empty
     * @return mixed
     */
    public function displayBlackBox() {
        if (isset($_SESSION['admin'])) {
            $infos = $this->model->getAll();
            $this->view->displayBlackBox($infos);
        } else {
        $this->view->displayBlackBoxError();
        }
    }
    public function displayFlight() {
        if (isset($_SESSION['id_flight'])) {
            $id_flight = $_SESSION['id_flight'];
            $flightInfos = $this->model->getDataFlight($id_flight);
            $this->view->displayFlight($flightInfos);
        } else {
            $this->view->displayBlackBoxError("flight");
        }
    }
    public function displayUser() {
        if (isset($_SESSION['id_user'])) {
            $id_user = $_SESSION['id_user'];
            $userInfos = $this->model->getDataUser($id_user);
            $this->view->displayUser($userInfos);
        } else {
            $this->view->displayBlackBoxError("user");
        }
    }
    // Renvoie les données nécessaires à l'affichage du graphique
    public function displayGraph() {
        if (isset($_POST["id_flight"]) && is_int($_POST["id_flight"] + 0) && isset($_POST["column"]) && ($_POST["column"] == "on_off" || $_POST["column"] == "speed" || $_POST["column"] == "take_off" || $_POST["column"] == "altitude" || $_POST["column"] == "fuel_level" || $_POST["column"] == "crash")) {
            $id_flight = $_POST["id_flight"];
            $column = $_POST["column"];

            $chart = $this -> model -> getDataChart($id_flight, $column);
            $this -> view -> displayDataGraph($chart);
        }
        else {
            $this->view->displayBlackBoxError();
        }
    }
    public function deleteData() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->deleteData($id);

        //Affichage des informations boites noires supprimées
            $infos = $this->model->getAll();
            $this->view->displayBlackBox($infos);
        } else {
            $this->view->displayBlackBoxError();
        }
    }
    public function displayFormBlackBox() {
        if ($_SESSION['admin']) {
            switch ($_GET['for']) {
                case "update":
                    $blackBox = $this->model->getData($_GET['id']);
                    $this->view->displayForm('updateData', $blackBox);
                    break;
                case "add":
                    $blackBox = array("","","","","","","","","","");
                    $this->view->displayForm('addData', $blackBox);
                    break;
                default:
                    displayBlackBoxError();
                    break;
            }
        } else {
            $this->view->displayBlackBoxError();
        }
    }
    public function updateData() {
        if (isset($_POST['id']) && is_numeric($_POST['id']) && (isset($_SESSION['admin'])) && $_SESSION['admin']) {
            $blackbox = $_POST;
            $this->model->updateData($blackbox);
            
            $infos = $this->model->getAll();
            $this->view->displayBlackBox($infos);
        } else {
            $this->view->displayBlackBoxError();
        }
    }
    public function addData() {
        if ((isset($_SESSION['admin'])) && $_SESSION['admin']) {
            $blackox = $_POST;
            $this->model->addData($blackBox);

            $infos = $this->model->getAll();
            $this->view->displayBlackBox($infos);
        } else {
            $this->view->displayBlackBoxError();
        }
    }
}
