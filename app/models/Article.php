
<?php
class Article
{
    protected $db;

    public function __construct() {}


    public function setDb($value)
    {
        $this->db = $value;
    }

    public function getAllArticles()
    {
        $stmt = $this->db->prepare("SELECT *
        FROM article ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function requeteInsertArticle($articleTitre, $articleContenu, $articlePhotoIntro)
    {
        $stmt = $this->db->prepare("INSERT INTO article
        (titre, contenu, photo_intro) VALUES (:titre, :contenu, :photo_intro)");
        $stmt->bindParam(':titre', $articleTitre);
        $stmt->bindParam(':contenu', $articleContenu);
        $stmt->bindParam(':photo_intro', $articlePhotoIntro);
        $stmt->execute();
    }

    public function requeteSupprimerArticle($articleId)
    {
        $stmt = $this->db->prepare("DELETE FROM article
        WHERE id = :id");
        $stmt->bindParam(':id', $articleId);
        $stmt->execute();
    }
}
