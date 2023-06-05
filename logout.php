<?php

if(!isset($_SESSION)){
    session_start();
} // Se não existir nenhuma sessão, inicia uma nova.

session_destroy(); // destroi a sessão

header("Location: ./index.php"); // Redireciona p/ o arquivo index.