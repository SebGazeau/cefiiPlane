<?php

abstract class ControllerBase {
	protected $model;
	protected $view;
	protected $page;

	protected function __construct($name) {
		// Récupère le nom de l'enfant
		$this->page = $name;

		$nameModel   = "Model".$name;
		$this->model = new $nameModel();
		$nameView    = "View".$name;
		$this->view  = new $nameView();
	}

	public function display() {
		$this->view->displayPage($this->page);
	}
}
