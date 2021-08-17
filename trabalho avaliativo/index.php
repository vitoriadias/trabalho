<!DOCTYPE html!>
<!-- vitoria dias brito -->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Vitória"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>e.Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="css/img/books.png" type="image/x-icon">
</head>
<body>
	<?php include "includes/menu.php" ?>

	<div id="area-principal">
		<div id="postagem">
			<form method="post" action="">
				<fieldset>
				<p>
					<label>Entrar como:<br>
						<select name="login">
							<option value="aluno">Aluno</option>
							<option value="adm">Administrador</option>
						</select>
					</label>
				</p>
				<p>
					<label>Senha: </label><br>
					<input type="password" name="senha" id="senha"/>
				</p>
				<p>
					<label>CPF: </label><br>
					<input type="number" name="cpf" id="cpf"/>
				</p>
				<input type="submit" value=" Login "/>

			</fieldset>
			</form>
		<?php
			if(isset($_POST["cpf"])){
				include("conexao.php");
				$conexao = conecta_mysql();
        $cpf = $_POST["cpf"];
				$senha = $_POST["senha"];
				$senha = md5($senha);
				$login = $_POST["login"];

				if($login=="aluno"){
					$sql = "SELECT * FROM alunos WHERE cpf = '$cpf' AND senha = '$senha'";
					$resultado_id = mysqli_query($conexao,$sql);
					$dados_usuarios = mysqli_fetch_array($resultado_id);

					if (isset($dados_usuarios['matricula']) ){
						session_start();
						$_SESSION['matricula'] = $dados_usuarios['matricula'];
						$_SESSION['nome'] = $dados_usuarios['nome'];
						header("location: login_aluno.php");
					}
  				  else{
	  					print"<script language='javascript'>alert('CPF ou senha incorreto(s)')</script>";
  				}
        }
				else{
					$sql = "SELECT * FROM administrador WHERE cpf_adm = '$cpf'
					AND senha_adm = '$senha'";
					// echo $sql;
	        $resultado_id = mysqli_query($conexao,$sql);
					if($resultado_id){
						  $dados_usuario = mysqli_fetch_array($resultado_id);
							if(isset($dados_usuario["cpf_adm"])){
								session_start();
			          $_SESSION["codigo"] = $dados_usuario['cod_adm'];
			          $_SESSION["nome_adm"] = $dados_usuario['nome_adm'];
								header("location:login_adm.php");
							}
							else{
		          print "<script language='javascript'>alert('CPF ou senha incorreto(s)')</script>";
		        }
					}
				}
	    }
			?>



		</div> <!-- Postagem-->
	</div> <!-- Area principal-->
</body>
 </html>
<?php ?>
