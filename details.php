<!DOCTYPE html>
<html lang="fr">

<?php include 'header.php'; ?>
    <title>Home</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
<?php
    include('./session/conexao.php');

        $requete = $conexion->prepare("SELECT * FROM produits WHERE ID  = ?;");
        $requete->execute([ $_GET['id']]);
        $searchProduit = $requete->fetch();


?>
    <div class="resultat" >
    <ul>
  
                    <div class="carta" >
                            <h3 class="nom"><?php  echo $searchProduit["nom"]; ?></h3>
                            <img src="<?php  echo $searchProduit["url_img"]; ?>" alt=""  >
                            <div class="">
                                <h5 class="prix"> <?php  echo $searchProduit["prix"]; ?> $</h5>
                            </div>
                            
                    </div>
    </ul>
    </div>        
    
</body>
</html>