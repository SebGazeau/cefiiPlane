<?php

class ViewScore extends ViewBase
{
    public function __construct() {
        parent::__construct();
    }

    // Affichage de l'erreur lors de l'ajout
    public function displayAddError() {
        $this -> pageHTML .= file_get_contents("View/html/scoreAddError.html");
        $this -> displayHTML();
    }

    // Affichage du tableau des scores
    public function displayLeaderboard($scores) {
        $tr = "";
        $ranking = 1;

        foreach($scores as $score) {
            $tr .= "<tr>";
            $tr .= "<td>$ranking</td>";
            $ranking++;

            for($i = 0; $i <= 3; $i++) {
                $tr .= "<td>$score[$i]</td>";
            }

            $tr .= "</tr>";
        }

        echo $tr;
    }

    // Affichage du meilleur score personnel
    public function displayPersonalScore($score) {
        echo "<tr><td>$score[0]</td><td>$score[1]</td><td>$score[2]</td>";
    }
}
