<!DOCTYPE html!>
<!--Vitória -->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Vitória"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>e.Cadastro - Disciplinas</title>
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
      $sql = "select * FROM disciplinas";
      $resultado = mysqli_query($conexao,$sql);

      if($resultado){
        $disciplinas =  array();
        while ($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
          $disciplinas[] = $linha;
        }
      }?>
      <center><table border="1">
        <tr>
          <th>Código da disciplina</th>
          <th>Disciplina</th>
          <th>Carga Horária</th>
        <tr/>
      <?php
      foreach ($disciplinas as $disciplina) {
        print "<tr>";
        print "<td>".$disciplina["cod_disc"]."</td>";
        print "<td>".$disciplina["nome_disc"]."</td>";
        print "<td>".$disciplina["carga_hor"]."</td>";
        print "</tr>";
      }
       ?>
     </table></center>
		</div> <!-- Postagem-->
	</div> <!-- Area principal-->
</body>
</html>
