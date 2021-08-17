<!DOCTYPE html!>
<!-- vitoria dias brito -->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Vitória"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>e.Cadastro - Cadastrar Alunos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="css/img/books.png" type="image/x-icon">
</head>
<body>
	<?php include "includes/menu_adm.php" ?>

	<div id="area-principal">
		<div id="postagem">
			<form method="post" action="">
				<fieldset>
				<p>
					<label>Nome: </label><br>
					<input type="text" name="usuario" id="usuario"/>
				</p>
				<p>
					<label>Senha: </label><br>
					<input type="password" name="senha" id="senha"/>
				</p>
				<p>
					<label>CPF: </label><br>
					<input type="number" name="cpf" id="cpf"/>
				</p>
				<p>
					<label>Endereço: </label><br>
					<input type="text" name="endereco" id="endereco"/>
				</p>

				<input type="submit" value=" Enviar "/>
				<input type="reset" value=" Limpar "/>
			</fieldset>
			</form>

			<?php
			include("conexao.php");
			if(isset($_POST["usuario"])){
				$usuario = $_POST["usuario"];
				$endereco = $_POST["endereco"];
				$senha = $_POST["senha"];
				$cpf = $_POST["cpf"];

				$conexao = conecta_mysql();
				$senha = md5($senha);

				$sql = "SELECT * FROM alunos WHERE cpf= '$cpf'";
				if ($a = mysqli_query($conexao,$sql)) {
					$a = mysqli_fetch_assoc($a);
					if (isset($a["cpf"])) {
						print "<script language='javascript'>alert('Esse CPF já foi cadastrado!') </script>";
					}
					else {
						$sql = "INSERT INTO alunos(nome,senha,cpf,endereco)
						values('$usuario','$senha','$cpf','$endereco')";
						if(mysqli_query($conexao,$sql)){
							print "<script language='javascript'>alert('Usuário cadastrado com sucesso!') </script>";
						}
						else{
							print "<script language='javascript'>alert('Erro ao registrar :(')</script>";
						}
					}
				}
			}

			?>
		</div> <!-- Postagem-->
	</div> <!-- Area principal-->
</body>
</html>
