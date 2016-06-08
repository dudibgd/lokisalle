<?php
$pdo = new PDO('mysql:host=localhost;dbname=lokisalle', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


//---- Constante

define("URL", "http://localhost/Lokisalle/lokisalle/"); 
define("RACINE", $_SERVER['DOCUMENT_ROOT'] . 'Lokisalle/lokisalle/');

// echo 'url : ' . URL . '<br>';
// echo 'racine : ' . RACINE . '<br>';

// var_dump($pdo);

//--------- VARIABLES
$content = '';

//---------- FONCTIONS
require_once('fonction.inc.php');