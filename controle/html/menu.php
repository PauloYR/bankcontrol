<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <a class="navbar-brand" href="../"><h2>BANKCONTROL</h2></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      	<?php  
			if(isset($_SESSION['cod'])){
				if(!isset($_SESSION['cod'])){
					header("location: ../");
				}
				echo " <ul class=\"navbar-nav mr-auto mt-2 mt-lg-0 itens\" >
							<a href=\"#\"><li class=\"nav-item li\"><h3><b>{$_SESSION['nome']}</b></h3></li></a>
							<a href=\"configConta.php\"><li class=\"nav-item li\"><h6><b>Configurações de Conta</b></h6></li></a>
							<a href=\"Sobre.php\"><li class=\"nav-item li\"><h6><b>Sobre</b></h6></li></a>
							<a href=\"../controle/php/processa.php?type=sair\"><li class=\"nav-item li\"><h6><b>Sair</b></h6></li></a>
						";
					echo "</ul>";
			}else{
				echo "
				<div class=\"form sumir\">
					<form class=\"form-inline my-2 my-lg-0\" action=\"controle/php/processa.php?type=login\" method=\"post\" >
							<label><b>E-mail</b></label>
							<input type=\"email\" name=\"login\" class=\"form-control mr-sm-2\" required placeholder=\"exemplo@exemplo.com\">
							<label><b>Senha</b></label>
							<input type=\"password\" name=\"senha\" class=\"form-control mr-sm-2\" required placeholder=\"sua_senHa95\">
							<input type=\"submit\" name=\"enviar\" value=\"entrar\" class=\"btn btn-primary btn-outline-success my-2 my-sm-0\" >
						";
							if(isset($_GET['pag'])){
								echo "<a style=\"margin-left:260px;\" href=\"#\">Esqueci a senha</a>";
							}else{
								echo "<a style=\"margin-left:260px;\" href=\"view/recSenha.php?pag\">Esqueci a senha</a>";
							}
		echo"			</form></div>
				";
			}
		?>

  </div>
</nav>