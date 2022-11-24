<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/image/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <title>teste pica</title>
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

?>

    
    
    <div class="contenu" >
        
        
        <form method= "POST" class="formInput" action="resultat.php">
            <select name="type"class="selectInput navbar-light" name="type" id="">
                <option disabled selected value>select an option</option>
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
        
    </div>




</body>
</html>