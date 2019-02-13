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

        if (isset($_POST["id_user"]) && is_int($_POST["id_user"] + 0) && isset($_POST["time"]) && is_numeric($_POST["time"]) && isset($_POST["distance"]) && is_numeric($_POST["distance"])) {
            $id_user = $_POST["id_user"];
            $time = $_POST["time"];
            $distance = $_POST["distance"];
            $score = $time + $distance;

            $result = $this -> model -> insertScore($id_user, $time, $distance, $score);

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

        if (isset($_POST["score_number"]) && is_int($_POST["score_number"])) {
            $score_number = ($_POST["score_number"]);
        }
        else {
            $score_number = 10;
        }

        $scores = $this -> model -> bestScores($score_number);
        $this -> view -> displayLeaderboard($scores);
    }

    // Affichage du meilleur score du joueur
    public function bestPersonalScore() {

        if (isset($_POST["id_user"]) && is_int($_POST["id_user"])) {
            $score = $this -> model -> bestPersonalScore($id_user);
            $this -> view -> displayPersonalScore($score);
        }
    }
}
