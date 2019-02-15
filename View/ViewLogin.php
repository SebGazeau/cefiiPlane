<?php

class ViewLogin extends ViewBase {
	public function __construct() {
		parent::__construct();

	}

	public function displayGame($idUser) {
		echo "<a href='index.php?controller=Login&action=logout'><button class='Login btn btn-danger' >Logout</button></a> <br>";
		echo "connected";
		// $this->pageHTML .= file_get_contents("View/html/GameMainPage.html");
		// $this->displayHTML();

	}

	public function erreur($message) {
		$message;
		$this->pageHTML .= $message;
		$this->displayHTML();

	}

	public function displayAdmin($listUser) {

		$this->pageHTML .= "
<a href='index.php?controller=Login&action=logout'><button class='Login btn btn-danger' >Logout</button></a>
 <br>

       <section class='row col-12'>



 <nav class='col-12 navbar navbar-expand-lg  sticky-top'>
        <ul class='list-inline col-12 row justify-content-between'>
            <li class='list-inline-item col'><a class='btn btn-primary btn-lg btn-block' href='index.php?controller=Home&action=displayWelcome'>UserList</a></li>

            <li class='list-inline-item col'><a class='btn btn-primary btn-lg btn-block' href=/index.php?controller=Page2&action=displayNewUser'>Flights</a></li>

            <li class='list-inline-item col'><a class='btn btn-primary btn-lg btn-block' href='index.php?controller=Page3&action=displayNewUser'>BlackBox</a></li>

			<li class='list-inline-item col'><a class='btn btn-primary btn-lg btn-block' href='index.php?controller=Page4&action=displayNewUser'>Score</a></li>



        </ul>
 </nav>
        </section>


		<table class='table'>
  <thead class='thead-dark'>
    <tr>
    <th scope='col'>id</th>
      <th scope='col'>Name</th>
      <th scope='col'>Email</th>
      <th scope='col'>Password</th>
       <th scope='col'>Access</th>
       <th scope='col'>Delete</th>
        <th scope='col'>Edit</th>
    </tr>
  </thead>";
		foreach ($listUser as $item) {
			$this->pageHTML .= "<tbody>";
			$this->pageHTML .= "<td>".$item['id']."</td>";
			$this->pageHTML .= "<td>".$item['name']."</td>";
			$this->pageHTML .= "<td>".$item['email']."</td>";
			$this->pageHTML .= "<td>".$item['password']." </td>";
			$this->pageHTML .= "<td>".$item['acces']."</td>";
			$this->pageHTML .= "<td><a  class='btn text-white bg-danger btn-sm' href='index.php?controller=Login&action=deleteUser&id=".$item['id']."'>Delete</a></td>";
			$this->pageHTML .= "<td><a  class='btn text-white bg-danger btn-sm' href='index.php?controller=Login&action=modifForm&id=".$item['id']."'>Modif</a></td>";

			$this->pageHTML .= "</tbody>";
		}

		$this->pageHTML .= "</table>";
		$this->pageHTML .= "</div>";

		$this->displayHTML();

	}

	public function displayModifFrom($userInfo, $id) {
		$this->pageHTML .= file_get_contents("View/html/modifAndAjoutFrom.html");
		$this->pageHTML = str_replace('{name}', $userInfo['name'], $this->pageHTML);
		$this->pageHTML = str_replace('{email}', $userInfo['email'], $this->pageHTML);
		$this->pageHTML = str_replace('{password}', $userInfo['password'], $this->pageHTML);
		$this->pageHTML = str_replace('{acces}', $userInfo['acces'], $this->pageHTML);
		$this->pageHTML = str_replace('{id}', $id, $this->pageHTML);
		$this->displayHTML();

	}

	public function GoBackToLoginPage() {
		echo "Your are logged out!";

		$this->pageHTML .= file_get_contents("View/ViewHome.php");
		$this->displayHTML();
	}

}
