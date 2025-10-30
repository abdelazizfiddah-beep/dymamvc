<?php


require_once '../config/database.php';
$database = new PDO('mysql:host=' . DB_HOST . ';
dbname=' . DB, DB_USER, DB_PASSWORD);

require_once '../app/controllers/ArticleController.php';
$controller = new ArticleController($database);

$controller->afficherFormulaire();
