<?php
	include_once('conexao.php');
	$id = $_GET['id'];
	$mysql = new BancodeDados();
	$mysql->conecta();
	
	// recuperando o nome do arquivo 
	$sqlstring = "select * from imagens where id=$id";
	$query = @mysqli_query($mysql->con, $sqlstring);
	$dados = @mysqli_fetch_array($query);

	
	$sqlstring = "delete from imagens where id=$id";
	@mysqli_query($mysql->con, $sqlstring);
	
	unlink ('arquivos/'.$dados['arquivo']);
	header('Location: index.php'); 
?>
