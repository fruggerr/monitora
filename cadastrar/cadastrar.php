<?php
// Incluir o arquivo config
require_once 'cadastrar/config.php';

// Define variáveis 
$matricula = $senha = $confirma_senha = "";
$matricula_err = $senha_err = $confirma_senha_err = "";

// Processa os dados quando são enviados
if($_SERVER["REQUEST_METHOD"] == "POST") {

	// Validar matrícula
	if (empty(trim($_POST["matricula"]))) {
		$matricula_err = "Insira a sua matrícula.";
	} else {
		// Prepara a seleção
		$sql = "SELECT id FROM usuarios WHERE matricula = ?";

		if ($stmt = mysqli_prepare($db_con, $sql)) {
			mysqli_stmt_bind_param($stmt, "s", $param_matricula]);

			// Grava parâmetros
			$param_matricula = trim($_POST["matricula"]);

			if (mysqli_stmt_execute($stmt)) {
				mysqli_stmt_store_result($stmt);

				if (mysqli_stmt_num_rows($stmt) == 1) {
					$matricula_err = "Esta matrícula está cadastrada.";
				} else {
					$matricula = trim($_POST["matricula"]);
				}
			} else {
				echo "Ops! Algo saiu errado. Tente novamente mais tarde.";
			}
		}

		mysqli_stmt_close($stmt);
	}

	// Validar senha
	if (empty(trim($_POST['senha']))) {
		$senha_err = "Preencha com a senha.";
	} elseif (strlen(trim($_POST['senha'])) < 6) {
		$senha_err = "A senha deve conter 6 caracteres.";
	} else {
		$senha = trim($_POST['senha']);
	}
}

?>