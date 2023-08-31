<?php
// Configuração docker
// $usuario = 'user';
// $senha = 'root';
// $database = 'login';
// $host = 'db';

// $mysqli = new mysqli($host, $usuario, $senha, $database);
// // $pdo = new PDO("mysql:dbname=".$database.";host=".$host, $usuario, $senha);

// if($mysqli->error) {
//     die("Falha ao conectar ao banco de dados: ". $mysqli->connect_error);
// }

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost:3306';

$mysqli = new mysqli($host, $usuario, $senha, $database);
$pdo = new PDO("mysql:dbname=".$database.";host=".$host, $usuario, $senha);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: ". $mysqli->error);
}



?>