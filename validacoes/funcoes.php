<?php
	
	function validarPost($localRetorno){
		if(empty($_POST)){
		header("Location:".$localRetorno);
		exit();
		}
	}

	function buscarUsuario($email, $pass){
		include('../banco/conexao.php');
		$sql = $conn->prepare("SELECT * FROM Tb_Usuario WHERE (email = ? OR nickname = ?) AND senha = ? AND ativo = 1");
		$sql->bind_param("sss", $email, $email, $pass);
		$sql->execute();

		$resultado = $sql->get_result();
		$linha = $resultado->fetch_assoc();
		$nome = explode(" ", $linha['nomeUsuario']);
		$_SESSION['p_nome'] = $nome[0];	
		$_SESSION['cod'] = $linha['idUsuario'];
		$_SESSION['eMail'] = $linha['eMail'];
		$_SESSION['idPerfil'] = $linha['idPerfil'];
		
		if (empty($linha)) 
		{
			header("Location:../index.php?login=erro");	
		}
		else
		{	

			$sql = $conn->prepare("SELECT * FROM Tb_Configuracao");
			var_dump($sql);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha1 = $resultado->fetch_assoc();
			
			$_SESSION['corMenuFundo'] = $linha1['corFundoMenu'];
			$_SESSION['corLogoFundo'] = $linha1['corFundoLogo'];
			$_SESSION['corLogoTxt'] = $linha1['corTxtLogo'];
			$_SESSION['corMenuTxt'] = $linha1['corTxtMenu'];
			$_SESSION['empresaNome'] = $linha1['nomeEmpresaCliente'];
			$_SESSION['empresaNum'] = $linha1['numero'];
			$_SESSION['empresaCep'] = $linha1['cep'];
			$_SESSION['cnpj'] = $linha1['cnpj'];
			$_SESSION['endEmpresa'] = $linha1['endereco'];
			$_SESSION['bairro'] = $linha1['bairro'];
			$_SESSION['cidade'] = $linha1['cidade'];
			$_SESSION['estado'] = $linha1['estado'];
			$_SESSION['responsavel'] = $linha1['nomeResponsavel'];
			$_SESSION['emailEmpresa'] = $linha1['eMail'];
			$_SESSION['estado'] = $linha1['estado'];
			$_SESSION['tipo'] = $linha1['tipo'];
			$_SESSION['nomeFantasia'] = $linha['nomeFantasia'];
			$_SESSION['telEmpresa'] = $linha1['telefoneComercial'];

			if ($linha1['cnpj'] != "" & $_SESSION['idPerfil'] == "2") {
				header("Location:../home.php");
			}elseif ($_SESSION['idPerfil'] == "3"){
				header("Location:../estoque.php");
			}elseif ($_SESSION['idPerfil'] == "4"){
				header("Location:../vendas.php");
			}elseif ($_SESSION['idPerfil'] == "5"){
				header("Location:../estoque.php");
			}elseif ($_SESSION['idPerfil'] == "6"){
				header("Location:../compras.php");
			}elseif ($_SESSION['idPerfil'] == "7"){
				header("Location:../compras.php");
			}else{
				header("Location:../config.php");
			}
		}

		$sql -> close();
		$conn -> close();
	}

	function alteraFuncionario($id, $PerfilNome, $rg, $cpf, $cargo, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $email, $user, $telefone , $celular, $sexo){
		include('../banco/conexao.php');
		$sql = $conn->prepare("UPDATE Tb_Usuario SET nomeUsuario = ?, rg = ?, cpf =?, idPerfil =?, cep =?, endereco = ?, numero = ?, bairro = ?, cidade = ?, estado = ?, email = ?, nickName = ?, tel = ?, cel = ?, sexo = ? WHERE idUsuario = ?");
		$sql ->bind_param("ssssssssssssssss", $PerfilNome, $rg, $cpf, $cargo, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $email, $user, $telefone , $celular,$sexo, $id);
		$sql->execute();
		header("Location:../pessoas.php?alterar");
		die();
	}
/*
	function alteraFornecedor($cnpj, $nomeEmpresa, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $nomeResponsavel, $email, $telefone , $celular, $idFunc, $idForn){


	}
*/
	function excluiFuncionario($id){
		include('../banco/conexao.php');
		$sql = $conn->prepare("UPDATE Tb_Usuario SET ativo = 0 WHERE idUsuario = ?");
		$sql ->bind_param("s", $id);
		$sql->execute();
		$_SESSION['msgCad'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'> Funcionário excluído com sucesso! </div>";
		header("Location:../pessoas.php");
		die();
		$sql -> close();
		$conn -> close();
	}

	function excluiFornecedor($id){
		include('../banco/conexao.php');
		$sql = $conn->prepare("UPDATE Tb_Fornecedor SET ativo = 0 WHERE idFornecedor = ?");
		$sql ->bind_param("s", $id);
		$sql->execute();
		header("Location:../fornecedor.php?excluir");
		die();
		$sql -> close();
		$conn -> close();
	}

	function pesquisarFuncionario($pesquisaPor){
		include('../banco/conexao.php');
		$sql = $conn->prepare("SELECT * FROM Tb_Usuario WHERE nomeUsuario like '%?%'");
		$sql->bind_param("s", $pesquisaPor);
		$sql->execute();
		header("Location:../pessoas.php?pesquisaPor=$pesquisaPor");
		$sql -> close();
		$conn -> close();
	}

	function salvaFuncionario($PerfilNome, $rg, $cpf, $cepEndereco, $end, $cargo, $numero, $bairro, $cidade, $estado, $email, $user, $confSenha, $telefone , $celular,$sexo){
		
		//$retornoFunc = array();
		try {
			include('../banco/conexao.php');
			
			
			
			//*************** VERIFICA SE O CPF JÁ EXISTE NO BANCO**********************//
			$consultaFunc = "select cpf from Tb_Usuario where cpf = '$cpf';";
			$consultaFunc = mysqli_query($conn, $consultaFunc);
			$linhaPesqFunc = mysqli_num_rows($consultaFunc);
			
			$ativo = '1';
			date_default_timezone_set("America/Sao_Paulo");
			$data = date('Y-m-d H:i');
			$sql = $conn->prepare("INSERT INTO Tb_Usuario (nomeUsuario,rg,cpf,cep,endereco,idPerfil,numero,bairro,cidade,estado,email,nickName,senha,tel,cel,dataCadastro,ativo,sexo)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->bind_param("ssssssssssssssssss", $PerfilNome, $rg, $cpf, $cepEndereco, $end, $cargo, $numero, $bairro, $cidade, $estado, $email, $user, $confSenha, $telefone , $celular, $data, $ativo,$sexo);
							$sql->execute();

			/*if($linhaPesqFunc == 0){
			
							
				if($sql){
					$retornoFunc['sucesso'] = true;
					$retornoFunc['mensagem'] ="<div class='text-center bg-success mb-3 p-2 h5'>Funcionário cadastrado com sucesso!</div>";
				}else{
					$retornoFunc['sucesso'] = false;
					$retornoFunc['mensagem'] = "<div class='text-center bg-danger mb-3 p-2 h5'>Falha ao inserir funcionário!</div>";
				}
			}elseif($linhaPesqFunc == 1 && $estado == 0){
	
				$retornoFunc["sucesso"] = false;
				$retornoFunc["mensagem"] = "<div class='text-center bg-warning mb-3 pt-2 h5'>Este usuário foi desativado!<br><form action='validacoes/restauraFuncionario.php' method='POST'> <button type='submit' class='btn btn-transparent'value='$idUsuarioPesq' name='btnAtivar'>Clique aqui para ativá-lo novamente.</button></form></div>";
	
			}else{
				$retornoFunc['sucesso'] = false;
				$retornoFunc['mensagem'] = "<div class='text-center bg-warning mb-3 p-2 h5'>CPF já cadastrado</div>";
			}
			
			*/
			
			header("Location:../pessoas.php?salvo");

			$sql -> close();
			$conn -> close();
		} catch (Exception $e) {
			echo $e;
		}
		
		//echo json_encode($retornoFunc);
		
	}

	function salvaFornecedor($idFunc, $cnpj, $nomeEmpresa, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $nomeResponsavel, $email, $telefone , $celular){
		
		$retornoForn = array();
		try {
			include('../banco/conexao.php');
			$ativo = '1';
			date_default_timezone_set("America/Sao_Paulo");
			$data = date('Y-m-d H:i');
			$sql = $conn->prepare("INSERT INTO Tb_Fornecedor (idUsuarioCadastro,cnpj,nomeFornecedor,cep,endereco,numero,bairro,cidade,estado,nomeResponsavel,eMail,telefoneComercial,telefoneCelular,dataCadastro,ativo)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->bind_param("sssssssssssssss", $idFunc, $cnpj, $nomeEmpresa, $cepEndereco, $end, $numero, $bairro, $cidade, $estado, $nomeResponsavel, $email, $telefone , $celular, $data, $ativo);
			$sql->execute();
			header("Location:../fornecedor.php?salvo");

			$sql -> close();
			$conn -> close();
		} catch (Exception $e) {
			echo $e;
		}
		json_encode($retornoForn);
		
	}

	function alterarSenha($id, $confirmaSenha){
		include('../banco/conexao.php');
		
		$sql = $conn->prepare("UPDATE Tb_Usuario SET senha = $confirmaSenha WHERE idUsuario = ?");
		$sql ->bind_param("s", $id);
		$sql->execute();

		header("Location:../pessoas.php?senhaAlterara=alterada");

		$sql -> close();
		$conn -> close();	

	}

	function inserirEmpresa($nomeEmpresa, $cnpj, $endereco, $numEmpresa, $bairro, $cidade, $estado, $cep, $nomeResponsavel, $emailEmpresa, $tel, $tipo,$fantasia, $codUsuarioLogado){
		include('../banco/conexao.php');
		$sql = $conn->prepare("SELECT * FROM Tb_Configuracao WHERE idUsuarioAlteracao = ?");
		$sql ->bind_param("s", $codUsuarioLogado);
		$sql->execute();
		$resultado = $sql->get_result();
		$linha = $resultado->fetch_assoc();
			$data = date("Y/m/d");
		if (empty($linha)){
			$sql = $conn->prepare("INSERT INTO Tb_Configuracao (nomeEmpresaCliente,cnpj,endereco,numero,bairro,cidade,estado,cep,nomeResponsavel,eMail,telefoneComercial,tipo,nomeFantasia,dataCadastro,idUsuarioAlteracao)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->bind_param("sssssssssssssss", $nomeEmpresa, $cnpj, $endereco, $numEmpresa, $bairro, $cidade, $estado, $cep, $nomeResponsavel, $emailEmpresa, $tel, $tipo, $fantasia, $data, $codUsuarioLogado);
			$sql->execute();
			$sql = $conn->prepare("SELECT * FROM Tb_Configuracao WHERE idUsuarioAlteracao = ?");
			$sql ->bind_param("s", $codUsuarioLogado);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$_SESSION['empresaNome'] = $linha['nomeEmpresaCliente'];
			$_SESSION['empresaNum'] = $linha['numero'];
			$_SESSION['empresaCep'] = $linha['cep'];
			$_SESSION['cnpj'] = $linha['cnpj'];
			$_SESSION['endEmpresa'] = $linha['endereco'];
			$_SESSION['bairro'] = $linha['bairro'];
			$_SESSION['cidade'] = $linha['cidade'];
			$_SESSION['estado'] = $linha['estado'];
			$_SESSION['responsavel'] = $linha['nomeResponsavel'];
			$_SESSION['emailEmpresa'] = $linha['eMail'];
			$_SESSION['estado'] = $linha['estado'];
			$_SESSION['tipo'] = $linha['tipo'];
			$_SESSION['nomeFantasia'] = $linha['nomeFantasia'];
			$_SESSION['telEmpresa'] = $linha['telefoneComercial'];
			header("Location:../config.php?dados=OK");
			die();
		}
		else
		{	
			$data = date("Y/m/d");
			$sql = $conn->prepare("UPDATE Tb_Configuracao SET nomeEmpresaCliente = ?, cnpj = ?, endereco = ?, numero = ?, bairro = ?, cidade = ?, estado = ?, cep = ?, nomeResponsavel = ?, eMail = ?, telefoneComercial = ?, tipo = ?, nomeFantasia = ?, dataAlteracao = ?  WHERE idUsuarioAlteracao = ?");
			$sql ->bind_param("sssssssssssssss", $nomeEmpresa, $cnpj, $endereco, $numEmpresa, $bairro, $cidade, $estado, $cep, $nomeResponsavel, $emailEmpresa, $tel, $tipo, $fantasia, $data, $codUsuarioLogado);
			$sql->execute();
			$sql = $conn->prepare("SELECT * FROM Tb_Configuracao WHERE idUsuarioAlteracao = ?");
			$sql ->bind_param("s", $codUsuarioLogado);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$_SESSION['empresaNome'] = $linha['nomeEmpresaCliente'];
			$_SESSION['empresaNum'] = $linha['numero'];
			$_SESSION['empresaCep'] = $linha['cep'];
			$_SESSION['cnpj'] = $linha['cnpj'];
			$_SESSION['endEmpresa'] = $linha['endereco'];
			$_SESSION['bairro'] = $linha['bairro'];
			$_SESSION['cidade'] = $linha['cidade'];
			$_SESSION['estado'] = $linha['estado'];
			$_SESSION['responsavel'] = $linha['nomeResponsavel'];
			$_SESSION['emailEmpresa'] = $linha['eMail'];
			$_SESSION['estado'] = $linha['estado'];
			$_SESSION['tipo'] = $linha['tipo'];
			$_SESSION['nomeFantasia'] = $linha['nomeFantasia'];
			$_SESSION['telEmpresa'] = $linha['telefoneComercial'];
			header("Location:../config.php?dados=OK");
			die();
		}
		

		return 'Sucesso';

		$sql -> close();
		$conn -> close();
		
	}

	function inserirConfSistema($corMenu, $corLogo, $corletrasLogo, $corletrasMenu, $codUsuarioLogado){

		include('../banco/conexao.php');
		$sql = $conn->prepare("SELECT * FROM Tb_Configuracao WHERE idUsuarioAlteracao = ?");
		$sql ->bind_param("s", $codUsuarioLogado);
		$sql->execute();
		$resultado = $sql->get_result();
		$linha = $resultado->fetch_assoc();

		if (empty($linha)) 
		{
			$sql = $conn->prepare("INSERT INTO Tb_Configuracao (corFundoMenu,corFundoLogo,corTxtLogo,corTxtMenu,idUsuarioAlteracao)values(?,?,?,?,?)");
			$sql->bind_param("sssss", $corMenu, $corLogo, $corletrasLogo, $corletrasMenu, $codUsuarioLogado);
			$sql->execute();
			$sql = $conn->prepare("SELECT * FROM Tb_Configuracao WHERE idUsuarioAlteracao = ?");
			$sql ->bind_param("s", $codUsuarioLogado);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$_SESSION['corMenuFundo'] = $linha['corFundoMenu'];
			$_SESSION['corLogoFundo'] = $linha['corFundoLogo'];
			$_SESSION['corLogoTxt'] = $linha['corTxtLogo'];
			$_SESSION['corMenuTxt'] = $linha['corTxtMenu'];
			header("Location:../config.php?dados=OK");	
			die();
		}
		else
		{	
			$sql = $conn->prepare("UPDATE Tb_Configuracao SET corFundoMenu = ?, corFundoLogo = ?, corTxtLogo = ?, corTxtMenu = ? WHERE idUsuarioAlteracao = ?");
			$sql ->bind_param("sssss", $corMenu, $corLogo, $corletrasLogo, $corletrasMenu, $codUsuarioLogado);
			$sql->execute();
			$sql = $conn->prepare("SELECT * FROM Tb_Configuracao WHERE idUsuarioAlteracao = ?");
			$sql ->bind_param("s", $codUsuarioLogado);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$_SESSION['corMenuFundo'] = $linha['corFundoMenu'];
			$_SESSION['corLogoFundo'] = $linha['corFundoLogo'];
			$_SESSION['corLogoTxt'] = $linha['corTxtLogo'];
			$_SESSION['corMenuTxt'] = $linha['corTxtMenu'];
			header("Location:../config.php?dados=OK");
			die();
		}
		

		return 'Sucesso';

		$sql -> close();
		$conn -> close();
	}
?>