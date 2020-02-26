<?php 

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	$mesInicio = $_POST["mesInicio"];


	include('banco/conexao.php');
	 
    $script = "SELECT count(idVenda) AS quantVenda FROM Tb_Venda WHERE Month(mesInicio) = Month(now())";

    $sql = mysqli_query($conn, $script);

    
    if(mysqli_num_rows($sql) > 0)
    {
    	$response = array("success" => true);
		echo json_encode($response);
	}
?>