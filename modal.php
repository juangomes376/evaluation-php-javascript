<?php
include('./session/conexao-user.php');
$_SESSION['erro'] = "falso";



if (isset($_POST['user']) || isset($_POST['senha'])) {


    $email = $mysqli->real_escape_string($_POST['user']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM user WHERE email = '$email' AND password = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {

        $usuario = $sql_query->fetch_assoc();

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nom'];
        $_SESSION['erro'] = "falso";
    } else {
        $_SESSION['erro'] = "verdade";
    }
}

if ($_SESSION['erro'] == "verdade") {
    echo '<script >

    window.addEventListener("DOMContentLoaded", (event) => {

        const maModale = document.getElementById("modale")
        maModale.style.display = "flex"
        
        const messageErreurLogin = document.getElementById("alertLogin");
        messageErreurLogin.classList.remove("db-n");
        messageErreurLogin.innerHTML = "ERRO email ou password pas correct";
                    
    });
         </script>';
}

if (!isset($_SESSION['nome'])) {
?>
    <div id="modale">

        <div class="contenu-m">
            <div id="bouton-ferme"><i class="fa-solid fa-xmark"></i></div>


            <form action="" method="POST">
                <h1>Acesse sua conta</h1>
                <div class="form-input">
                    <input placeholder="E-mail" type="text" name="user">
                    <input placeholder="Senha" type="password" name="senha">
                    <div id="alertLogin" class="db-n invalid-feedback"></div>
                </div>

                <div class="menu-modal">

                    <!-- <button class="teste">Entrar</button> -->
                    <a href="">
                        <button type="submit" class="teste">Entrar</button>
                    </a>
                    <a id="btIns" class="teste">
                        inscrisao
                    </a>
                </div>
            </form>
        </div>
    </div>


<?php
}

if (isset($_SESSION['nome'])) {
?>
    <div id="modale">
        <div class="contenu-md">
            <div id="bouton-ferme" class="bouton"><i class="fa-solid fa-xmark"></i></div>
            <h1>Vous etes conecte <?php echo $_SESSION["nome"]; ?></h1>
            <div>


                <a href="./resultat-user.php">
                    <button class="teste">tout produit</button>
                </a>
                <a href="./ajout-produit.php">
                    <button class="teste">ajoutet produit</button>
                </a>
                <a href="./session/logout.php">
                    <button class="teste">logout</button>
                </a>
            </div>


        </div>
    </div>


<?php
}

?>