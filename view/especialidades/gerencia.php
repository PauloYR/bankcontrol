<?php  
	session_start();
	require_once("../../controle/html/head.php");
?>
<body>
	<?php require_once("../../controle/html/menu.php"); ?>
	<div class="container">
		<div class="sub_container bg-dark">
			<div class="row">
				<div class="col-md-6">
					<h2><b>O que Desejas Fazer?</b></h2>
					<?php  
					if($_SESSION['tipo']!="G" && $_SESSION['tipo']!="F"){
						echo "<h3 class=\"link_ajax\">Verificar Contas</h3>";
						echo "<h3 class=\"link_ajax\">Verificar Informações Bancárias</h3>";
						echo "<h3 class=\"link_ajax\">Verificar Informações de Créditos</h3>";
						echo "<h3 class=\"link_ajax\">Verificar Contas</h3>";
					}else{
						echo "<h3 class=\"link_ajax\">Verificar Contas</h3>";
						echo "<h3 class=\"link_ajax\">Verificar Contas</h3>";
						echo "<h3 class=\"link_ajax\">Verificar Contas</h3>";
					}

					?>
					<h3></h3>
				</div>
				<div class="col-md-6">
					<div id="local">
						<h2><b>Dados Pessoais</b></h2>
						<?php
						echo "
								<br><br>
							  <h3><b>Código: {$_SESSION['cod']}</b></h3>
							  <h3><b>Nome: {$_SESSION['nome']}</b></h3>
							  <h3><b>ID: #{$_SESSION['id']}</b></h3>";
							  if($_SESSION['tipo']=="G"){
							  	echo "<h3><b>Cargo: Gerente</b></h3>";
							  }else if($_SESSION['tipo']=="A"){
							  	echo "<h3><b>Cargo: Administrador</b></h3>";
							  }else if($_SESSION['tipo']=="F"){
							  	echo "<h3><b>Cargo: Funcionário</b></h3>";
							  }
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- /sub_container -->
	</div>
	<!-- /container -->
	<?php require_once("../../controle/html/footer.php"); ?>
</body>