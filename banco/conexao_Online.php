<?php

$servidor = 'sql10.freesqldatabase.com';
$usuario = 'sql10303261';
$senha = 'RrtZXkZtPp';
$banco = 'sql10303261';

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
$sql = "SET NAMES 'utf8'";
mysqli_query($conn, $sql);
$sql = 'SET character_setconnection=utf8';
mysqli_query($conn, $sql);
$sql = 'SET character_set_results=utf8';
mysqli_query($conn, $sql);
$sql = 'SET character_set_results=utf8';
mysqli_query($conn, $sql);

if(mysqli_connect_error($conn)){
	echo "Erro na conexão: " .mysqli_connect_error();
	die();
}
?>