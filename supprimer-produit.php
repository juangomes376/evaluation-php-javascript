
<h1>Voulez-vous vraiment supprimer ce produit ? </h1>

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






