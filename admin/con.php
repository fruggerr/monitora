<?php

// Declaração de variáveis
$user_db="root";
$senha_db="#!1Logi2Nicola3S!#";
$banco_db="site_monitora";

// Conecta com o banco de dados
$mysqli=new mysqli("localhost", $user_db, $senha_db, $banco_db);

// Confere se é possível acessar o banco de dados
if ($mysqli === false) {

	die("Erro: Não é possível conectar ao banco de dados. Causa: " . $mysqli->connect_error);
}
// Conectado ao banco de dados
echo "Conexão bem sucedida. Informações: " . mysqli->host_info;
?>