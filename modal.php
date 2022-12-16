
<?php
include('./conexao-user.php');

if(isset($_POST['user']) || isset($_POST['senha'])) {

    if(strlen($_POST['user']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['user']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM user WHERE user = '$email' AND password = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['ID'];
            $_SESSION['nome'] = $usuario['user'];

            // header("Location: index.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}

if(!isset($_SESSION['nome'])) {
 ?>   
    <div id="modale" >
        <div class="contenu-m">
            <div id="bouton-ferme" ><i class="fa-solid fa-xmark"></i></div>    
            
            
            <form  action="" method="POST">
                <h1>Acesse sua conta</h1>
                <p>
                    <label>E-mail</label>
                    <input type="text" name="user">
                </p>
                <p>
                    <label>Senha</label>
                    <input type="password" name="senha">
                </p>
                <div class="menu-modal" >
                    <button  class="teste" type="submit">Entrar</button>
                    <button  class="teste" type="submit" formaction="/inscrisao.php">Inscrisao</button>
                </div>
            </form>
        </div>
</div>


<?php
}else {
?>
    <div id="modale-on">
        <div class="contenu-md">
            <div id="bouton-ferme" class="bouton">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h1>voce esta conectado</h1>
            <p class="button-md" >
                <a href="./resultat-user.php" class="button-b">tout produit</a>
            </p>

            <p class="button-md" >
                <a href="./ajout-produit.php" class="button-b">Ajouter produit</a>
            </p>
            <p class="button-md">
                <a href="./session/logout.php" class="button-b" >logout</a>
            </p>
        </div>
    </div>


<?php
}

?>










