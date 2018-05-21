<?php  
session_start();
	if(isset($_SESSION['cod'])){
		header("location: view/bankcontrol.php");
	}
require_once("controle/html/head.php");

?>
<body>
	<!-- menu -->
	<?php require_once("controle/html/menu.php"); ?>
	<!-- /menu -->
	<!-- carousel -->
	<div class="sumir aparecer-tablet">
		<div id="carroseelIndex" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carroseelIndex" data-slide-to="0" class="active"></li>
	    <li data-target="#carroseelIndex" data-slide-to="1"></li>
	    <li data-target="#carroseelIndex" data-slide-to="2"></li>
	    <li data-target="#carroseelIndex" data-slide-to="4"></li>
	  </ol>
	  <div class="carousel-inner ">
	    <div class="carousel-item active">
	      <img class="d-block w-100 img-carousel" src="img/compromisso.jpg" alt="compromisso">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100 img-carousel" src="img/dedicação.jpg" alt="dedicação">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100 img-carousel" src="img/trabalho.jpg" alt="trabalho">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100 img-carousel" src="img/frase-1.jpg" alt="É o nosso forte">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carroseelIndex" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carroseelIndex" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	</div>
	<!-- /carousel -->
	<!-- container -->
		<div class="container">
				<div class="aparecer">
					<div class="row">
						<div class="col-md-12">
							<div class="formulario center bg-dark">
								<form action="controle/php/processa.php?type=login" method="post">
									<label>E-Mail</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="material-icons tiny">account_circle</i></div>
										</div>
										<input type="email" name="login" class="form-control" autocomplete="off" required placeholder="exemplo@exemplo.com">
									</div>
									<label>Senha</label>
									<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="material-icons tiny">lock</i></div>
										</div>
										<input type="password" name="senha" class="form-control" autocomplete="off" required placeholder="SuaSenha_90">
									</div>
									<input type="submit" name="enviar" class="btn btn-primary btn-block">
								</form>
							</div>
						</div>
					</div>
				</div>
			<!-- row -->
			<div class="row">
				<!-- grid-4 -->
				<div class="col-md-4">
					<img src="img/seguro.jpg" class="img-link">
					<h5><b>Aqui suas informações estão seguras, com uma equipe que você pode confiar.</b></h5>
				</div>
				<!-- /grid-4 -->
				<!-- grid-4 -->
				<div class="col-md-4">
					<img src="img/ajuda.jpg" class="img-link">
					<h5><b>Com sua ajuda e inscrição iremos lhe ajudar a crescer e também crescer juntos com você.</b></h5>
				</div>
				<!-- /grid-4 -->
				<!-- grid-4 -->
				<div class="col-md-4">
					<img src="img/cancel.jpg" class="img-link">
					<h5><b>Não fique preso, aqui você pode cancelar a sua inscirção quando quiser.</b></h5>
				</div>
				<!-- /grid-4 -->
			</div>
			<!-- /row -->
			<!-- row -->
			<div class="row">
				<!-- grid12 -->
				<div class="col-md-12 bg-warning divisoria">
					<blockquote><h3 style="color: #000;">"A economia significa o poder de repelir o supérfluo no presente, com o fim de assegurar um bem futuro e sobre este aspecto representa o domínio da razão sobre o instinto animal."</h3></blockquote>
					<cite>Thomas Atkinson</cite>
				</div>
				<!-- /grid12 -->
			</div>
			<!-- /row -->
			<!-- row -->
			<div class="row">
				<!-- grid3 -->
				<div class="col-md-3">
					<img src="img/banco.jpg" class="img">
					<br>
					<br>
					<br>
					<br>
					<img src="img/índice.jpeg" class="img">
				</div>
				<!-- /grid3 -->
				<!-- grid5 -->
				<div class="col-md-5">
					<div class="texto">
						<p>
							 Até a data-base de março de 2012, eram armazenadas no banco de dados do SCR as operações dos clientes com responsabilidade total igual ou superior a R$ 5 mil, a vencer e vencidas, e os valores referentes às fianças e aos avais prestados pelas instituições financeiras a seus clientes. A partir da data-base de abril de 2012 esse valor foi reduzido para R$ 1mil, sendo que para cooperativas de crédito e sociedades de crédito ao microempreendedor e à empresa de pequeno porte, o valor muda apenas a partir da data-base de julho de 2012.
						</p>
						<br>
						<p>
Parcela de 77% dos brasileiros já utilizam cartão de crédito, aponta estudo do Serviço de Proteção ao Crédito (SPC Brasil). No entanto, fatia de 72% dos usuários não sabe quanto paga pelos juros no crédito rotativo quando deixa de quitar o valor integral da fatura. Esses dados foram divulgados nesta terça-feira pelo Serviço de Proteção ao Crédito (SPC Brasil), que encomendou uma pesquisa especial para mapear hábitos e comportamentos mais comuns do brasileiro na hora de utilizar as várias opções de crédito disponíveis no mercado.
						</p>
					</div>
				</div>
				<!-- /grid5 -->
				<!-- grid4 -->
				<div class="col-md-4">
					<!-- grid4 -->
					<div class="bg-dark formulario" id="cadastro">
						<h4 style="color:#fff !important;"><b>Cadastre-se agora</b></h4>
						<!-- for --> 
						<form id="formCadastro" autocomplete="off" action="controle/php/processa.php?type=cadastro" method="post">
							<label><b>Nome</b></label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="material-icons tiny">account_circle</i></div>
								</div>
								<input type="text" name="nome" class="form-control" autocomplete="off" required placeholder="Nome (Mínimo 3 Letras)">
							</div>
							<br>
							<label><b>E-Mail</b></label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><b><i class="material-icons tiny">perm_identity</i></b></div>
								</div>
								<input type="email" name="login" class="form-control"  autocomplete="off" required placeholder="exemplo@exemplo.com">
							</div>
							<br>
							 <label><b>Senha</b></label>
						      <div class="input-group mb-2">	       
						        <div class="input-group-prepend">
						          <div class="input-group-text"><i class="material-icons tiny">lock</i></div>
						        </div>
						        <input type="password" class="form-control pass" name="senha" minlength="6" required placeholder="_suaSenhA90(Mínimo 6 Letras)">
						         <div class="input-group-prepend">
						        <div class="input-group-text olho" ><i class="material-icons tiny">remove_red_eye</i></div>
						        </div>
						      </div>
							<br>
							<label><b>Confirmar Senha</b></label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="material-icons tiny">lock</i></div>
								</div>
								<input type="password" name="csenha" class="form-control pass" minlength="6"  autocomplete="off" required placeholder="_suaSenhA90(Mínimo 6 Letras)">
								 <div class="input-group-prepend">
						          <div class="input-group-text olho"><i class="material-icons tiny">remove_red_eye</i></div>
						        </div>
							</div>
							<br>
							<button class="btn btn-primary btn-block">Cadastrar</button>
						</form>
						<!-- /form -->
					</div>
					<!-- /grid-4 -->
				</div>
				<!-- /grid4 -->
			</div>
			<!-- /row -->
		</div>
	<!-- /container -->
	<?php require_once("controle/html/footer.php");  	
		if(isset($_SESSION['conta']) && $_SESSION['conta']=="notExists"){
	echo "<script>
	$.confirm({
            'title'     : 'CONTA INEXISTENTE',
            'message'   : 'ESSA CONTA NÃO EXISTE, DESEJA CADASTRAR AGORA?',
            'buttons'   : {
                'SIM'   : {
                    'class' : 'greenB',
                    'action': function(){
                        window.location=\"#cadastro\";
                    }
                },
                'NÃO'    : {
                    'class' : 'redB',
                    'action': function(){
                    	$.sweetModal({
                    		content: 'TENTE NOVAMENTE E VERIFIQUE SE NÃO HÁ ERROS',
                    		icon:$.sweetModal.ICON_WARNING
                    	});
                    }  
                }
            }
        });
	</script>";
	unset($_SESSION['conta']);
}else if(isset($_SESSION['emailE'])){
	echo "<script>
	$.confirm({
            'title'     : 'EMAIL JÁ CADASTRADO',
            'message'   : 'ESSE EMAIL JA FOI CADASTRADO, DESEJA LOGAR AGORA?',
            'buttons'   : {
                'SIM'   : {
                    'class' : 'greenB',
                    'action': function(){
                        window.location=\"#logar\";
                    }
                },
                'NÃO'    : {
                    'class' : 'redB',
                    'action': function(){
                    	window.location=\"#cadastro\";
                    } 
                }
            }
        });
	</script>";
	unset($_SESSION['emailE']);
}
if(isset($_SESSION['u'])){
	if($_SESSION['u']=="nome"){
		echo "<script>
			$.sweetModal({
                    		content: 'SEU NOME É INVÁLIDO',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
	}else if($_SESSION['u']=="log"){
		echo "<script>
			$.sweetModal({
                    		content: 'SEU E-MAIL É INVÁLIDO',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
	}else if($_SESSION['u']=="senha"){
		echo "<script>
			$.sweetModal({
                    		content: 'SUA SENHA É MUITO CURTA',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
	}else if($_SESSION['u']=="csenha"){
		echo "<script>
			$.sweetModal({
                    		content: 'SUA VERIFICAÇÃO DE SENHA ESTÁ INCORRETA',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
	}
	unset($_SESSION['u']);
}
?>
</body>
</html>
