<?php
class ViewBlackBox extends ViewBase {
    public function __construct() {
        parent::__construct();
    }
    public function displayBlackBox($infos) {
        foreach ($infos as $displayAll) {
            $insideTBody = "<tr>";
            for ($i=0; $i <= 9 ; $i++) { 
                $insideTBody .= "<td></td>";
                $insideTBody .= "<td><a href='index.php?controller=blackBox&action=deleteData&id=". $displayAll[0] . "'>Supp</a></td>";
                $insideTBody .= "<td><a href='index.php?controller=blackBox&action=updateData&id=". $displayAll[0] . "'>Modif</a></td>";
            }
            $insideTBody .= "</tr>";
        }
        echo $insideTBody;
    }
    public function displayFlight($flightInfos) {
        foreach ($flightInfos as $infos) {
            $insideTBody = "<tr>";
            for($i = 0; $i <=9; $i++) {
                $insideTBody .= "<td>$infos[$i]</td>";
            }
            $insideTBody .= "</tr>";
        }
        echo $insideTBody;
    }
    public function displayUser($userInfos) {
        foreach ($userInfos as $infos) {
            $insideTBody .= "<tr>";
            for($i = 0; $i <=9; $i++) {
                $insideTBody .= "<td>$infos[$i]</td>";
            }
            $insideTBody .= "</tr>";
        }
        echo $insideTBody;
    }
    // Encode les données pour le graphique
    public function displayDataGraph($chart) {
        echo json_encode($chart);
    }
    public function displayBlackBoxError() {
        $this->pageHTML .= "<p>Erreur de connexion.</p>";
        $this->pageHTML .= file_get_contents("View/html/home.html");
        $this->displayHTML();
    }
    public function displayForm($action,$blackBox) {
        $this->pageHTML .= file_get_contents("View/html/contact.html");
        $this->pageHTML = str_replace('{action}', $action, $this->pageHTML);
        $this->pageHTML = str_replace('{id}', $blackBox[0], $this->pageHTML);
        $this->pageHTML = str_replace('{time}', $blackBox[1], $this->pageHTML);
        $this->pageHTML = str_replace('{on_off}', $blackBox[2], $this->pageHTML);
        $this->pageHTML = str_replace('{speed}', $blackBox[3], $this->pageHTML);
        $this->pageHTML = str_replace('{take_off}', $blackBox[4], $this->pageHTML);
        $this->pageHTML = str_replace('{altitude}', $blackBox[5], $this->pageHTML);
        $this->pageHTML = str_replace('{fuel_level}', $blackBox[6], $this->pageHTML);
        $this->pageHTML = str_replace('{crash}', $blackBox[7], $this->pageHTML);
        $this->pageHTML = str_replace('{id_user}', $blackBox[8], $this->pageHTML);
        $this->pageHTML = str_replace('{id_flight}', $blackBox[9], $this->pageHTML);
        $this->displayHTML();
    }
}
