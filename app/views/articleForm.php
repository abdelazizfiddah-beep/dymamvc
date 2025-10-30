<?php include __DIR__ . '/includes/header.inc.php'; ?>
<main>
    <div class="container mt-5">
        <h1>Publier un nouvel article</h1>
        <form method="POST" action="/add" enctype="multipart/form-data">
            <label for="articleTitre" class="form-label">Titre de l'article</label>
            <input type="text" name="articleTitre" id="articleTitre" class="form-control mb-3" required />

            <label for="articleContenu" class="form-label">Contenu de l'article</label>
            <textarea name="articleContenu" id="articleContenu" class="form-control mb-3" required></textarea>
            <input type="file" id="photo_intro" name="photo_intro" class="d-none" />
            <label for="photo_intro" class="btn btn-outline-info">Photo d'intro</label>
            <div class="thumbnail">
                <img src="" class="img-fluid" />
            </div>
            <div id="img-name"></div>


            <div class="d-flex justify-content-end gap-2">
                <a class="btn btn-outline-secondary" href="/">Retour</a>
                <button type="submit" class="btn btn-outline-primary">Publier</button>
            </div>
        </form>
    </div>
</main>


<?php include __DIR__ . '/includes/footer.inc.php'; ?>
<script>
    $(function() {
        $('#photo_intro').on('change', function() {
            console.log(this.files);
            if (this.files && this.files[0]) {
                //ici, on sait que l'on a un fichier
                var lecteur = new FileReader();
                //on prepare un evenement sur notre lecteur
                //pour lui dire de changer l'attribut src de notre page
                lecteur.onload = function(event) {
                    $('.thumbnail img').attr('src', event.target.result);
                };
                //puis enfin on se declenche notre evenement
                lecteur.readAsDataURL(this.files[0]);


                var filename = this.files[0].name;

                if (filename.length > 10) {
                    var extension = filename.split('.').pop();
                    var nomSeul = filename.split('.').slice(0, -1).join('.');
                    var nomAAfficher = nomSeul.substring(0, 10) + "..." + extension;
                } else {
                    var nomAAfficher = filename;
                }
                $('#img-name').html(nomAAfficher);
            }
        });
    });
</script>
<style>
    :root {
        --couleur-primaire: #92d789
    }

    .thumbnail img {
        max-width: 150px;
        margin: 10px;
    }

    button {
        background-color: var(--couleur-primaire) !important;
    }
</style>