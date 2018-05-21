<?php
	session_start();
	if(!isset($_SESSION['cod'])){
		header("location: ../");
	}else{
		require_once("../controle/php/classes/conexao.php");
		$bd=new Conectar();
		$sql="SELECT * FROM conta WHERE cod=:cod";
		$select=$bd->getCon()->prepare($sql);
		$select->bindParam("cod", $_SESSION['cod']);
		$select->execute();
		$mostrar=$select->fetch(PDO::FETCH_OBJ);
		$lembr="SELECT * FROM despesas WHERE id_cliente=:id;";
		$lembr=$bd->getCon()->prepare($lembr);
		$lembr->bindParam("id", $_SESSION['id']);
		$lembr->execute();
		$objLem=$lembr->fetchAll(PDO::FETCH_OBJ);
		$selectB="SELECT * FROM balanco WHERE id_cliente=:id;";
		$exec=$bd->getCon()->prepare($selectB);
		$exec->bindParam("id", $_SESSION['id']);
		$exec->execute();
		$obj=$exec->fetch(PDO::FETCH_OBJ);  
		if($mostrar->cpf==""&&$mostrar->telefone==""){
			require_once("includes/finalizarCadastro.php");
		}else{
			require_once("../controle/html/head.php");
			echo "<body>";
					require_once("../controle/html/menu.php");
					echo "<div class=\"container\">
						<div class=\"row\">
							<div class=\"col-md-8\">
								<div class=\"conteudo\">
									<h2 class=\"preto\">PÁGINA INICIAL</h2>
									<hr>
									<div class=\"bg-warning titulo-simples center\"><b>Saldo Mensal:</b></div>
									<div class=\"responsive\">
										<h1 class=\"saldo center-text\"><b>R$"; 
										if($exec->rowCount()>0){
											if($obj->tipo=="Mensal"){
												echo"{$obj->balanco}";
											}else{
												echo "00,00";
											}
										}else{
											echo "00,00";
										}
										echo "</b></h1>
									</div>
									<a href=\"pv.php?s4ld0#at\"><button class=\"btn btn-warning min btn_salario\">Modificar Salário</button></a>
									<!-- /center -->
									<hr>
									<div class=\"row\">
										<div class=\"col-md-12\">
											<a href=\"pv.php\"><button class=\"btn btn-primary btn-block\"><b>Balanceamento e Despesas</b></button></a>
										</div>
									</div>
									<!-- /row -->
									<hr>
									<h2><b>INSERIR INFORMAÇÕES:</b></h2>
									<div class=\"row\">
										<div class=\"col-md-6\">
											<a href=\"inserirInforCre.php\">
												<img src=\"../img/creditos.jpg\" class=\"img-link\">
											</a>
											<p class=\"center-text\"><b>Informações de Crédito</b></p>
										</div>
										<!-- /col-md-6 -->
										<div class=\"col-md-6\">
											<a href=\"inserirInforBan.php\">
												<img src=\"../img/bancarias.jpeg\" class=\"img-link\">
											</a>
											<p class=\"center-text\"><b>Informações Bancárias</b></p>
										</div>
										<!-- /col-md-6 -->
									</div>
									<!-- /row -->
								</div>
								<!-- /conteudo -->
							</div>
							<!-- /col-md-8 -->
							<div class=\"col-md-4\">
								<div class=\"lembretes bg-dark\">
										<h2 class=\"center-text\"><b>LEMBRETES</b></h2>
									<hr>";
										if($lembr->rowCount()>0){
											foreach ($objLem as $linha) {
												$normal=date("d/m/Y", strtotime($linha->data_vencimento));
												if (strtotime(date("Y/m/d")) < strtotime($linha->data_vencimento)){ // true
													 if($linha->estado!="P"){
													 	echo  "<div class=\"lembrete bg-primary\">";
														 echo "<h2 class=\"preto\"><b>{$linha->nome_despesa}</b></h2>";
														 echo "<hr>";
														 echo "<h5><b>Data de Vencimento:{$normal}</b></h5>";
														 echo "<h5><b>Valor: R$ {$linha->valor}</b></h5>";
														 echo "<hr>";
														 echo "</div><br>";
													 }
												}else if(strtotime(date("Y/m/d")) > strtotime($linha->data_vencimento)){ // false
													 if($linha->estado!="P"){
													 	echo  "<div class=\"lembrete bg-danger\">";
														 echo "<h2 class=\"preto\"><b>{$linha->nome_despesa}</b></h2>";
														 echo "<hr>";
														 echo "<h5><b>Data de Vencimento:{$normal}</b></h5>";
														 echo "<h5><b>Valor: R$ {$linha->valor}</b></h5>";
														 echo "<hr>";
														 echo "</div><br>";
													 }
												}else if(strtotime(date("Y/m/d")) == strtotime($linha->data_vencimento)){
													 if($linha->estado!="P"){
													 	echo  "<div class=\"lembrete bg-warning\">";
														 echo "<h2 class=\"preto\"><b>{$linha->nome_despesa}</b></h2>";
														 echo "<hr>";
														 echo "<h5><b>Data de Vencimento:{$normal}</b></h5>";
														 echo "<h5><b>Valor: R$ {$linha->valor}</b></h5>";
														 echo "<hr>";
														 echo "</div><br>";
													 }
												}
											}
										}else{
											echo "<h1 class=\"branco center-text\">VOCÊ NÃO DEFINIU NENHUMA DATA DE PAGAMENTO</h1>";
										}
						echo"   	</div>
								<!-- /lembretes -->
							</div>
							<!-- /col-md-4 -->
						</div>
						<!-- /row -->
					</div>
					<!-- /container -->";
					require_once("../controle/html/footer.php");
		echo"	</body>
				</html>";
			}
		}
?>