<!DOCTYPE html!>
<!-- vitoria dias brito -->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Vitória"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>e.Cadastro - Cadastrar Disciplinas</title>
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
					<label>Código: </label><br>
					<input type="text" name="codigo" id="codigo"/>
				</p>
				<p>
					<label>Disciplina: </label><br>
					<input type="text" name="disc" id="disc"/>
				</p>
				<p>
					<label>Carga horária: </label><br>
					<input type="number" name="ch" id="ch"/>
				</p>

				<input type="submit" value="Enviar"/>
				<input type="reset" value="Limpar"/>
			</fieldset>
			</form>

			<?php
			include("conexao.php");
			if(isset($_POST["codigo"])){
				$codigo = $_POST["codigo"];
				$disc = $_POST["disc"];
				$ch = $_POST["ch"];

				$conexao = conecta_mysql();
				$sql = "insert into disciplinas(cod_disc,nome_disc,carga_hor)
				values('$codigo','$disc','$ch')";
				if(mysqli_query($conexao,$sql)){
					print "<script language='javascript'>alert('Disciplina cadastrada com sucesso!')</script>";
				}
				else{
					print "<script language='javascript'>alert('Erro ao registrar :(')</script>";;
				}
			}
			?>
		</div> <!-- Postagem-->
	</div> <!-- Area principal-->
</body>
</html>
