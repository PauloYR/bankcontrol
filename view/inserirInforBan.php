<?php  session_start();
	if(!isset($_SESSION['cod'])){
		echo "<script>window.history.back();</script>";
	}
	require_once("../controle/php/classes/conexao.php");
	$bd=new Conectar();
	$sql="SELECT * FROM ibancarias INNER JOIN conta ON ibancarias.id_cliente=conta.id WHERE id_cliente=:id;";
	$select=$bd->getCon()->prepare($sql);
	$select->bindParam("id", $_SESSION['id']);
	$select->execute();
	$obj=$select->fetch(PDO::FETCH_OBJ);
	if($select->rowCount()>0){
		if($obj->tipo=="c"){
		$conta="Corrente";
		}else{
			$conta="Poupança";
		}
		require_once("../controle/html/head.php");
		echo "<body>";
		require_once("../controle/html/menu.php");
		echo "<div class=\"container\">
				<h1>Aqui está suas informações Bancárias</h1>
					<div class=\"row\">
						<div class=\"col-md-6\">
							<div class=\"sub_container bg-dark\">
								<h5><b>Conta $conta</b></h5>
								<h3><b>Nome do banco: {$obj->Nomebanco}</b></h3>
								<br>
								<h3><b>Número da conta: {$obj->nmrConta}</b></h3>
								<br>
								<h3><b>Último depósito: R$ {$obj->Deposito}</b></h3>
								<br>
								<h3><b>Último saque: R$ {$obj->Saque}</b></h3>
								<br>
								<br>
								<h3 class=\"titulo\"><b>R$ {$obj->Saldo}</b></h3>
							</div>
						</div>
						<div class=\"col-md-6\">
							<div class=\"sub_container bg-dark\">
							<br><br>
								<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadosnome\" method=\"post\">
								<input type=\"text\" class=\"form-control input-edit\" name=\"nomeB\" required placeholder=\"MODIFICAR NOME DO BANCO\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
							</form>
							<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadosnmr\" method=\"post\">
								<input type=\"text\" class=\"form-control input-edit\" name=\"nmrC\" required placeholder=\"MODIFICAR NÚMERO DA CONTA\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
							</form>
					
							<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadosdep\" method=\"post\">
								<input type=\"number\" class=\"form-control input-edit\" name=\"deposito\" required placeholder=\"MODIFICAR DEPÓSITO\" min=\"0\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
							</form>
					
							<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadossaque\" method=\"post\">
								<input type=\"number\" class=\"form-control input-edit\" name=\"saque\" required placeholder=\"MODIFICAR SAQUE\" min=\"0\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
							</form>
							</div>
						</div>
					</div>
			 	 </div>";
		require_once("../controle/html/footer.php");
		echo "</body>";
	}else{
		require_once("../controle/html/head.php");
		echo "<body>";
		require_once("../controle/html/menu.php");
		echo "
		<div class=\"container\">
			<h1>Inserir Informções Bancárias</h1>
			<h5><b>Olá {$_SESSION['nome']}, aqui é a página onde você irá colocar suas informações bancárias, lembre-se que as suas informações pessoais estão sempre seguras conosco, e caso você deseje retirar essa informação do site, é só ir em configuraçóes de conta, que fica no menú acima.</b></h5>
			<div class=\"row\">   
				<div class=\"col-md-12\">
					 <div class=\"formulario center bg-dark\"> 
					 	<form action=\"../controle/php/processa.php?type=ibanco\" method=\"post\">
					 		<label><b>DIGITE O NOME DE SUA AGENCIA BANCÁRIA</b></label>
					 			<div class=\"input-group mb-2\">
					 				<div class=\"input-group-prepend\">
					 					<div class=\"input-group-text\"><i class=\"material-icons tiny\">account_balance</i></div>
					 				</div>
					 				<input required type=\"text\" name=\"nomeBanco\" class=\"form-control\" placeholder=\"Nome do Banco\">
					 			</div>
					 		<label><b>DIGITE O NÚMERO DA CONTA</b></label>
					 			<div class=\"input-group mb-2\">
					 				<div class=\"input-group-prepend\">
					 					<div class=\"input-group-text\"><i class=\"material-icons\">attach_money</i></div>
					 				</div>
					 				<input required type=\"text\" name=\"nmrConta\" class=\"form-control\" placeholder=\"Nº da conta\">
					 			</div>
					 			<label><b>DIGITE O SEU SALDO ATUAL DA CONTA</b></label>
					 			<div class=\"input-group mb-2\">
					 				<div class=\"input-group-prepend\">
					 					<div class=\"input-group-text\"><i class=\"material-icons\">attach_money</i></div>
					 				</div>
					 				<input required type=\"text\" name=\"saldo\" class=\"form-control dinheiro\" placeholder=\"Saldo Atual\" data-thousands=\".\" data-decimal=\",\">
					 			</div>
					 			<label><b>NOS INFORME O TIPO DA CONTA</b></label>
					 			<br>
					 			<div class=\"form-check form-check-inline\">
								  <input class=\"form-check-input\" required type=\"radio\" name=\"conta\" id=\"pop\" value=\"p\">
								  <label class=\"form-check-label\" for=\"pop\"><b>Conta Poupança</b></label>
								</div>
								<div class=\"form-check form-check-inline\">
								  <input class=\"form-check-input\" required type=\"radio\" name=\"conta\" id=\"inlineRadio2\" value=\"c\">
								  <label class=\"form-check-label\" for=\"inlineRadio2\"><b>Conta Corrente</b></label>
								</div>
					 			<br>
					 			<br>
					 			<button class=\"btn btn-primary btn-block\">IR</button>
					 	</form>
					 </div>
				</div>
			</div>
		</div>
		";
		require_once("../controle/html/footer.php");
		echo "</body>";
	}
	if(isset($_SESSION['eb'])){
		if($_SESSION['eb']=="nome"){
			echo "<script>
				$.sweetModal({
					content: 'O NOME DO BANCO É INVÁLIDO',
					icon: $.sweetModal.ICON_ERROR
				});
			</script>";
		}else{
			echo "<script>
				$.sweetModal({
					content: 'O NÚMERO DA CONTA É INVÁLIDO',
					icon: $.sweetModal.ICON_ERROR
				});
			</script>";
		}
		unset($_SESSION['eb']);
	}
?>
		
