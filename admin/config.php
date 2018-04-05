<?php
//Credencial do banco de dados
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '#!1Logi2Nicola3S!#');
define('DB_NAME', 'site_monitora');

// Variável para conectar com o MySQL
$db_con=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica a conexão
if ($db_con === false){
	die("ERROR: Não conseguiu conectar ao banco de dados." . mysql_connect_error());
}
?>