
<?php

abstract class ViewBase
{
    protected $pageHTML;

    protected function __construct() {
        $this -> pageHTML = file_get_contents("View/html/header.html");
        $this -> pageHTML .= file_get_contents("View/html/nav.html");
    }

    public function displayPage($page) {
        $this -> pageHTML .= file_get_contents("View/cefiiPlane-front/" . lcfirst($page) . ".html");
        $this -> displayHTML();
    }

    protected function displayHTML() {
        $this -> pageHTML .= file_get_contents("View/html/footer.html");
        echo $this -> pageHTML;
    }
}

