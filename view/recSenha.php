<?php  
	session_start();
	require_once("../controle/html/head.php");
?>
<body>
	<?php require_once("../controle/html/menu.php"); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="center">Esqueceu a senha?</h1>
				<div class="formulario center bg-dark">
						<form action="../controle/php/processa.php?type=recuperarSenha" method="post">
						<label><b>NOS INFORME SEU E-MAIL</b></label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="material-icons tiny">account_circle</i></div>
							</div>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="exemplo@exemplo.com">
						</div>
						<label><b>NOS INFORME SEU CÓDIGO DE RECUPERAÇÃO</b></label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="material-icons tiny">account_circle</i></div>
							</div>
							<input type="text" name="cod" class="form-control" autocomplete="off" placeholder="000-ABC">
						</div>
						<button class="btn btn-block btn-primary">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php require_once("../controle/html/footer.php"); 
	if(isset($_SESSION['emailE'])){
		echo "<script>$.sweetModal({
                    		content: 'E-MAIL OU CÓDIGO DIGITADO NÃO EXISTE',
                    		icon:$.sweetModal.ICON_ERROR
                    	});</script>";
		unset($_SESSION['emailE']);
	}
	?>
</body>
</html>