<!-- Vitória Dias -->
<?php
session_start();
include("conexao.php");
$conexao = conecta_mysql();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>e.Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" href="css/img/books.png" type="image/x-icon">
    <?php include "includes/menu_aluno.php"?>
  </head>
  <body>
    <div id="area-principal">
    <div id="postagem">


    <?php
    include "includes/func_saudacao.php";
    saudacao();
    print " " . $_SESSION["nome"] . "!";
    print "</br></br>";
    ?>
    <p> <h4>Suas disciplinas:</h1> </p>

    <table border="2">
      <th> Disciplinas </th>
      <th> Carga Horária </th>
      <?php
      $id = $_SESSION["matricula"];
      $sql = "SELECT nome_disc,carga_hor FROM `matricula_aluno` JOIN disciplinas
       ON cod_disciplina = disciplinas.cod_disc WHERE cod_aluno = $id";
       if($resultado = mysqli_query($conexao,$sql)){
         while ($disciplina= mysqli_fetch_assoc($resultado)){
           echo "<tr>";
           echo "<td>". $disciplina["nome_disc"] . "</td>";
           echo "<td>". $disciplina["carga_hor"] . "</td>";
           echo "</tr>";
         }
      }
      ?>
    </table>
    </div>
      </div>
  </body>
</html>
