
<!DOCTYPE html!>
<!-- vitoria dias brito -->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Vitória"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>e.Cadastro - Matricular Alunos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="css/img/books.png" type="image/x-icon">
</head>
<body>
	<?php include "includes/menu_adm.php" ?>

	<div id="area-principal">
		<div id="postagem">
      <?php
      include_once "conexao.php";
  		$conexao = conecta_mysql();
  		$sql = "SELECT * FROM alunos";
  		$resultado = mysqli_query($conexao,$sql);

      if ($resultado) {
        $alunos = array();
        while($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
          $alunos[] = $linha;
        }
      }
      ?>
			<form method="post">
				<fieldset>
					<p>
					<label> Matrícula do aluno: </label><br>
					<input type="text" name="matricula_aluno" id="matricula_aluno"></p>
					<p>
					<label> Código da disciplina: </label><br>
					<input type="text" name="cod_disciplina" id="cod_disciplina"></p>
					<input type="submit" value=" Cadastrar ">
					<input type="reset" value=" Cancelar ">
				</fieldset>
			</form><br>
      <center><table border="2px">
        <tr>
          <th> Nome </th>
          <th> Matrícula </th>
        </tr>
        <?php
        foreach ($alunos as $aluno){
          print "<tr>";
          print "<td>" . $aluno["nome"]. "</td>";
          print "<td>" . $aluno["matricula"]." </td>";
          print "</tr>";
        }
        print" </table></center></br>";

        $sql = "SELECT * FROM disciplinas";
    		$resultado = mysqli_query($conexao,$sql);

        if ($resultado) {
          $disciplinas = array();
          while($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            $disciplinas[] = $linha;
          }
        }
        ?>
        <center><table border="2px">
          <tr>
            <th> Código  </th>
            <th> Disciplina </th>
          </tr>
          <?php
          foreach ($disciplinas as $disciplina){
            print "<tr>";
            print "<td>" . $disciplina["cod_disc"]. "</td>";
            print "<td>" . $disciplina["nome_disc"]." </td>";
            print "</tr>";
          }
          print" </table></center></br>";
          ?>

					<?php
					if (isset($_POST['matricula_aluno'])) {
						$matricula_aluno = $_POST['matricula_aluno'];
						$cod_disciplina = $_POST['cod_disciplina'];

						$sql1 = "SELECT * FROM  alunos WHERE matricula = '$matricula_aluno'";
						$sql2 = "SELECT * FROM disciplinas WHERE cod_disc = '$cod_disciplina'";
						if ($query1 = mysqli_query($conexao, $sql1) and $query2 = mysqli_query($conexao,$sql2)) {
							$query1 = mysqli_fetch_assoc($query1);
							$query2 = mysqli_fetch_assoc($query2);
							if (isset($query1["matricula"]) and isset($query2["cod_disc"])) {
								$sql = "SELECT * FROM matricula_aluno WHERE cod_aluno = '$matricula_aluno' AND cod_disciplina = '$cod_disciplina'";
								if ($a = mysqli_query($conexao,$sql)) {
									$a = mysqli_fetch_assoc($a);
									if (isset($a["cod_aluno"])) {
										print "<script language='javascript'>alert('Esse aluno já foi cadastrado nessa disciplina.')</script>";
									}
									else {
										$sql = "INSERT INTO matricula_aluno(cod_aluno,cod_disciplina) VALUES ('$matricula_aluno', '$cod_disciplina')";
										if ($query = mysqli_query($conexao, $sql)) {
											print "<script language='javascript'>alert('Cadastro realizado!')</script>";
										}
										else {
											print "<script language='javascript'>alert('O cadastro não foi feito :(')</script>";
										}
									}
									# code...
								}

							}
							else {
								print "<script language='javascript'>alert('Matrícula do aluno ou código da disciplina inválidos')</script>";
							}
						}
					}
					?>
</body>
    </div>
  </div>
  </html>
