<?php 

include('../banco/conexao.php');

session_start();

	$PerfilNome = $_POST["PerfilNome"];
	$rg = $_POST["rg"];
	$cpf = $_POST["cpf"];
	$cepEndereco = $_POST["cepEndereco"];
	$end = $_POST["end"];
	$cargo = $_POST["cargo"];
	$sexo = $_POST["sexo"];
	$numero = $_POST["numero"];
	$bairro = $_POST["bairro"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$email = $_POST["email"];
	$user = $_POST["user"];	
	$senha = $_POST["senha"];
	$confSenha = $_POST["confSenha"];
	$telefone = $_POST["telefone"];
	$celular = $_POST["celular"];
	$cargo = $_POST["cargo"];

	$cepEndereco = preg_replace("/[^0-9]/", "", $cepEndereco);
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$celular = preg_replace("/[^0-9]/", "", $celular);
	$telefone = preg_replace("/[^0-9]/", "", $telefone);	

$retornoFunc = array();

//*************** VERIFICA SE O CPF JÁ EXISTE NO BANCO**********************//
			
			

			$pesqCPF = $conn->prepare("select idUsuario, cpf, ativo from Tb_Usuario where cpf = '$cpf';");
			$pesqCPF->execute();
			$resultado = $pesqCPF->get_result();
			$linha = $resultado->fetch_assoc();
			$estado = $linha["ativo"];
			$idUsuarioPesq = $linha["idUsuario"];

			$consultaFunc = "select cpf from Tb_Usuario where cpf = '$cpf';";
			$consultaFunc = mysqli_query($conn, $consultaFunc);
			$linhaPesqFunc = mysqli_num_rows($consultaFunc);

			if($linhaPesqFunc == 0	){
			
				
			}elseif($linhaPesqFunc == 1 && $estado == 0){
	
				$retornoFunc["sucesso"] = false;
				$retornoFunc["mensagem"] = "<div class='text-center bg-warning mb-3 pt-2 h5'>Este usuário foi desativado!<br><form action='validacoes/restauraFuncionario.php' method='POST'> <button type='submit' class='btn btn-transparent'value='$idUsuarioPesq' name='btnAtivar'>Clique aqui para ativá-lo novamente.</button></form></div>";
	
			}else{
				$retornoFunc['sucesso'] = false;
				$retornoFunc['mensagem'] = "<div class='text-center bg-warning mb-3 p-2 h5'>CPF já cadastrado</div>";
			}



echo json_encode($retornoFunc);

?>
