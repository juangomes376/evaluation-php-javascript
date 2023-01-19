<?php include '/assets/morso/header.php'; ?>
<?php include '/assets/morso/navbar.php'; ?>


<?php

$requete = $conexion->prepare('SELECT * FROM produits WHERE id = ? ;');

$requete->execute([$_GET['id']]);

$produit = $requete->fetch();

//si l'utilisateur a soumis le formulaire
if (isset($_POST['nom'])) {

    //on enregistre les modifications
    $requete = $conexion->prepare(
        "UPDATE produits 
         SET nom = ?, 
             description = ?,
             description_en = ?,
             prix = ?,
             url_img = ?
         WHERE id = ?"
    );

    $requete->execute([
        $_POST['nom'],
        $_POST['description'],
        $_POST['descriptionEn'],
        $_POST['prix'],
        $_POST['url_image'],
        $_GET['id'],
    ]);

    //Redirection vers la page d'accueil
    header('Location: /index.php');
}



?>

<form class="modi-produit" method="POST" class="container mb-4">
    <h1>Modifier produit</h1>
    <div class="form-group">
        <label class="c" for="inputNom">Nom</label>
        <input id="inputNom" name="nom" value="<?= $produit['nom'] ?>" type="text" class="form-control" placeholder="Nom du produit">
        <div id="alertNom" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i> 20 caracter max</div>
    </div>

    <div class="form-group">
        <label for="inputDescription" class="form-label mt-4">Description</label>
        <textarea id="inputDescription" name="description" class="form-control" id="inputDescription" rows="3"><?= $produit['description'] ?></textarea>
        <div id="alertDescription" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i> 20 caracter min</div>
    </div>

    <div class="form-group">
        <label for="inputDescriptionEn" class="form-label mt-4">Description anglais</label>
        <textarea id="inputDescriptionEn" name="descriptionEn" class="form-control" rows="3"><?= $produit['description_en'] ?></textarea>
        <div id="alertDescriptionEn" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i> 20 caracter min</div>
    </div>

    <div class="form-group">
        <label class="col-form-label mt-4" for="inputPrix">Prix</label>
        <input id="inputPrix" name="prix" value="<?= $produit['prix'] ?>" type="number" class="form-control" placeholder="Prix du produit (ex : 5.99)">
        <div id="alertPrix" class="db-n invalid-feedback"></div>
    </div>

    <div class="form-group">
        <label class="col-form-label mt-4" for="inputUrlImage">URL image</label>
        <input id="inputUrl name=" url_image" value="<?= $produit['url_img'] ?>" type="text" class="form-control" placeholder="URL de l'image (ex: http://mon-site.com/image.jpg)">
        <div id="alertUrl" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i></div>
    </div>

    <div class="form-group">
        <button class="">Modifier l'article</button>
    </div>

</form>
</body>

</html>