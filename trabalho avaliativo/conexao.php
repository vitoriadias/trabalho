<?php
	function conecta_mysql(){
		$host = "localhost";
		$usuario = "root";
		$senha = "root";
		$nome_bd = "vitoria_phpbd";

		$conexao = mysqli_connect($host, $usuario, $senha, $nome_bd);
		mysqli_set_charset($conexao, "utf8");

		return $conexao;

	}

?>
