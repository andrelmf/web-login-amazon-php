<?php

include('protect.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Página de origem do usuário ao logar -->
    <h1>LOGADO com sucesso Sr/sra : <?php echo $_SESSION['nome'];?></h1>

    <p><a href="logout.php">Sair da sessão</a></p>
</body>
</html>