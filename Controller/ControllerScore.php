<?php

include "Model/ModelScore.php";
include "View/ViewScore.php";

class ControllerScore extends ControllerBase
{
    public function __construct() {
        parent::__construct("Score");
    }

    // Insertion d'un nouveau score
    public function newScore() {

        if (isset($_POST["idUser"]) && is_int($_POST["idUser"]) && isset($_POST["flightTime"]) && is_numeric($_POST["flightTime"]) && isset($_POST["distance"]) && is_numeric($_POST["distance"])) {
            $idUser = $_POST["idUser"];
            $flightTime = $_POST["flightTime"];
            $distance = $_POST["distance"];
            $score = $flightTime + $distance;

            $result = $this -> model -> insertScore($idUser, $flightTime, $distance, $score);

            if (!$result) {
                $this -> view -> displayAddError();
            }
        }
        else {
            $this -> view -> displayAddError();
        }
    }

    // Affichage du tableau des scores
    public function leaderboard() {

        if (isset($_POST["scoreNumber"]) && is_int($_POST["scoreNumber"])) {
            $scoreNumber = ($_POST["scoreNumber"]);
        }
        else {
            $scoreNumber = 10;
        }

        $scores = $this -> model -> bestScores($scoreNumber);
        $this -> view -> displayLeaderboard($scores);
    }

    // Affichage du meilleur score du joueur
    public function bestPersonalScore() {

        if (isset($_POST["idUser"]) && is_int($_POST["idUser"])) {
            $score = $this -> model -> bestPersonalScore($id_user);
            $this -> view -> displayPersonalScore($score);
        }
    }
}
