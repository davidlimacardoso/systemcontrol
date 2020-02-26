<?php
	require "../email/bibliotecas/PHPMailer/Exception.php";
	require "../email/bibliotecas/PHPMailer/OAuth.php";
	require "../email/bibliotecas/PHPMailer/PHPMailer.php";
	require "../email/bibliotecas/PHPMailer/POP3.php";
	require "../email/bibliotecas/PHPMailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	//$para = $_POST['para'];
	$assunto = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];

	//print_r($_POST);

	if(empty($assunto) || empty($mensagem)) {
		header("Location:../faleConosco.php?campos=erro");
				return false;
			}

	$mail = new PHPMailer(true);
	try {
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
	    $mail->setFrom('leonardomarquesdasilva1@gmail.com', 'Fale Conosco');
	    $mail->addAddress('leonardomarquesdasilva1@gmail.com');     // Add a recipient
	    //$mail->addReplyTo('info@example.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $assunto;
	    $mail->Body    = $mensagem;
	    $mail->AltBody = 'É necessário utilizar um cliente que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

	    $mail->send();
	    //header("Location:../faleConosco.php?email=ok");
	    $response = array("success" => true);
    	echo json_encode($response);
			return false;
	   } catch (Exception $e) {

		//header("Location:../faleConosco.php?dados=erro");
		$response = array("success" => false);
    	echo json_encode($response);
			return false;

	    //alguma lógica que armazene o erro para posterior análise por parte do programador
	}
?>