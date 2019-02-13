<?php
class ViewBlackBox extends ViewBase {
    public function __construct() {
        parent::__construct();
    }
    public function displayBlackBox($infos) {
        $this->pageHTML .= "<h1>Informations de votre vol</h1>";
        $this->pageHTML .= "<table>";
/*
    //Pour après test du CRUD
        if (!$_SESSION['admin']) {
            $infos[0] = "";
            $infos[8] = "";
            $infos[9] = "";
        }
*/
        foreach ($infos as $listes) {
            $this->pageHTML .= "<tr>";
            for($i = 0; $i <= 9; $i++) {
                $this->pageHTML .= "<td>$listes[$i]</td>";
            }
            $this->pageHTML .= "<td><a href='index.php?controller=blackBox&action=deleteData&id=".$listes[9] ."'>Supp</a></td>";
            $this->pageHTML .= "<td><a href='index.php?controller=blackBox&action=displayFormBlackBox&for=update&id=".$listes[9]."'>Modif</a></td>";
			$this->pageHTML .= "</tr>";
        }
        $this->pageHTML .= "<td><a href='index.php?controller=blackBox&action=displayFormBlackBox&for=add'>Ajout</a></td>";
        $this->pageHTML .= "</table>";
        $this->displayHTML();
    }
    public function displayBlackBoxError() {
        $this->pageHTML .= "<p>Erreur de connexion.</p>";
        $this->pageHTML .= file_get_contents("View/html/home.html");
        $this->displayHTML();
    }
    public function displayForm($action,$blackBox) {
        $this->pageHTML .= file_get_contents("View/html/contact.html");
        $this->pageHTML = str_replace('{action}', $action, $this->pageHTML);
        $this->pageHTML = str_replace('{id}', $blackBox[0][0], $this->pageHTML);
        $this->pageHTML = str_replace('{time}', $blackBox[0][1], $this->pageHTML);
        $this->pageHTML = str_replace('{on_off}', $blackBox[0][2], $this->pageHTML);
        $this->pageHTML = str_replace('{speed}', $blackBox[0][3], $this->pageHTML);
        $this->pageHTML = str_replace('{take_off}', $blackBox[0][4], $this->pageHTML);
        $this->pageHTML = str_replace('{altitude}', $blackBox[0][5], $this->pageHTML);
        $this->pageHTML = str_replace('{fuel_level}', $blackBox[0][6], $this->pageHTML);
        $this->pageHTML = str_replace('{crash}', $blackBox[0][7], $this->pageHTML);
        $this->pageHTML = str_replace('{id_user}', $blackBox[0][8], $this->pageHTML);
        $this->pageHTML = str_replace('{id_flight}', $blackBox[0][9], $this->pageHTML);
        $this->displayHTML();
    }
}
