<?php
require_once __DIR__ . '/../config/database.php';           // ligne 2 : inclusion de la config DB

require_once __DIR__ . '/../app/controllers/ArticleController.php';  // ligne 5 : inclusion du contrôleur

$database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB, DB_USER, DB_PASSWORD);

$controller = new ArticleController($database);
$request_uri = explode("?", $_SERVER['REQUEST_URI']);
switch ($request_uri[0]) {
    case "/delete":
        $controller->deleteArticle($_GET['id_article']);
        break;
    case "/add":
        $controller->addArticle($_POST['articleTitre'], $_POST['articleContenu'], $_FILES['photo_intro']);
        break;
    case "/formulaire.php":
        $controller->afficherFormulaire();
        break;
    default:
        $controller->afficherIndex();
        break;
}
