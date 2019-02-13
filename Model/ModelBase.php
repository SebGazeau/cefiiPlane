<?php

abstract class ModelBase {
	protected $database;

	const SERVER   = "localhost";
	const USER     = "root";
	const PASSWORD = "";
	const BASE     = "cefiiPlane";

	public function __construct() {
		try {
			$this->database = new PDO("mysql:host=".self::SERVER."; dbname=".self::BASE, self::USER, self::PASSWORD);

			$this->database->exec('SET CHARACTER SET utf8');
		} catch (exception $e) {
			echo "Erreur lors de la connexion".$e->getMessage();
		}
	}
}
