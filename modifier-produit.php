<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <?php include './session/protection.php'; ?>
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php include 'conexao.php'; ?>
    <?php 
    

    if(isset($_POST["nom"])){

        $requete = $connexion->prepare("UPDATE produits 
        SET nom = ?,
            description = ?, 
            prix = ?, 
            url_image = ?
         WHERE id = ?");

        $requete->execute([
            $_POST['nom'], 
            $_POST['description'], 
            $_POST['prix'], 
            $_POST['url_image'], 
            $_GET['id'],
        ]);
        
        header("Location: index.php");
    
    };


    $requete = $connexion->prepare('SELECT * FROM produits WHERE id = ?');

    $requete->execute([$_GET['id']]);

    $produit = $requete->fetch();
    
    echo '<pre>';
    var_dump($produit);
    echo '</pre>';


    ?>
    
    <form method="POST"  class="container mb-4">
        <div class="form-group">
            <label class="col-form-label mt-4" for="inputNom">Nom</label>
            <input value="<?= $produit["nom"] ?>" name="nom" type="text" class="form-control" placeholder="Nom du produit" id="inputNom">
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label for="inputDescription" class="form-label mt-4">Description</label>
            <textarea  name="description" class="form-control" id="inputDescription" rows="3">  <?= $produit["description"] ?>  </textarea>
            <div class="invalid-feedback">20 caractères minimum</div>
        </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputPrix">Prix</label>
            <input value="<?= $produit["prix"] ?>" name="prix" type="number" class="form-control" placeholder="Prix du produit (ex : 5.99)" id="inputPrix">
            <div class="invalid-feedback">Le prix doit être positif</div>
       </div>

        <div class="form-group">
            <label class="col-form-label mt-4" for="inputUrlImage">URL image</label>
            <input value=" <?= $produit["url_image"] ?> " name="url_image" type="text" class="form-control" placeholder="URL de l'image (ex: http://mon-site.com/image.jpg)" id="inputUrlImage">
            <div class="invalid-feedback"></div>
        </div>

        <input type="submit" value="Modifier l'article" class="btn btn-primary mt-4">

    </form>
</body>
</html>