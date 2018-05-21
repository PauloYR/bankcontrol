<?php 
session_start();
require_once("../../phpmailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
try {
$mail->SMTPDebug = false;
$mail->Port = 25;
$mail->Host = "192.185.211.2";
$mail->SMTPAuth = true;

$mail->Username = "localhost/bankcontrol";
$mail->Password = "";
$mail->FrontName = "Lucas Nascimento";
$mail->setFrom ("localhost", "{$dadoT->nome}");
$mail->addAddress("{$_SESSION['login']}","{$_SESSION['nome']}");
$mail->Subject = "Confirmar Email";
$mail->Body = "<p>AQUI ESTÁ SEU CÓDIGO, CASO ESQUEÇA SUA SENHA: <strong>{$_SESSION['cod']}</strong></p>";
$mail->isHTML(true);
$mail->Charset = "utf-8";

if (!$mail->Send()) {
	echo "erro";
}else{
	echo "mensagem enviada";
	header("location:../../");
}
  }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
 ?>
