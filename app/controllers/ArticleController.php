<?php

require_once '../app/models/Article.php';

class ArticleController
{
    private $articleModel;

    public function __construct($database)
    {
        $this->articleModel = new Article();
        $this->articleModel->setDb($database);
    }
    public function afficherIndex()
    {
        $articles = $this->articleModel->getAllArticles();
        require '../app/views/articleList.php';
    }

    public function addArticle($articleTitre, $articleContenu, $articlePhotoIntro)
    {
        //On verifie si le fichier uploadé est bien une image
        //En testant sison type MINE commence par "image/"
        if (substr($articlePhotoIntro['type'], 0, 6) == "image/") {
            // Cas où l'on a bien uplaoder une image

            //on copie le fichier depuis la memoire du serveur
            //vers un deplacement physique
            move_uploaded_file($articlePhotoIntro['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/images/" . $articlePhotoIntro['name']);
            $cheminDefinitif = "/images/" . $articlePhotoIntro['name'];
        } else {
            //Cas o|u l'on a uploadé autre chose qu'une image, ou alors rien du tout
            //ou alors rien du tout donc on laisse le chemin NULL

            $cheminDefinitif = NULL;
        }

        $this->articleModel->requeteInsertArticle($articleTitre, $articleContenu, $cheminDefinitif);
        header('Location: /');
        exit();
    }

    public function deleteArticle($article)
    {
        $this->articleModel->requeteSupprimerArticle($article);
        header('Location: /');
        exit();
    }
    public function afficherFormulaire()
    {
        require '../app/views/articleForm.php';
    }
}
