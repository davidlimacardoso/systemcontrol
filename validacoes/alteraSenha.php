<?php

	require "../email/bibliotecas/PHPMailer/Exception.php";
	require "../email/bibliotecas/PHPMailer/OAuth.php";
	require "../email/bibliotecas/PHPMailer/PHPMailer.php";
	require "../email/bibliotecas/PHPMailer/POP3.php";
	require "../email/bibliotecas/PHPMailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include('funcoes.php');
	validarPost("../index.php");

	session_start();

	date_default_timezone_set("America/Sao_Paulo");
	$data = date('Y-m-d');
	$datalimite = date('d/m/Y', strtotime($data));
	$eMail = $_POST["emailSenha"];

	if(empty($eMail)){
		die();
	}

	
	
		include('../banco/conexao.php');
		$sql = $conn->prepare("SELECT nomeUsuario,eMail FROM Tb_Usuario WHERE (email = ? OR nickname = ?) AND ativo = 1");
		$sql->bind_param("ss", $eMail, $eMail);
		$sql->execute();

		$resultado = $sql->get_result();
		$linha = $resultado->fetch_assoc();
		$nome = explode(" ", $linha['nomeUsuario']);
		$_SESSION['p_nome'] = $nome[0];	
		$_SESSION['email'] = $linha['eMail'];
		
		if (empty($linha)) 
		{
			die();	
		}
		else
		{	

		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';
		try{
			//Server settings
		    $mail->SMTPDebug = false;  // Enable verbose debug output
		    $mail->isSMTP();           // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;    // Enable SMTP authentication
		    $mail->Username = 'leonardomarquesdasilva1@gmail.com'; // SMTP username
		    $mail->Password = 'Yasmim08@';   // SMTP password
		    $mail->SMTPSecure = 'tls';      // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;       // TCP port to connect to

		    //Recipients
		    $mail->setFrom('leonardomarquesdasilva1@gmail.com', 'SYSTEM CONTROL');
		    $mail->addAddress($eMail);     // Add a recipient
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Solicitacao de redefinicao de senha';
		    $mail->Body    = 'Ola '. $_SESSION['p_nome'] .'<br> Este é um e-mail de recuperação da senha de usuário do SYSTEM CONTROL.<br> Clique no link abaixo e renove sua senha <br> <a class="h6" href="http://localhost/TCC/trocandosuasenha.php?seuemail='.$eMail.'&data='.$data.'">Reconfigurar minha senha </a><br>*link valido somente para a data de '.$datalimite.' até ás 23:59';
		    $mail->AltBody = 'É necessário utilizar um cliente que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

		    $mail->send();

		    $response = array("success" => true);
    		echo json_encode($response);
			return false;
			$sql -> close();
			$conn -> close();
		
		} catch (Exception $e) {

			$_SESSION['msgCad'] = "<div class='text-center bg-success mb-3 p-2 h5' id='salvo'>$e</div>";
			die();
			
			}

			
		}	

?>