<?php
session_start(); ?>
<!DOCTYPE html>
<!-- vitória dias brito-->
<html>
  <head>
    <meta charset="utf-8">
    <title>e.Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="shortcut icon" href="css/img/books.png" type="image/x-icon">
    <?php
    include "includes/menu_adm.php";
    ?>

  </head>
  <body>
    <div id="area-principal">
  		<div id="postagem"><h4>
    <?php
    include "includes/func_saudacao.php";
    saudacao();
    print " " . $_SESSION["nome_adm"] . "!";
    print "</br></br>";
    ?>
    </h4>
  </div>
</div>
  </body>
</html>
