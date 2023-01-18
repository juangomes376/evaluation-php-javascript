<?php
include('./session/conexao-user.php');

if (isset($_POST['userins']) || isset($_POST['senhains'])) {


    $email = $mysqli->real_escape_string($_POST['userins']);
    $senha = $mysqli->real_escape_string($_POST['senhains']);
    $nom = $_POST['nomins'];

    $sql_code = "INSERT INTO user ( nom, email, password) VALUES ( '$nom', '$email', '$senha')";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
}

?>


<div id="modale-ins">

    <div class="contenu-m">
        <div id="BtModalInsFerme"><i class="fa-solid fa-arrow-left"></i></div>


        <form action="" method="POST">
            <h1>crie sua conta</h1>
            <div class="form-input">
                <input placeholder="Nom" type="text" name="nomins">
                <input placeholder="E-mail" type="text" name="userins">
                <input placeholder="Senha" type="password" name="senhains">
                <div id="alertLogin" class="db-n invalid-feedback"></div>
            </div>

            <div class="menu-modal">

                <!-- <button class="teste">Entrar</button> -->
                <a href="">
                    <button type="submit" class="teste">criar conta</button>
                </a>

            </div>
        </form>
    </div>
</div>