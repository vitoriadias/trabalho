<?php
session_start();
UNSET($_SESSION["nome"]);
UNSET($_SESSION["matricula"]);
UNSET($_SESSION["codigo"]);
UNSET($_SESSION["nome_adm"]);
header("location: index.php");

 ?>
