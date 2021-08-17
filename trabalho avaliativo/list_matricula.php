<?php
session_start();
include("conexao.php");
$conexao = conecta_mysql();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Vitória"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>e.Cadastro - Matrículas</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="css/img/books.png" type="image/x-icon">
</head>
<body>
<?php include "includes/menu_adm.php" ?>
	<div id="area-principal">
		<div id="postagem">

      <form method="post">
        <fieldset>
          <p>
          <label> Código da disciplina: </label><br>
        <input type="number" name="cod_disc" ></p>
        <input type="submit" value=" Procurar">
        <input type="reset" value=" Limpar">
        </fieldset>
      </form>
      <?php
      if (isset($_POST["cod_disc"])) {
        $cod_disc = $_POST["cod_disc"];

        $conexao = conecta_mysql();
        $sql = "SELECT * FROM matricula_aluno JOIN alunos ON
        cod_aluno= alunos.matricula WHERE cod_disciplina = $cod_disc";
        $resultado = mysqli_query($conexao,$sql);
        if ($resultado) {
          print "<table border=2>";
					print "<tr>
	          <th>Aluno</th>
	          <th>Matrícula</th>
	        <tr/>";
          while ($data = mysqli_fetch_assoc($resultado)) {
            print "<tr>";
            print "<td>" . $data["nome"]."</td>";
						print "<td>" . $data["matricula"]."</td>";
            print "</tr>";
          }
          print "</table>";
        }
      } ?>


    </div>
  </div>
</body>
</html>
