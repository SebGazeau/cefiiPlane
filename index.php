<?php
session_start();
include "Dispatcher.php";
var_dump($_SESSION);

$dispatcher = new Dispatcher();
$dispatcher -> dispatch();
