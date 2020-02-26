<?php

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	//$cpf = $_POST["cpf"];
	$tipo = $_POST["tipo"];
	$codCompra = $_POST["codCompra"];
	$codLogado = $_SESSION['cod'];
	//var_dump($cpf);
	//var_dump($tipo);
	//var_dump($codLogado);
	//var_dump($_SESSION['dados']);


	date_default_timezone_set("America/Sao_Paulo");
	$data = date('Y-m-d H:i');

	include('../banco/conexao.php');
	foreach ($_SESSION['dados'] as $produtos) 
	{
	try{

			$sql = $conn->prepare("INSERT INTO Tb_Venda (codigoVenda,dataVenda,idProduto, quantidadeVenda,precoVendido,idUsuario,tipoVenda)values(?,?,?,?,?,?,?)");
			$sql->bind_param("sssssss",$codCompra, $data, $produtos['idProduto'], $produtos['quantidade'], $produtos['preco'], $codLogado, $tipo);
			$sql->execute();

			$sql = $conn->prepare("SELECT last_insert_id()");
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$ultimaVenda = $linha['last_insert_id()'];

			$sql = $conn->prepare("SELECT quantidadeVenda FROM Tb_Venda WHERE idProduto = ? AND idVenda = ?");
			$sql->bind_param("ss", $produtos['idProduto'],$ultimaVenda);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$quantVendidade = $linha['quantidadeVenda'];

			$sql = $conn->prepare("SELECT quantidadeTotal FROM Tb_Produto WHERE idProduto = ?");
			$sql->bind_param("s", $produtos['idProduto']);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$quantidadeTotal = $linha['quantidadeTotal'];

			$quant = $quantidadeTotal - $quantVendidade;
			
			$sql = $conn->prepare ("UPDATE Tb_Produto SET quantidadeTotal = ? WHERE idProduto = ?");
			$sql->bind_param("ss",$quant, $produtos['idProduto']);
			$sql->execute();

			$sql = $conn->prepare("SELECT MIN(Tb_Lote.validade) as validadeMin from Tb_Lote
			inner join Tb_Produto ON Tb_Produto.idProduto = Tb_Lote.idProduto
			WHERE Tb_Produto.idProduto = ?");
			$sql->bind_param("s", $produtos['idProduto']);
			$sql->execute();
			$resultado = $sql->get_result();
			$linha = $resultado->fetch_assoc();
			$validadeMin = $linha['validadeMin'];

			$sql = $conn->prepare ("UPDATE Tb_Lote 
			inner join Tb_Produto ON Tb_Produto.idProduto = Tb_Lote.idProduto
			SET quantidadeLote = ?  WHERE Tb_Produto.idProduto = ? AND validade = ?");
			$sql->bind_param("sss",$quant, $produtos['idProduto'],$validadeMin);
			$sql->execute();
			header("Location:../vendas.php");

			unset($_SESSION['itens']);
			$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'>Venda realizada com sucesso! </div>";

		} catch (Exception $e) {
			echo $e;
			$_SESSION['msgCad'] = "<div class='text-center bg-danger mb-3 p-2 h5' id='salvo'> Erro ao registrar venda </div>";
			header("Location:../vendas.php");
		}
	}
			
			
			$sql -> close();
			$conn -> close();

			
    		die();
?>