<!DOCTYPE html>
<html lang="fr">

<?php


include $_SERVER['DOCUMENT_ROOT'] . '/assets/morso/header.php'; ?>
<title>Home</title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/morso/navbar.php'; ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/assets/session/conexao.php');



    if (!isset($_POST['type']) || $_POST['type'] == "tout") {
        $requete = $conexion->prepare("SELECT * FROM produits WHERE nom LIKE ? ;");
        $requete->execute(['%' . $_POST['search'] . '%']);
        $searchProduit = $requete->fetchALL();
    } else {
        $requete = $conexion->prepare("SELECT * FROM produits WHERE nom LIKE ? AND type = ?;");
        $requete->execute(['%' . $_POST['search'] . '%', $_POST['type']]);
        $searchProduit = $requete->fetchALL();
    }

    ?>

    <div class="resultat">

        <ul>
            <?php
            foreach ($searchProduit as $article) {
            ?>
                <div class="carta">
                    <h3 class="nom"><?php echo $article["nom"]; ?></h3>
                    <img src="<?php echo $article["url_img"]; ?>" alt="">
                    <div class="">
                        <h5 class="prix"> <?php echo $article["prix"]; ?> $</h5>
                    </div>
                    <a href="/assets/Pages/details.php?id=<?= $article['id'] ?>" class="btn2">Details</a>
                </div>
            <?php
            }
            ?>
        </ul>
    </div>


</body>

</html>