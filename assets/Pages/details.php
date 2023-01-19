<!DOCTYPE html>
<html lang="fr">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/morso/header.php'; ?>
<title>Home</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/morso/navbar.php'; ?>
    <?php


    $requete = $conexion->prepare("SELECT * FROM produits WHERE ID  = ?;");
    $requete->execute([$_GET['id']]);
    $searchProduit = $requete->fetch();


    ?>

    <section class="detalhes">
        <h3><?php echo $searchProduit["nom"]; ?> --- <?php echo $searchProduit["prix"]; ?> $</h3>
        <img src="<?php echo $searchProduit["url_img"]; ?>" alt="">
        <p>
            <?php echo $searchProduit["description"]; ?>
        </p>
        <p>
            <?php echo $searchProduit["description_en"]; ?>
        </p>
        <h4> </h4>

    </section>








</body>

</html>