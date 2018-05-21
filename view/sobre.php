<?php session_start();
	if(!isset($_SESSION['cod'])){
		header("location: ../");
	}
	require_once("../controle/html/head.php");
 ?>
 <body>
 	<?php  require_once("../controle/html/menu.php");?>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-6">
 				<h1>Sobre</h1>
			 		<p>
			 			<b>
			 				Este é um site de controle financeiro, criado por um grupo de estudantes. <br>
			 				O Site tem como objetivo ajudar o usuário à ter um controle melhor sobre o seu dinheiro,
			 				facilitando sua vida.<br>
			 			</b>
			 		</p>
			 		<h1>Criadores</h1>
			 		<p>
			 			<b>
			 				Este site conta com uma equipe de estudantes de informática da Escola Estadual de Educação	 				Profissional Paulo Petrola.
			 			</b>
			 				<h1>Integrantes</h1>
			 			<b>
			 				Samuel Lucas -  <i>BD, Consulta de Balanceamento e inserção de dados de Créditos</i><br>
			 				Paulo Vitor -  <i>Atualização de Dados</i>,<br>
			 				Antônio Victor -  <i>Página 'Home'</i>,<br>
			 				Marcelo Filho - <i>Configurações da Conta</i>,<br>
			 				João Lucas - <i>Página 'Index'	 e Inserção de dados bancários</i><br>
			 			</b>
			 		</p>
 			</div>
 			<div class="col-md-6 sobre">
 				<p>Data de Início do projeto: 18 de Março de 2018</p>
 				<p>Data de apresentação do projeto: dias 04 e 06 de Abril de 2018</p>
 				<p>Framework: Bootstrap</p>
 				<p>Plugins Utilizados: <br>
 					<b>
 						1 - ... <br>
 						2 - ... <br>
 						3 - ... <br>
 						4 - ... <br>
 					</b>
 				</p>
 			</div>
 		</div>
 	</div>
 	<?php require_once("../controle/html/footer.php"); ?>	
 </body>
</htlm>