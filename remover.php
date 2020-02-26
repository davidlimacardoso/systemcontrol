<?php
	session_start();

	if (isset($_GET['remover']) && $_GET['remover'] =="carrinho")
	{
		$id = $_GET['idProduto'];
		unset($_SESSION['itens'][$id]);
		echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=vendas.php'/>";

	}

?>