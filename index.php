<!DOCTYPE html>
<html>
 <head>
 	<title>Monitoração</title>
 	<meta charset="utf-8">
 </head>
 <body>
 	<form method="post" action="valida.php">
 		<label>Matrícula</label>
 		<input type="text" name="matricula" maxlength="50" />

 		<label>Senha</label>
 		<input type="password" name="Senha" maxlength="50" />

 		<div class="dropdown">
 			<a class="setor">Meu setor</a>

 			<div class="submenu">
 				<ul class="root">
 					<li><a href="#Monitoração">Monitoração</a></li>
 					<li><a href="#Documentação">Documentação</a></li>
 					<li><a href="#Preparo">Preparo</a></li>
 				</ul>
 			</div>
 		</div>
 		<input type="submit" name="Entrar" />
 	</form>
</body>
</html>