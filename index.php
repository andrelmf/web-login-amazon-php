<?php

// if (isset($_POST['email']) || isset($_POST['senha'])){

//         $email = $mysqli->real_escape_string($_POST['email']);
//         $senha = $mysqli->real_escape_string($_POST['senha']);

//         $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
//         $sql_query = $mysqli->query($sql_code) or die("Falha ao executar o código SQL: " . $mysqli->error);

//         $quantidadeRegistro = $sql_query->num_rows; // Me retorna a Qtd. de linhas da consulta

//         if($quantidadeRegistro == 1){

//             $usuario = $sql_query->fetch_assoc();

            // if(!isset($_SESSION)){ // Se não existir uma sessão, vai começar uma nova.
            //     session_start();
            // }

            // $_SESSION['id'] = $usuario['id'];
            // $_SESSION['nome'] = $usuario['nome'];

            //     header("Location: logado.php");

//         } else {
//             $falhalogin = "";
//         }
    
//     }

if(isset($_POST['email'])){
    include('./config/conexao.php');

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_exec->fetch_assoc();
   
    if(password_verify($hashedsenha, $usuario['senha'])){
        if(!isset($_SESSION)){ // Se não existir uma sessão, vai começar uma nova.
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

            header("Location: logado.php");
        } else {
            $falhalogin = "";
        }

    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./resources/static/styles/header.css">
    <link rel="stylesheet" href="./resources/static/styles/footer.css">
    <link rel="stylesheet" href="./resources/static/styles/login.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="text/javascript" src="resources/static/js/scriptNav.js"></script>
</head>

    <body>
        <main>
            <!-- Header include -->
            <?php
                include('./resources/templates/fragments/mainHeader.php')
            ?>

            <!-- Conteúdo Login -->
            <div id="conteudoLogin">
                <div class="logoEmpresaLogin">
                        <a href="./index.php"> 
                            <img src="resources/static/images/amazon_icon_login.jpeg"  alt="logoEmpresa">
                        </a>      
                </div>
                
                <div class="bemVindoMensagemLogin">
                    <h5>Bem Vindo!</h5>
                    <h6>Acesse a sua Conta:</h6>
                </div>
                        
                <form action=""method="POST">
                    <label for="email">
                        <input required type="email" id="email" name="email" placeholder="E-mail">
                    </label>
                    <label for="senha">
                        <input required type="password" id="senha" name="senha" placeholder="Senha">
                    </label>
                    <input type="submit" value="Entrar">
                    <p class="error">
                    <?php if(isset($falhalogin)){ // Se a variavel não for iniciada:
                        echo $falhalogin = "Falha ao logar. E-mail ou senha incorretos, tente novamente.";
                        ?> <style>.error{display:block;  background-color: #ebc5c5; margin: 1rem;}</style><?php
                    }?>    
                    </p>
                    <div id="cadastrese"><p>Não possui uma conta?</p><a href="./cadastro.php" id="cliqueAqui">Clique aqui!</a></div>
                </form>
                
            </div>
            
                <!-- Footer include -->
            <?php
                include('./resources/templates/fragments/mainFooter.php');
            ?>

        </main>
                
    </body>

</html>
