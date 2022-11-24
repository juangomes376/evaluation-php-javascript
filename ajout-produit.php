<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
<?php
            $conexion = new PDO(
                "mysql:host=localhost;dbname=loja;charset=utf8",
                'root',
                ''
            );
            // preparation de la requete
            $requete = $conexion->prepare("SELECT * FROM Types");
            // execution de la requete
            $requete->execute();
            $listeTypes = $requete->fetchAll();

            if(isset($_POST["nom"])){

                $requete = $conexion->prepare(
                'INSERT INTO produits ( nom, decription, prix, url_img, type) VALUES (?, ?, ?, ?,?)'
                );
            

                $requete->execute([
                    $_POST['nom'], 
                    $_POST['description'], 
                    $_POST['prix'], 
                    $_POST['url_img'],
                    $_POST['type'] 
                ]);

            };

?>
<form method= "POST" onsubmit="return valideFormulaire();" class="container mb-4" >

    <div  class="form-group <?php  if($erreurNom) echo 'has-danger'?>">
        <label class="col-form-label mt-4" for="inputNom">Nom</label>
        <input value="<?= $_POST['nom'] ?? '' ?>" name="nom" type="text" class="form-control <?php  if($erreurNom) echo 'is-invalid'?>" placeholder="Nom du produit" id="inputNom">
        <div  class="invalid-feedback"><?= $messageErrorNom?></div>
    </div>

    <div  class="form-group">
      <label for="inputDescription" class="form-label mt-4">Description</label>
      <textarea name="description" class="form-control" id="inputDescription" placeholder="description du produit" rows="3"></textarea>
      <div class="invalid-feedback"> 20 caracter min</div>
    </div>

    <div  class="form-group">
        <label class="col-form-label mt-4" for="inputPrix">Prix</label>
        <input name="prix" type="number" class="form-control" placeholder="prix du produit (ex: 5.99)" id="inputPrix">
        <div class="invalid-feedback"> gratuit se pas possible</div>
    </div>

    <div  class="form-group">
        <label class="col-form-label mt-4" for="inputUrlImage">URL image</label>
        <input name="url_img" type="text" class="form-control" placeholder="htpps://mon-site/image.jpg" id="inputUrlImage">
        <div class="invalid-feedback"></div>    
    </div>



    <div class="form-group mt-4">
        <select name="type"class="selectInput btn btn-primary" name="type" id="">
            <option disabled selected value> -- select an option -- </option>
            <?php
            foreach($listeTypes as $article) {
            ?>
                <option > <?= $article["nom"] ?> </option> 
            <?php
            };
            ?>
    </select>

    </div>
    

    <button  class="btn btn-primary mt-4">Ajouter l'article</button>

</form>
</body>
</html>