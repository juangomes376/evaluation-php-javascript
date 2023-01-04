<?php include './session/conexao.php'; ?>
<?php if (isset($_GET['confirme'])) {
    //connexion base de donnée
    

    //préparation de  la requête
    $requete = $conexion->prepare('DELETE FROM produits WHERE id = ?');

    //execution de la requête
    $requete->execute([$_GET['id']]);

    //On redirige vers la page index.php
    header('Location: index.php');

    
} ?>
   
    <div id="modale-sup" >
        <div class="contenu-m">
            
            <form  action="" method="POST">
                <h1>vous etes sur de suprimir cette produit</h1>
                <button>nom</button>
                <button id="bt-ferme" >oui</button>
            </form>
        </div>
</div>


<?php

?>










