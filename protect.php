<?php

if(!isset($_SESSION)){
    session_start();
} 

if(!isset($_SESSION['id'])) { // Se não houver uma sessão de id criada, aparecerá a mensagem abaixo:
    die("Você não pode acessar a página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
}
?>