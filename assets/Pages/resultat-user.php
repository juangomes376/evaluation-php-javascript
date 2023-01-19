<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/morso/header.php'; ?>
<title></title>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/morso/navbar.php'; ?>
    <?php


    $user = $_SESSION['id'];

    $requete = $conexion->prepare("SELECT * FROM produits WHERE userAdm LIKE ?; ");
    $requete->execute(['%' . $user . '%']);
    $searchProduit = $requete->fetchALL();
    ?>

    <div class="resultat">
        <ul>


            <script>
                let articleAsupprimer = null
            </script>


            <?php
            foreach ($searchProduit as $article) {
            ?>
                <div class="carta">
                    <h3 class="nom"><?php echo $article["nom"]; ?></h3>
                    <img src="<?php echo $article["url_img"]; ?>" alt="">
                    <div class="">
                        <h5 class="prix"> <?php echo $article["prix"]; ?> $</h5>
                    </div>


                    <!-- <a id="testeteste" class="btn2" ">Supprimer</a> -->
                    <a href="/assets/Pages/modifier-produit.php?id=<?= $article['id'] ?>" class="btn2">Modifier</a>
                    <a href="/assets/Pages/details.php?id=<?= $article['id'] ?>" class="btn2">Details</a>


                    <a id="delete-<?= $article['id'] ?>" class="btn2">Supprime</a>

                    <script>
                        document
                            .getElementById('delete-<?= $article['id'] ?>')
                            .addEventListener('click', e => {
                                articleAsupprimer = <?= $article['id'] ?>


                                const maModale = document.getElementById('modale-sup')
                                maModale.style.display = 'flex'

                            })
                    </script>
                </div>
            <?php
            }
            ?>
        </ul>
    </div>


</body>



</html>