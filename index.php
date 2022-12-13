<?php
if(!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./assets/css/carrosel.css">
    <script defer src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script defer src="./assets/js/carrosel.js"></script>
    <title>Home</title>
</head>
<body>

<?php include 'navbar.php'; ?>

<?php
    include('conexao.php');
           
            
                $requete = $conexion->prepare("SELECT * FROM Types");
                $requete->execute();
                $listeTypes = $requete->fetchAll();   
            
                $requete2 = $conexion->prepare("SELECT * FROM produits ;");
                $requete2->execute();
                $carroselVoiture = $requete2->fetchALL();
                
                
                


            
?>
    <?php
        include('modal.php');
    ?>
    <div class="contenu" >
        <form method= "POST" class="formInput" action="resultat.php">
            <select name="type"class="selectInput navbar-light" name="type" id="type">
                <option disabled selected value>Sélectionner une option</option>
                <option value="tout">Tout</option>

                <?php
                foreach($listeTypes as $article) {
                ?>
                    <option > <?= $article["nom"] ?> </option> 
                <?php
                };
                ?>
            </select>
            
            <input name="search" class="inputSearch navbar-light" type="text" placeholder="search">
        
        </form>
    </div>    
                    
                            
<section class="swiper mySwiper">

        <div class="swiper-wrapper">

        <?php
                foreach($carroselVoiture as $article) {
                ?>
                    <div class="swiper-slide">
                        <div class="carta " >
                            <h3 class="nom"><?php  echo $article["nom"]; ?></h3>
                            <img src="<?php  echo $article["url_img"]; ?>" alt=""  >
                            <div class="">
                                <h5 class="prix"> <?php  echo $article["prix"]; ?> $</h5>
                            </div>
                        </div>
                    </div>
                <?php
                };
        ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
  </section>
    





                    
<!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 5,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
  </script>
</body>




</html>