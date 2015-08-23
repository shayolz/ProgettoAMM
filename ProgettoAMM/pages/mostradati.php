<?php

session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
echo("ID: " . $id . ", NOME: " . $nome . ", EMAIL: " . $email);
?>