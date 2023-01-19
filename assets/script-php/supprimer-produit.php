<h1>Voulez-vous vraiment supprimer ce produit ? </h1>

<?php include '/assets/session/conexao.php';

//connexion base de donnée


//préparation de  la requête
$requete = $conexion->prepare('DELETE FROM produits WHERE id = ?');

//execution de la requête
$requete->execute([$_GET['id']]);

//On redirige vers la page index.php
header('Location: /assets/Pages/resultat-user.php');


?>