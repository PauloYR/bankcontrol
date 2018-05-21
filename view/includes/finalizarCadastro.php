<?php
	// head
require_once("../controle/html/head.php");
	// /head
echo "<body>
		<div class=\"container\">
			<div class=\"caixa bg-warning\"><h1>Finalizar Cadastro</h1></div>
			<h5><b>{$_SESSION['nome']}	, você ainda não terminou seu cadastro, se você deseja acessar a página de controle de dinheiro do BANKCONTROL você terá que nos passar as informações a seguir:</b></h5>
			<br>
			<div class=\"caixa-formulario bg-dark\">
				<form method=\"post\" action=\"../controle/php/processa.php?type=confirmacao\">
					<label>SEU CÓDIGO</label>
					<h4><b>{$_SESSION['cod']}</b></h4>
					<label><b>Nos informe seu número de Telefone</b></label>
					<br>
					<input type=\"text\" name=\"telefone\" placeholder=\"(00)0000-0000\" class=\"form-control input\"  OnKeyPress=\"formatar('## ####-####', this)\">
					<br>
					<label><b>Nos informe seu CPF</b></label>
					<br>
					<input type=\"text\" name=\"cpf\" class=\"form-control input\" placeholder=\"000.000.000-00\"  OnKeyPress=\"formatar('###.###.###-##', this)\">
					<br>
					<br>
					<button class=\"btn btn-primary\">Confirmar</button>
				</form>
			</div>
		</div>
		<br><br>
	</body>
</html>";
if(isset($_SESSION['cpf2'])){
	echo "<script>$.sweetModal({
		content: 'ESTE CPF JA FOI CADASTRADO 2 VEZES, TENTE OUTRO CPF',
		icon: $.sweetModal.ICON_ERROR
	});</script>";
	unset($_SESSION['cpf2']);
}
?>
