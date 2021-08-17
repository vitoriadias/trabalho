<!DOCTYPE html!>
<!--vitória dias brito-->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Vitória"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>e.Cadastro - Alunos</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="css/img/books.png" type="image/x-icon">
</head>
<body>
<?php include "includes/menu_adm.php" ?>

	<div id="area-principal">
		<div id="postagem">
      <?php
      include("conexao.php");
      $conexao = conecta_mysql();
      $sql = "select * FROM alunos";
      $resultado = mysqli_query($conexao,$sql);

      if($resultado){
        $alunos =  array();
        while ($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
          $alunos[] = $linha;
        }
      }?>
      <center><table border="2px">
				<tr>
					<th>Nome</th>
					<th>Matrícula</th>
					<th>CPF</th>
					<th>Endereço</th>
				<tr/>
      <?php
      foreach ($alunos as $aluno) {
        print "<tr>";
        print "<td>".$aluno["nome"]."</td>";
        print "<td>".$aluno["matricula"]."</td>";
        print "<td>".$aluno["cpf"]."</td>";
				print "<td>".$aluno["endereco"]."</td>";
        print "</tr>";
      }
       ?>
     </table></center>
		</div> <!-- Postagem-->
	</div> <!-- Area principal-->
</body>
</html>
