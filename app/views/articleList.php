<?php include __DIR__ . '/includes/header.inc.php'; ?>
<main>
    <h1>Liste des Articles</h1>
    <a class="btn btn-primary mb-4" href="/formulaire.php">Publier nouvel article</a>
    <ul>
        <?php foreach ($articles as $article): ?>

            <?php
            if ($article['photo_intro'] != NULL) {
            ?>
                <img src="<?= $article['photo_intro'] ?>" class="img-fluid" />
            <?php
            }
            ?>

            <li>
                <?= htmlspecialchars($article['titre']); ?>
                <p><?= htmlspecialchars($article['contenu']); ?></p>
                <a class="btn btn-danger btn-sm" href="/delete?id_article=<?= $article['id'] ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="POST" action="/add" class="mt-5">
        <input type="text" name="articleTitre" class="form-control mb-2" placeholder="Titre du nouvel article" />
        <textarea name="articleContenu" class="form-control mb-2" placeholder="Contenu du nouvel article"></textarea>
        <button type="submit" class="btn btn-success">Envoyer</button>
    </form>
</main>
<?php include __DIR__ . '/includes/footer.inc.php'; ?>