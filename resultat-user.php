<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="fr">

    <?php include 'header.php'; ?>
    <title>Home</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
<?php
    include('conexao.php');
    
        $user = $_SESSION[''];

        $requete = $conexion->prepare("SELECT * FROM produits WHERE userAdm LIKE ?; ");
        $requete->execute(['%'.$user.'%']);
        $searchProduit = $requete->fetchALL();
    
        

?>
    
<div class="resultat" >
    <ul>
    <?php
    foreach($searchProduit as $article) {
                ?>   
                    <div class="carta" >
                            <h3 class="nom"><?php  echo $article["nom"]; ?></h3>
                            <img src="<?php  echo $article["url_img"]; ?>" alt=""  >
                            <div class="">
                                <h5 class="prix"> <?php  echo $article["prix"]; ?> $</h5>
                            </div>
                            <a href="supprimer-produit.php?id=<?= $article['id'] ?>" class="btn2">Supprimer</a>
                            <a href="modifier-produit.php?id=<?= $article['id'] ?>" class="btn2">Modifier</a>
                            <a href="details.php?id=<?= $article['id'] ?>" class="btn2">Details</a>
                            
                    </div>
                <?php
                }
    ?>
    </ul>
</div>

<?php
    include('modal.php');
?>    
</body>
</html>