<?php
#session_start();
	class Email{
		public function __construct(){
			require_once("../../phpmailer/PHPMailerAutoload.php");
 
			// Inicia a classe PHPMailer
			$mail = new PHPMailerAutoload();
			 
			// Define os dados do servidor e tipo de conexão
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->IsSMTP(); // Define que a mensagem será SMTP
			 
			try {
			     $mail->Host = 'smtp.localhost/bankcontrol.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
			     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
			     $mail->Port       = 587; //  Usar 587 porta SMTP
			     $mail->Username = 'bankcontrol2018@gmail.com'; // Usuário do servidor SMTP (endereço de email)
			     $mail->Password = 'adminb4nk'; // Senha do servidor SMTP (senha do email usado)
			 
			     //Define o remetente
			     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
			     $mail->SetFrom('bankcontrol2018@gmail.com', 'BANKCONTROL'); //Seu e-mail
			     $mail->AddReplyTo('bankcontrol2018@gmail.com', 'BANKCONTROL'); //Seu e-mail
			     $mail->Subject = 'CÓDIGO DE RECUPERAÇÃO DE CONTA';//Assunto do e-mail
			 
			 
			     //Define os destinatário(s)
			     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			     $mail->AddAddress($_SESSION['login'], $_SESSION['nome']);
			 
			     //Campos abaixo são opcionais 
			     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
			     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
			     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
			 
			 
			     //Define o corpo do email
			     $mail->MsgHTML('AQUI ESTÁ O SEU CÓDIGO DE RECUPERAÇÃO DE SENHA: {$_SESSION[\'cod\']}'); 
			 
			     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
			     //$mail->MsgHTML(file_get_contents('arquivo.html'));
			 
			     $mail->Send();
			     echo "Mensagem enviada com sucesso</p>\n";
			 
			    //caso apresente algum erro é apresentado abaixo com essa exceção.
			    }catch (phpmailerException $e) {
			      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
			}
		}
	}
 ?>	