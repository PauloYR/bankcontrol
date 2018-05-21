<!DOCTYPE html>
<html>
<?php  session_start();
if (!isset($_SESSION ['id'])) {
	header('location:../');
}
require_once("../controle/html/head.php");?>
<body>
	<?php require_once("../controle/html/menu.php"); ?>
	<div class="container">
		<h1>Editar dados da conta</h1>	
		<div class="row">
				<div class="col-md-6">
					<?php 
							echo "	<br>
									<h3 class=\"preto\"><b>NOME: {$_SESSION['nome']}</b></h3><br>
									<h3 class=\"preto\"><b>EMAIL: {$_SESSION['login']} </b></h3><br>
									<h3 class=\"preto\"><b>CÓDIGO:{$_SESSION['cod']}</b></h3><br>
									<h3 class=\"preto\"><b>TELEFONE: {$_SESSION['tel']}</b></h3><br>
									<h3 class=\"preto\"><b>CPF: {$_SESSION['cpf']}</b></h3><br>
							";
					 ?>
				</div>
				<div class="col-md-6">
						<div class="formulario center bg-dark">	
						<form action="../controle/php/processaConfigConta.php?form=conta" method="post">
							<?php 
							echo "<label><b>NOME</b></label><br>
							<div class=\"input-group mb-2\">
								<div class=\"input-group-prepend\">
									<div class=\"input-group-text\"><i class=\"material-icons tiny\">face</i></div>
								</div>
									<input required type=\"text\" value=\"{$_SESSION['nome']}\" name=\"nome\" class=\"form-control\">
							</div>
							<label><b>EMAIL</b></label><br>
							<div class=\"input-group mb-2\">
								<div class=\"input-group-prepend\">
									<div class=\"input-group-text\"><i class=\"material-icons tiny\">face</i></div>
								</div>
									<input required type=\"email\" value=\"{$_SESSION['login']}\" name=\"login\" class=\"form-control\">
							</div>
							<label><b>SENHA</b></label><br>
							<div class=\"input-group mb-2\">
								<div class=\"input-group-prepend\">
									<div class=\"input-group-text\"><i class=\"material-icons tiny\">face</i></div>
								</div>
									<input required type=\"password\" value=\"{$_SESSION['senha']}\" name=\"senha\" class=\"form-control\">
							</div>
							<label><b>TELEFONE</b></label><br>
							<div class=\"input-group mb-2\">
								<div class=\"input-group-prepend\">
									<div class=\"input-group-text\"><i class=\"material-icons tiny\">face</i></div>
								</div>
									<input required type=\"text\" value=\"{$_SESSION['tel']}\" name=\"tele\" class=\"form-control\">
							</div>
							<label><b>CPF</b></label><br>
							<div class=\"input-group mb-2\">
								<div class=\"input-group-prepend\">
									<div class=\"input-group-text\"><i class=\"material-icons tiny\">face</i></div>
								</div>
									<input required type=\"text\" value=\"{$_SESSION['cpf']}\" name=\"cpf\" class=\"form-control\">
							</div>";
							 ?>
							 <br>
							<input type="submit" class="btn btn-primary btn-block" value="Editar">
						</form>
						</div>
					</div>
					<div class="center-lg inline">
						<a href="../controle/php/processaConfigConta.php?form=rmconta"><button  type="button" class="btn btn-danger btn_conta">Remover Conta</button></a>
						<a href="../controle/php/processaConfigConta.php?form=ban"><button  type="button" class="btn btn-danger btn_conta">Remover Dados bancárias</button></a>
						<a href="../controle/php/processaConfigConta.php?form=cre" ><button  type="button" class="btn btn-danger btn_conta">Remover Dados de crédito</button></a>
					</div>
						<!-- <div class="row">
							<div class="col-md-4">
								<a href="../controle/php/processaConfigConta.php?form=rmconta" class="btn_conta"><button  type="button" class="btn btn-danger">Remover Conta</button></a>
							</div>
							<div class="col-md-4">
								<a href="../controle/php/processaConfigConta.php?form=ban" class="btn_conta"><button  type="button" class="btn btn-danger">Remover Dados bancárias</button></a>
							</div>
							<div class="col-md-4">
								<a href="../controle/php/processaConfigConta.php?form=cre" class="btn_conta"><button  type="button" class="btn btn-danger center">Remover Dados de crédito</button></a>
							</div>
						</div> -->
				
		</div>
	</div>
	<?php require_once("../controle/html/footer.php");
	if(isset($_SESSION['exist'])){
			echo "<script>
			$.sweetModal({
                    		content: 'VOCÊ NÃO PODE USAR ESSE E-MAIL',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
		unset($_SESSION['exist']);
	}
	
	if(isset($_SESSION['m2'])){
			echo "<script>
			$.sweetModal({
                    		content: 'ESTE CPF JÁ ESTÁ SENDO USADO MAIS DE DUAS VEZES',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
		unset($_SESSION['m2']);
			}
	 ?>
</body>
</html>