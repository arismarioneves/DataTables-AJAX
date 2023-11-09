<?php

// Configurações Banco de Dados
$host = 'localhost';
$user = 'root';
$pass = '';
$banco = 'dados';

$con = mysqli_connect($host, $user, $pass, $banco);
if (!$con) {
    echo 'Erro ao conectar no banco de dados!';
}
