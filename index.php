<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php include 'header.php'; ?>
<title>Home</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <?php
    include('./session/conexao.php');


    $requete = $conexion->prepare("SELECT * FROM Types");
    $requete->execute();
    $listeTypes = $requete->fetchAll();

    $requete2 = $conexion->prepare("SELECT * FROM produits ;");
    $requete2->execute();
    $carroselVoiture = $requete2->fetchALL();

    ?>
    <div class="contenu">
        <form method="POST" class="formInput" action="resultat.php">
            <select name="type" class="selectInput " name="type" id="type">
                <option disabled selected value>Sélectionner une option</option>
                <option value="tout">Tout</option>

                <?php
                foreach ($listeTypes as $article) {
                ?>
                    <option> <?= $article["nom"] ?> </option>
                <?php
                };
                ?>
            </select>

            <input name="search" class="inputSearch " type="text" placeholder="search">
        </form>
    </div>


    <section class="swiper mySwiper">

        <div class="swiper-wrapper">

            <?php
            foreach ($carroselVoiture as $article) {
            ?>
                <div class="swiper-slide">
                    <div class="carta ">
                        <h3 class="nom"><?php echo $article["nom"]; ?></h3>
                        <img src="<?php echo $article["url_img"]; ?>" alt="">
                        <div class="">
                            <h5 class="prix"> <?php echo $article["prix"]; ?> $</h5>
                        </div>
                        <a href="details.php?id=<?= $article['id'] ?>" class="btn2">Details</a>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>

    </section>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            speed: 5000,
            spaceBetween: 15,
            loop: true,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: "#next-testimonial",
                prevEl: "#prev-testimonial",
            },
            autoplay: {
                delay: 500,
                disableOnInteraction: false,
            },
        });
    </script>
</body>




</html>