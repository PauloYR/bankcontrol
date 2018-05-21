<!DOCTYPE html>
<html>
<?php
session_start();
if(!isset($_SESSION['cod'])){
	header("location: ../");
}
 require_once("../controle/html/head.php"); ?>
<body>
	<?php  require_once("../controle/html/menu.php"); ?>
	<div class="container">
		<h1>Balanceamento e Despesas</h1>
		<h5><b>OLÁ <?php $nome= strtoupper($_SESSION['nome']); echo "{$nome}"; ?>, AQUI VOCÊ PODE ADICONAR DESPESAS, E VER UM BALANÇO FINACEIRO MENSAL, O BALANÇO É FEITO DE ACORDO COM AS INFORMAÇÕES QUE VOCÊ NOS PASSA AQUI.</b></h5>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<h2 class="preto">Contas</h2>
				<hr>
				<div class="formulario bg-warning">
					<form action="../controle/php/processa.php?type=despesa" method="post">
						<label><b>NOME DA DESPESA</b></label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><b><i class="material-icons">book</i></b></div>
							</div>
							<input required type="text" name="nomeDesp" class="form-control" placeholder="Internet">
						</div>
						<label><b>VALOR DA DESPESA</b></label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><b><i class="material-icons">attach_money</i></b></div>
							</div>
							<input required type="number" min="0" name="valorDesp" class="form-control dinheiro" placeholder="20.00"  >
						</div>
						<label><b>QUANDO VOCÊ TEM QUE PAGAR?</b></label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><b><i class="material-icons">date_range</i></b></div>
							</div>
							<input required type="date" name="dataVen" class="form-control"  maxlength="10"  placeholder="Dia/Mês/Ano">
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" required type="radio" name="tipo" id="pop" value="F">
						  <label class="form-check-label" for="pop"><b>DESPESA FIXA</b></label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" required type="radio" name="tipo" id="inlineRadio2" value="C">
						  <label class="form-check-label" for="inlineRadio2"><b>CONTA COMUM</b></label>
						</div>
						<button style="margin-top: 10px;" class="btn btn-primary btn-block">Adicionar Despesa</button>
					</form>
				</div>
				<!-- /formulario -->
			</div>
			<!-- /col-md-6 -->
			<?php 				
				require_once("../controle/php/classes/conexao.php");
				$bd=new Conectar();
				$select="SELECT * FROM balanco WHERE id_cliente=:id;";
				$exec=$bd->getCon()->prepare($select);
				$exec->bindParam("id", $_SESSION['id']);
				$exec->execute();
				$obj=$exec->fetch(PDO::FETCH_OBJ); ?>
			<div class="col-md-6">
				<h2 class="preto">BALANÇO</h2>
				<hr>
				<div class="divisoria ct-chart" style="height: 350px">
					<?php  
						if($exec->rowCount()<1){
							echo "<h2 class=\"center-text preto\">NENHUM BALANÇO PARA MOSTRAR</h2>";
						}else{
							echo "<button class=\"btn btn-warning min\">GERAR PDF</button>";
						}
					?>
				</div>
			</div>
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-md-12">
				<?php
				$sql="SELECT * FROM despesas WHERE id_cliente=:id;";
				$cmd=$bd->getCon()->prepare($sql);
				$cmd->bindParam("id", $_SESSION['id']);
				$cmd->execute();
				$objfetch=$cmd->fetchAll(PDO::FETCH_OBJ);
				if($cmd->rowCount()>0){
					if($exec->rowCount()==0){
							echo "<br><h4 class=\"preto center-text\"><b>Nos informe Sua Renda Mensal (Salário)</b></h4>
									<h6 class=\"center-text\"><b>ATENÇÃO:</b> SE VOCÊ DESEJA FAZER O BALANCEMANTO, É PRECISO QUE NOS INFORME SUA RENDA MENSAL.</h6>
								<div class=\"formulario center bg-dark\">
									<form action=\"../controle/php/processa.php?type=sal\" method=\"post\">
										<input type=\"text\" name=\"salario\" class=\"form-control input dinheiro\" placeholder=\"R$ 1.900\" data-thousands=\".\" data-decimal=\",\">
									</form>
								</div>
									";
					}else{
						
					}
				}
				if(isset($_GET['s4ld0'])){
					echo "<br><h4 class=\"preto center-text\" id=\"at\"><b>Atualização da renda mensal</b></h4>
									<h6 class=\"center-text\"><b>ATENÇÃO:</b> SE VOCÊ DESEJA FAZER O BALANCEMANTO, É PRECISO QUE NOS INFORME SUA RENDA MENSAL.</h6>
								<div class=\"formulario center bg-dark\">
									<form action=\"../controle/php/processa.php?type=atsal\" method=\"post\">
										<input type=\"text\" name=\"salario\" class=\"form-control input dinheiro\" placeholder=\"R$ 1.900\" data-thousands=\".\" data-decimal=\",\">
									</form>
								</div>
									";
				}
				?>
				<h2 class="preto"><b>SUAS DESPESAS FIXAS</b></h2>
				<hr>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						 <?php 
					if($cmd->rowCount()>0){
						echo "<table class=\"table-striped center-table\" id=\"tab\">";
					echo "
					<thead class=\"bg-dark\" style=\"color:#fff;\">
						<tr>
							<th><p>Tipo</p></th>
							<th><p>Nome</p></th>
							<th><p>Valor</p></th>
							<th><p>Data de Vencimento</p></th>
							<th><p>Estado</p></th>
							<th><p>Deletar</p></th>
						 </tr>
					</thead>
					<tbody>
					";
					foreach ($objfetch as $linha) {
						$data=date("d/m/Y", strtotime($linha->data_vencimento));
						echo "<tr>";
							echo "<th >{$linha->tipo}</th>";
							echo "<th>{$linha->nome_despesa}</th>";
							echo "<th>R$ {$linha->valor}</th>";
							echo "<th>{$data}</th>";
							if($linha->estado=="P"){
								echo "<th class=\"prompt\"><a href=\"../controle/php/processa.php?type=eDesp&est=&nome={$linha->nome_despesa}\"><div class=\"cicle bg-success\"></div></a></th>";
							}else{
								echo "<th  class=\"prompt\"><a href=\"../controle/php/processa.php?type=eDesp&est=P&nome={$linha->nome_despesa}\"><div class=\"cicle bg-danger\"></div></a></th>";
							}
							echo "<th><a href=\"../controle/php/processa.php?type=rmDesp&nome={$linha->nome_despesa}\"><button class=\"btn btn-danger\"><i class=\"material-icons\">delete</i></button></a></th>";
						echo "</tr>";
					}
					echo "</tbody>";
					echo "</table>";
				}else{
					echo "<h2 class=\"center-text preto\">NADA PARA MOSTRAR</h2>";
				}
				 
				 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->
	<?php 
	if($exec->rowCount()>0){
		echo "
			<script type=\"text/javascript\">
				$(document).ready(function(){
					new Chartist.Bar('.ct-chart', {
					  labels: ['GANHOS','GASTOS','SALDO'],
					  series: [
					    ['{$obj->ganho}','{$obj->gasto}','{$obj->balanco}']
					  ]
					}, {
					  stackBars: true,
					  axisY: {
					    labelInterpolationFnc: function(value) {
					      return (value) + 'R$';
					    }
					  }
					}).on('draw', function(data) {
					  if(data.type === 'bar') {
					    data.element.attr({
					      style: 'stroke-width: 70px'
					    });
					  }
					});

				})
			</script>
		";
	}else{
		echo "<h2><b>Nenhum Balanceamento</b></h2>";
	}
	if(isset($_SESSION['p']) && $_SESSION['p']=="erro"){
		echo "<script>
			$.sweetModal({
                    		content: 'O VALOR PASSADO POR VOCÊ É INVÁLIDO',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
		unset($_SESSION['p']);
	} 
	if(isset($_SESSION['nomeDesp']) && $_SESSION['nomeDesp']=="in"){
		echo "<script>
			$.sweetModal({
                    		content: 'O NOME DA DESPESA É INVÁLIDO',
                    		icon:$.sweetModal.ICON_ERROR
                    	});
		</script>";
		unset($_SESSION['nomeDesp']);
	}
	 require_once("../controle/html/footer.php"); ?>
</body>
</html>