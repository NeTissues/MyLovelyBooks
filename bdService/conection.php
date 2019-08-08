<?php
	function abrirConexao(){
		$conn = mysqli_connect("localhost", "root", "", "mylovelybooks");
		return $conn;
	}
	
	function fecharConexao($conexao){
		mysqli_close($conexao);
	}
?>