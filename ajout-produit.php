<?php include './session/protection.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<?php include 'header.php'; ?>
<title>Ajout produit</title>
</head>

<body>

    <?php include 'navbar.php'; ?>
    <?php
    include('./session/conexao.php');

    // preparation de la requete
    $requete = $conexion->prepare("SELECT * FROM Types");
    // execution de la requete
    $requete->execute();
    $listeTypes = $requete->fetchAll();

    if (isset($_POST["nom"])) {

        $requete = $conexion->prepare(
            'INSERT INTO produits ( nom, description, description_en, prix, url_img, type, userAdm) VALUES (?, ?, ?, ?, ?, ?, ?)'
        );


        $requete->execute([
            $_POST['nom'],
            $_POST['description'],
            $_POST['descriptionEn'],
            $_POST['prix'],
            $_POST['url_img'],
            $_POST['type'],
            $_SESSION['id']
        ]);
    };

    ?>
    <form method="POST" onsubmit="return valideFormulaire();" class="ajout-produit">
        <h1>Ajout produit </h1>
        <div class="form-group <?php if ($erreurNom) echo 'has-danger' ?>">
            <label class="col-form-label mt-4" for="inputNom">Nom</label>
            <input value="<?= $_POST['nom'] ?? '' ?>" name="nom" type="text" class="form-control <?php if ($erreurNom) echo 'is-invalid' ?>" placeholder="Nom du produit" id="inputNom">
            <div id="alertNom" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i> 20 caracter max</div>
        </div>

        <div class="form-group">
            <label for="inputDescription" class="form-label mt-4">Description</label>
            <textarea name="description" class="form-control" id="inputDescription" placeholder="description du produit" rows="3"></textarea>
            <div id="alertDescription" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i> 20 caracter min</div>
        </div>

        <div class="form-group">
            <label for="inputDescription" class="form-label mt-4">Description Anglis</label>
            <textarea name="descriptionEn" class="form-control" id="inputDescriptionEn" placeholder="description du produit" rows="3"></textarea>
            <div id="alertDescriptionEn" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i> 20 caracter min</div>
        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputPrix">Prix</label>
            <input name="prix" type="number" class="form-control" placeholder="prix du produit (ex: 5.99)" id="inputPrix">
            <div id="alertPrix" class="db-n invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputUrlImage">URL image</label>
            <input id="inputUrl" name="url_img" type="text" class="form-control" placeholder=" formatos disponiveis ....">
            <div id="alertUrl" class="db-n invalid-feedback"><i class="fa-solid fa-circle-exclamation"></i></div>
        </div>



        <div class="form-group ">
            <select name="type" class="select" name="type" id="">
                <option disabled selected value> -- select an option -- </option>
                <?php
                foreach ($listeTypes as $article) {
                ?>
                    <option> <?= $article["nom"] ?> </option>
                <?php
                };
                ?>
            </select>

        </div>
        <div class="form-group">
            <button class="">Ajouter l'article</button>
        </div>

    </form>
</body>

</html>