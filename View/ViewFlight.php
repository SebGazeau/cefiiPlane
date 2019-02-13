<?php

class ViewFlight extends ViewBase{

    public function __construct() {
        parent::__construct();
    }

    public function displayErreur(){
        $this->pageHTML .="<p> une erreur est survenue </p>";
        $this -> displayHTML();
    }



    public function selectFlight($list){
        /*     var_dump($list); */
       /*  $this->pageHTML .= "<h1> la liste de vos parties</h1>".$list[1]; */   
        $this->pageHTML .= "<table border=1>";
        $this->pageHTML .= "<tr><th>id partie</th></tr>";
        $this->pageHTML .= "<tr></tr>";
   
        foreach ($list as $fly){
            $this->pageHTML .="<tr>";
            $this->pageHTML .="<td>".$fly[0]. "</td>";
            $this->pageHTML .="<td><a href='index.php?controller=Flight&action=supprFlight&id=".$fly[0]."'>Supprimer</a></td>";
            
            $this->pageHTML .="</tr>";
        }
        
        $this->pageHTML .= "</table>";
        $this -> displayHTML();
        }

} 
       












