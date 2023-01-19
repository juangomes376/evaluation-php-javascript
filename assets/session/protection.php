<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {

    die("Vous ne pouvez pas accéder à cette page car vous n'êtes pas connecté.<p><a href=\"/index.php\">Connecté</a></p>");
}
