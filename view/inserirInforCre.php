<?php  session_start();
	if(!isset($_SESSION['cod'])){
		echo "<script>window.history.back();</script>";
	}
	require_once("../controle/php/classes/conexao.php");
	$bd=new Conectar();
	$sql="SELECT * FROM icredito INNER JOIN conta ON id_cliente=id WHERE conta.id=:id;";
	$select=$bd->getCon()->prepare($sql);
	$select->bindParam("id", $_SESSION['id']);
	$select->execute();
	$obj=$select->fetch(PDO::FETCH_OBJ);
	if($select->rowCount()>0){
		require_once("../controle/html/head.php");
		echo "<body>";
		require_once("../controle/html/menu.php");
		echo "<div class=\"container\">
				<h1>Aqui está suas informações de Credito</h1>
					<div class=\"row\">
						<div class=\"col-md-6\">
							<div class=\"sub_container bg-dark\">
								<h3><b>Cartao: {$obj->Cartao}</b></h3>
								<br>
								<h3><b>Numero do Cartao: {$obj->num_cartao}</b></h3>
								<br>
								<h3><b>Data de Vencimento: {$obj->data_vencimento}</b></h3>
								<br>
								<h3><b>Limite: R$ {$obj->limite}</b></h3>
								<br>
								<br>
							</div>
						</div>
						<div class=\"col-md-6\">
							<div class=\"sub_container bg-dark\">
							<br><br>
								<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadoscart\" method=\"post\">
								<input type=\"text\" class=\"form-control input-edit\" name=\"Cartao\" placeholder=\"MODIFICAR NOME DO CARTAO\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
							</form>
							<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadosncart\" method=\"post\">
								<input type=\"text\" class=\"form-control input-edit\" name=\"nCartao\" placeholder=\"MODIFICAR NUMERO DO CARTAO\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
							</form>
							<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadosven\" method=\"post\">
								<input type=\"text\" class=\"form-control input-edit\" name=\"dVenc\" placeholder=\"MODIFICAR DATA DE VENCIMENTO\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
							</form>
					
							<form class=\"form-inline\" action=\"../controle/php/processa.php?type=dadoslimi\" method=\"post\">
								<input type=\"number\" class=\"form-control input-edit\" name=\"dLim\" placeholder=\"MODIFICAR LIMITE\"><input type=\"submit\" value=\"Enviar\" class=\"btn btn-primary btn-edit\">
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
			<h1>Inserir Informações de Credito</h1>
			<h5><b>Olá {$_SESSION['nome']}, aqui é a página onde você irá colocar suas informações de credito, lembre-se que as suas informações pessoais estão sempre seguras conosco, e caso você deseje retirar essa informação do site, é só ir em configuraçóes de conta, que fica no menu acima.</b></h5>
			<div class=\"row\">   
				<div class=\"col-md-12\">
					 <div class=\"formulario center bg-dark\"> 
					 	<form action=\"../controle/php/processa.php?type=icred\" method=\"post\">
					 		<label><b>DIGITE O NOME DO SEU CARTAO</b></label>
					 			<div class=\"input-group mb-2\">
					 				<div class=\"input-group-prepend\">
					 					<div class=\"input-group-text\"><i class=\"material-icons tiny\">credit_card</i></div>
					 				</div>
					 				<input type=\"text\" name=\"cart\" class=\"form-control\" placeholder=\"Nome do cartao\">
					 			</div>
					 		<label><b>DIGITE O NUMERO DO SEU CARTAO</b></label>
					 			<div class=\"input-group mb-2\">
					 				<div class=\"input-group-prepend\">
					 					<div class=\"input-group-text\"><i class=\"material-icons tiny\">credit_card</i></div>
					 				</div>
					 				<input type=\"text\" name=\"ncart\" class=\"form-control\" placeholder=\"Numero do cartao\">
					 			</div>
					 		<label><b>DIGITE A DATA DE VENCIMENTO</b></label>
					 			<div class=\"input-group mb-2\">
					 				<div class=\"input-group-prepend\">
					 					<div class=\"input-group-text\"><i class=\"material-icons\">account_balance</i></div>
					 				</div>
					 				<input type=\"text\" name=\"ven\" class=\"form-control\" placeholder=\"11/03/1257\">
					 			</div>
					 			<label><b>DIGITE O Limite do Cartao</b></label>
					 			<div class=\"input-group mb-2\">
					 				<div class=\"input-group-prepend\">
					 					<div class=\"input-group-text\"><i class=\"material-icons\">attach_money</i></div>
					 				</div>
					 				<input type=\"text\" name=\"limi\" class=\"form-control\" placeholder=\"Limite do Cartao\">
					 			</div>
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
	
?>
		
