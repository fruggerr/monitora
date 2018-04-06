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
	// Validar a confirmação da senha
	if (empty(trim(($_POST['confirma_senha'])))) {
		$confirma_senha_err = 'Por favor, confirma a sua senha.';
	} else {
		$confirma_senha = trim($_POST['confirma_senha']);
		if ($senha != $confirma_senha) {
			$confirma_senha_err = 'As senhas não conferem.';
		}
	}
	// Checa os erros da entrada antes de inserir no banco de dados
	if (empty($matricula_err) && empty($senha_err) && empty($confirma_senha_err)) {
		$sql = "INSERT INTO usuarios (matricula, senha) VALUES (?, ?)";

		if ($stmt = mysqli_prepare($db_con, $sql)) {
			mysqli_stmt_bind_param($stmt, "ss", $param_matricula, $param_senha);

			// Setar os parâmetros
			$param_matricula = $matricula;
			$param_senha = password_hash($senha, PASSWORD_DEFAULT);

			if (mysqli_stmt_execute($stmt)) {
				// Redireciona para a página login
				header("logation: login.php");
			} else {
				echo "Ops! Algo saiu errado. Tente novamente mais tarde.";
			}
		}
		// Fecha o estado da conexão
		mysqli_stmt_close($stmt);
	}
	// Fecha a conexão
	mysqli_close($db_con);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar usuários - Monitoração</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="wrapper">
		<h2>Cadastrar novo usuário</h2>
		<p>Preencha o formulário para criar um novo usuário.</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group <?php echo (!empty($matricula_err)) ? 'has-error' : ''; ?>">

		</form>

	</div>
</body>
</html>
}

?>
