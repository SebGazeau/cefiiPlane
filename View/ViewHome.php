<?php

class ViewHome extends ViewBase
{
    public function __construct() {
        parent::__construct();
    }


public function displayForm(){
    echo '
   <form action="index.php?controller=Register&action=addUser" method="post">
    <ul>
        <li>
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="name">
        </li>
         <li>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </li>
          <li>
            <label for="mdp">Mdp:</label>
            <input type="password" id="mdp" name="password">
        </li>
    </ul>
    <input type="submit" value="Envoyer">
    </form>

    ';
}
}