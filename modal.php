<?php
include('./session/conexao-user.php');

if (isset($_POST['user']) || isset($_POST['senha'])) {

    if (strlen($_POST['user']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['user']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM user WHERE email = '$email' AND password = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nom'];

            header("Location: index.php");
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
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
                </div>

                <div class="menu-modal">
                    <a>
                        <button type="submit" class="teste">Entrar</button>
                    </a>
                    <a href="./inscrisao.php">
                        <button class="teste">inscrisao</button>
                    </a>
                </div>
            </form>
        </div>
    </div>


<?php
} else {
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