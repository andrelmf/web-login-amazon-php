<?php
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');

if($email){
    require './config/conexao.php';

    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue( ':senha', $senha);
        $sql->execute();

        echo $sucessoCadastrar = "";
        // header("Location: index.php");
        
    }else{
        echo $falhaCadastrar = "";
        // header("Location: index.php");

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
        <!-- Conteúdo de formulário Cadastro -->
        <div id="conteudoLogin">
                <div class="logoEmpresaLogin">
                        <a href="./index.php"> 
                            <img src="resources/static/images/amazon_icon_login.jpeg"  alt="logoEmpresaLogin">
                        </a>      
                </div>
                
                <div class="bemVindoMensagemLogin">
                    <h5>Bem Vindo!</h5>
                    <h6>Cadastre sua Conta:</h6>
                </div>

            <form method="POST" action="./cadastro.php">

                <label for="nome">
                        <input required type="text" id="nome" name="nome" placeholder="Nome" autofocus/>
                </label>

                    <label for="email">
                        <input required type="email" id="email" name="email" placeholder="E-mail"/>
                    </label>

                    <label for="senha">
                        <input required type="password" id="senha" name="senha" placeholder="Senha"/>
                    </label>

                    <input type="submit" value="Cadastre-se" id="cadastrese"/>
                    
                    <p class="error">
                    <?php 
                    if(isset($falhaCadastrar)){ // Se a variavel não for iniciada:
                        echo $falhaCadastrar = "Falha ao cadastrar! O E-mail ja existe, tente novamente.";
                        ?> <style>.error{display:block ; background-color: #ebc5c5; margin: 1rem;}</style><?php
                    }?> 
                    <a href="./index.php">Volte à página principal</a>
                    </p>

                    <p class="sucessoCadastrar">
                    <?php if(isset($sucessoCadastrar)){ // Se a variavel não for iniciada:
                        echo $sucessoCadastrar = "Você foi cadastrado com sucesso!";
                        ?> <style>.sucessoCadastrar{display:block ; background-color: #edf4ed; margin: 1rem;}</style><?php
                    }?>
                    <a href="./index.php">Volte à página principal.</a>
                    </p>

            </form>
        </div>
        <!-- Footer include -->
        <?php
                include('./resources/templates/fragments/mainFooter.php');
            ?>
    </main>

</body>
</html>