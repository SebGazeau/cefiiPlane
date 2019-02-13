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
        $id_flight = $_GET['id_flight'];
        $infos = $this->model->getData($id_flight);
        $this->view->displayBlackBox($infos);
    }
    public function deleteData() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            //$id_flight = $_SESSION['id_flight'];
            $this->model->deleteData($id_flight);
        //Affichage de la liste actualisée
            $infos = $this->model->getData($id_flight);
            $this->view->displayBlackBox($infos);
        } else {
            $this->view->displayBlackBoxError();
        }
    }
    public function displayFormBlackBox() {
     /*   if ($_SESSION['admin']) { */
            switch ($_GET['for']) {
                case "update":
                    $blackBox = $this->model->getData($_GET['id']);
                    $this->view->displayForm('updateData', $blackBox);
                    break;
                case "add":
                    $blackBox = array(array("","","","","","","","","",""));
                    $this->view->displayForm('addData', $blackBox);
                    break;
                default:
                    displayBlackBoxError();
                    break;
            }
    //    } else {
            //$this->view->displayBlackBoxError();
    //    }
    }
    public function updateData() {
        if (isset($_GET['id']) && is_numeric($_GET['id']) /*&& (isset($_SESSION['admin'])) && $_SESSION['admin']*/) {
            //$id_flight = $_SESSION['id_flight'];
            $black_box = $_POST;
            $this->model->updateData($id, $blackBox);
        } else {
            $this->view->displayBlackBoxError();
        }
    }
    public function addData() {
        if (isset($_GET['id']) && is_numeric($_GET['id']) /*&& (isset($_SESSION['admin'])) && $_SESSION['admin']*/) {
            //$id_flight = $_SESSION['id_flight'];
            $black_box = $_POST;
            $this->model->addData($blackBox);
        } else {
            $this->view->displayBlackBoxError();
        }
    }
}
