<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/image/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/resultat.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
    <title>resultat</title>
</head>
<body>

<?php

$conexion = new PDO(
    "mysql:host=localhost;dbname=loja;charset=utf8",
    'root',
    ''
);


$requete = $conexion->prepare("SELECT * FROM produits WHERE nom LIKE ? AND type = ?;");
$requete->execute(['%'.$_POST['search'].'%', $_POST['type']]);
$searchProduit = $requete->fetchALL();
?>
    <?php include 'navbar.php'; ?>
<div class="resultat" >
    <?php
    foreach($searchProduit as $article) {
                ?>   
                <div class=" col-3 produit me-4 mt-4 d-flex">  
                    <div class="card mb-4  " >
                        <h3 class="card-header"><?php  echo $article["nom"]; ?></h3>
                        <div class="card-body">
                            <h5 class="card-title"> <?php  echo $article["prix"]; ?> $</h5>
                        </div>
                        <img src="<?php  echo $article["url_img"]; ?>" alt=""  >
                        <div class="card-body">
                            <p class="card-text"> <?php  echo $article["decription"]; ?> </p>
                            
                        </div>
                        
                    </div>
                </div> 
                <?php
                }
    ?>
</div>

<?php
?>    
</body>
</html>