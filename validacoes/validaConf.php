<?php

	include('funcoes.php');
	//validarPost("../index.php");

	session_start();
	//var_dump($_POST["divConteudo"]);
$dados = $_POST["divConteudo"];
	/*
echo $dados[0];
echo $dados[1];
echo $dados[2];
echo $dados[3]; */


	//$marca = $_POST["marca"];
	$corMenu = $dados[0];
	$corLogo = $dados[2];
	$corletrasLogo = $dados[1];
	$corletrasMenu = $dados[3];
	$codUsuarioLogado = $_SESSION['cod'];

	echo inserirConfSistema($corMenu, $corLogo, $corletrasLogo, $corletrasMenu, $codUsuarioLogado);

	die();

?>