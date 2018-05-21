<?php  
session_start();
if($_GET['type']=="cadastro"){
	$nome=$_POST['nome'];
	$login=strtolower(trim($_POST['login']));
	$senha=$_POST['senha'];
	$csenha=$_POST['csenha'];
	$null="NULL";
	if(strlen($nome)<2){
		$_SESSION['u']="nome";
		header("location: ../../");
	}else{
		if(strlen($login)<6){
			$_SESSION['u']="log";
		header("location: ../../");
		}else{
			if(strlen($senha)<6){
				$_SESSION['u']="senha";
				header("location: ../../");
			}else{
				if($senha!=$csenha){
					$_SESSION['u']="csenha";
					header("location: ../../");
				}else{
					require_once("classes/conexao.php");
					$bd=new Conectar();
					require_once("classes/gerador.php");
					$ge=new Gerador();
					$codigo=$ge->geradorDeCodigos();
					$verifica="SELECT * FROM conta WHERE login=:log ;";
					$verificar=$bd->getCon()->prepare($verifica);
					$verificar->bindParam("log", $login);
					$verificar->execute();
					$obj=$verificar->fetch(PDO::FETCH_OBJ);
					if($verificar->rowCount()>0){
						$_SESSION['emailE']="exits";
						header("location: ../../");
						if($obj->cod==$codigo){
							while ($obj->cod==$codigo) {
								$codigo=$ge->geradorDeCodigos();
							}
						}
					}else{
					$sql="INSERT INTO conta(nome,login,cod,senha) VALUES(:nome,:login,:cod,:senha)";
					$insert=$bd->getCon()->prepare($sql);
					$insert->bindParam("nome", $nome);
					$insert->bindParam("login", $login);
					$insert->bindParam("cod",$codigo);
					$insert->bindParam("senha", $cripto);
					$insert->execute();
					$select="SELECT * FROM conta WHERE cod=:codigo;";
					$cmd=$bd->getCon()->prepare($select);
					$cmd->bindParam("codigo", $codigo);
					$cmd->execute();
					$obj=$cmd->fetch(PDO::FETCH_OBJ);
					$_SESSION['nome']=$nome;
					$_SESSION['login']=$login;
					$_SESSION['cod']=$codigo;
					$_SESSION['senha']=$senha;
					$_SESSION['id']=$obj->id;
					header("location: ../../index.php");
					}
				}
			}
		}
	}
}else if($_GET['type']=="confirmacao"){
	require_once("../../ValidatePTBR/Validate/ptBR.php");
	$validate=new Validate_ptBR();
	$telefone=trim($_POST['telefone']);
	$cpf=trim($_POST['cpf']);
	if(!$validate->phoneNumber($telefone, true)){
		echo "<script>alert('Seu número de telefone não é válido'); window.history.back();</script>";
	}else{
		$caracteres=".;-";
		if(!$validate->cpf($cpf)){
			echo "<script>alert('Seu CPF não é válido'); window.history.back();</script>";
		}else{
			require_once("classes/conexao.php");
			$bd=new Conectar();
			$verificar="SELECT * FROM conta WHERE cpf=:cpf ;";
			$ver=$bd->getCon()->prepare($verificar);
			$ver->bindParam("cpf", $cpf);
			$ver->execute();
				if($ver->rowCount()==2){
					$_SESSION['cpf2']="exist";
					header("location:../../");
				}else{
					$sql="UPDATE conta SET cpf=:cpf, telefone=:tel WHERE cod=:cod;";
					$update=$bd->getCon()->prepare($sql);
					$update->bindParam("cpf", $cpf);
					$update->bindParam("tel", $telefone);
					$update->bindParam("cod", $_SESSION['cod']);
					$update->execute();
					$_SESSION['cpf']=$cpf;
					$_SESSION['tel']=$telefone;
					header("location:../../");
			}			
		}
	}
}else if($_GET['type']=="sair"){
	session_destroy();
	echo "<script>window.history.back();</script>";
}else if($_GET['type']=="login"){
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$sql="SELECT * FROM conta WHERE login=:log;";
	$select=$bd->getCon()->prepare($sql);
	$login=strtolower(trim($_POST['login']));
	$senha=$_POST['senha'];
	$select->bindParam("log", $login);
	$select->execute();
	$obj=$select->fetch(PDO::FETCH_OBJ);
	if($obj->login==$login){
		if($obj->senha==$senha){
			$_SESSION['login']=$obj->login;
			$_SESSION['senha']=base64_decode($obj->senha);
			$_SESSION['id']=$obj->id;
			$_SESSION['cod']=$obj->cod;
			$_SESSION['cpf']=$obj->cpf;
			$_SESSION['tel']=$obj->telefone;
			$_SESSION['nome']=$obj->nome;
			header("location: ../../view/bankcontrol.php");
		}else{
			$_SESSION['conta']="notExists";
			header("location:../../");
		}
	}else{
		$_SESSION['conta']="notExists";
		header("location:../../");
	}
}else if($_GET['type']=="ibanco"){
	$nomeDoBanco=$_POST['nomeBanco'];
	$nmrConta=$_POST['nmrConta'];
	$saldo=$_POST['saldo'];
	$tipo=$_POST['conta'];
	if(strlen($nomeDoBanco)<3){
		$_SESSION['eb']="nome";
		header("location:../../view/inseririnforBan.php");
	}else{
		if(strlen($nmrConta)<4){
			$_SESSION['eb']="nmr";
			header("location:../../view/inseririnforBan.php");
		}else{
			require_once("classes/conexao.php");
			$bd=new Conectar();
			$sql="INSERT INTO ibancarias(nomeBanco, nmrConta, id_cliente, saldo,tipo) VALUES(:nomeBanco, :nmrConta, :idConta, :saldo,:tipo);";
			$insert=$bd->getCon()->prepare($sql);
			$insert->bindParam("nomeBanco", $nomeDoBanco);
			$insert->bindParam("nmrConta", $nmrConta);
			$insert->bindParam("idConta", $_SESSION['id']);
			$insert->bindParam("saldo", $_POST['saldo']);
			$insert->bindParam("tipo", $tipo);
			$insert->execute();
			header("location: ../../view/inserirInforBan.php");
		}
	}
}else if($_GET['type']=="dadosnome"){
	$nomeDoBanco=$_POST['nomeB'];
	if(strlen($nomeDoBanco)<3){
		$_SESSION['eb']="nome";
	}else{
		require_once("classes/conexao.php");
		$bd=new Conectar();
		$sql="UPDATE ibancarias SET Nomebanco=:banco WHERE id_cliente=:id;";
		$update=$bd->getCon()->prepare($sql);
		$update->bindParam("banco", $nomeDoBanco);
		$update->bindParam("id", $_SESSION['id']);
		$update->execute();
	}
	header("location: ../../view/inseririnforBan.php");
}else if($_GET['type']=="dadosnmr"){
	$nmr=$_POST['nmrC'];
	if(strlen($nmr)<4){
		$_SESSION['eb']="nmr";
	}else{
		require_once("classes/conexao.php");
		$bd=new Conectar();
		$sql="UPDATE ibancarias SET nmrConta=:nmr WHERE id_cliente=:id;";
		$update=$bd->getCon()->prepare($sql);
		$update->bindParam("nmr", $nmr);
		$update->bindParam("id", $_SESSION['id']);
		$update->execute();
	}
	header("location: ../../view/inseririnforBan.php");
}else if($_GET['type']=="dadosdep"){
	$deposito=$_POST['deposito'];
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$ver="SELECT * FROM ibancarias WHERE id_cliente=:id;";
	$sel=$bd->getCon()->prepare($ver);
	$sel->bindParam("id", $_SESSION['id']);
	$sel->execute();
	$obj=$sel->fetch(PDO::FETCH_OBJ);
	$saldoAt=$obj->Saldo;
	$saldo=$saldoAt+$deposito;
	$sql="UPDATE ibancarias SET Deposito=:dep, Saldo=:saldo WHERE id_cliente=:id;";
	$update=$bd->getCon()->prepare($sql);
	$update->bindParam("dep", $deposito);
	$update->bindParam("saldo", $saldo);
	$update->bindParam("id", $_SESSION['id']);
	$update->execute();
	header("location: ../../view/inseririnforBan.php");
}else if($_GET['type']=="dadossaque"){
	$saque=$_POST['saque'];
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$ver="SELECT * FROM ibancarias WHERE id_cliente=:id;";
	$sel=$bd->getCon()->prepare($ver);
	$sel->bindParam("id", $_SESSION['id']);
	$sel->execute();
	$obj=$sel->fetch(PDO::FETCH_OBJ);
	$saldoAt=$obj->Saldo;
	$saldo=$saldoAt-$saque;
	$sql="UPDATE ibancarias SET Saque=:saq, Saldo=:saldo WHERE id_cliente=:id;";
	$update=$bd->getCon()->prepare($sql);
	$update->bindParam("saq", $saque);
	$update->bindParam("saldo", $saldo);
	$update->bindParam("id", $_SESSION['id']);
	$update->execute();
	header("location: ../../view/inseririnforBan.php");
}else if($_GET['type']=="icred"){
	$Cartao=$_POST['cart'];
	$nCartao=$_POST['ncart'];
	$venci=$_POST['ven'];
	$limite=$_POST['limi'];
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$sql="INSERT INTO icredito(Cartao, num_cartao, data_vencimento, limite, id_cliente) VALUES(:Cartao, :numero, :ven, :limite, :idConta);";
	$insert=$bd->getCon()->prepare($sql);
	$insert->bindParam("Cartao", $Cartao);
	$insert->bindParam("numero", $nCartao);
	$insert->bindParam("ven", $venci);
	$insert->bindParam("limite", $limite);
	$insert->bindParam("idConta", $_SESSION['id']);
	$insert->execute();
	header("location: ../../view/inserirInforCre.php");
}else if($_GET['type']=="dadoscart"){
	$Car=$_POST['Cartao'];
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$sql="UPDATE icredito SET Cartao=:cartao WHERE id_cliente=:id;";
	$update=$bd->getCon()->prepare($sql);
	$update->bindParam("cartao", $Car);
	$update->bindParam("id", $_SESSION['id']);
	$update->execute();
	header("location: ../../view/inseririnforCre.php");
}else if($_GET['type']=="dadosncart"){
	$nCar=$_POST['nCartao'];
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$sql="UPDATE icredito SET num_cartao=:num WHERE id_cliente=:id;";
	$update=$bd->getCon()->prepare($sql);
	$update->bindParam("num", $nCar);
	$update->bindParam("id", $_SESSION['id']);
	$update->execute();
	header("location: ../../view/inseririnforCre.php");
}else if($_GET['type']=="dadosven"){
	$ven=$_POST['dVenc'];
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$sql="UPDATE icredito SET data_vencimento=:ven WHERE id_cliente=:id;";
	$update=$bd->getCon()->prepare($sql);
	$update->bindParam("ven", $ven);
	$update->bindParam("id", $_SESSION['id']);
	$update->execute();
	header("location: ../../view/inseririnforCre.php");
}else if($_GET['type']=="dadoslimi"){
	$lim=$_POST['dLim'];
	require_once("classes/conexao.php");
	$bd=new Conectar();
	$ver="SELECT * FROM ibancarias WHERE id_cliente=:id;";
	$sel=$bd->getCon()->prepare($ver);
	$sel->bindParam("id", $_SESSION['id']);
	$sel->execute();
	$obj=$sel->fetch(PDO::FETCH_OBJ);
	$sql="UPDATE icredito SET limite=:lim WHERE id_cliente=:id;";
	$update=$bd->getCon()->prepare($sql);
	$update->bindParam("lim", $lim);
	$update->bindParam("id", $_SESSION['id']);
	$update->execute();
	header("location: ../../view/inseririnforCre.php");
 }else if($_GET['type']=="recuperarSenha"){
	$cod=strtoupper(trim($_POST['cod']));
	$email=strtolower($_POST['email']);
	require_once("classes/conexao.php");
	$bd = new Conectar();
	$sql="SELECT * FROM conta WHERE login=:log AND cod=:cod;";
	$cmd=$bd->getCon()->prepare($sql);
	$cmd->bindParam("log", $email);
	$cmd->bindParam("cod", $cod);
	$cmd->execute();
	$obj=$cmd->fetch(PDO::FETCH_OBJ);
	if($cmd->rowCount()>0){
		$_SESSION['login']=$obj->login;
		$_SESSION['senha']=$obj->senha;
		$_SESSION['id']=$obj->id;
		$_SESSION['cod']=$obj->cod;
		$_SESSION['cpf']=$obj->cpf;
		$_SESSION['tel']=$obj->telefone;
		$_SESSION['nome']=$obj->nome;
		header("location:../../");
	}else{
		$_SESSION['emailE']="nExist";
		header("location: ../../view/recSenha.php?pag");
	}
}else if($_GET['type']=="eDesp"){
		require_once("classes/conexao.php");
		$bd = new Conectar();
		$sql="UPDATE despesas SET estado=:es WHERE id_cliente=:id AND nome_despesa=:nome;";
		$update=$bd->getCon()->prepare($sql);
		$update->bindParam("es", $_GET['est']);
		$update->bindParam("id", $_SESSION['id']);
		$update->bindParam("nome", $_GET['nome']);
		$update->execute();
	header("location: ../../view/pv.php#tab");
}else if($_GET['type']=="rmDesp"){
	require_once("classes/conexao.php");
		$bd = new Conectar();
		$select_desp="SELECT * FROM despesas WHERE id_cliente=:id AND nome_despesa=:nome;";
		$exec_desp=$bd->getCon()->prepare($select_desp);
		$exec_desp->bindParam("id", $_SESSION['id']);
		$exec_desp->bindParam("nome", $_GET['nome']);
		$exec_desp->execute();
		$obj_despesa=$exec_desp->fetch(PDO::FETCH_OBJ);
		$sql="DELETE FROM despesas WHERE id_cliente=:id AND nome_despesa=:nome;";
		$cmd=$bd->getCon()->prepare($sql);
		$cmd->bindParam("id", $_SESSION['id']);
		$cmd->bindParam("nome", $_GET['nome']);
		$cmd->execute();
		$select="SELECT * FROM despesas WHERE id_cliente=:id;";
		$exec2=$bd->getCon()->prepare($select);
		$exec2->bindParam("id", $_SESSION['id']);
		$exec2->execute();
		if($exec2->rowCount()<1){
			$remove_balanco="DELETE FROM balanco WHERE id_cliente=:id;";
			$rm_des=$bd->getCon()->prepare($remove_balanco);
			$rm_des->bindParam("id", $_SESSION['id']);
			$rm_des->execute();
		}else{
			$select_balanco="SELECT * FROM balanco WHERE id_cliente=:id;";
			$exec_balanco=$bd->getCon()->prepare($select_balanco);
			$exec_balanco->bindParam("id", $_SESSION['id']);
			$exec_balanco->execute();
			$obj_balanco=$exec_balanco->fetch(PDO::FETCH_OBJ);
			$gasto=$obj_balanco->gasto-$obj_despesa->valor;
			$balanco=$obj_balanco->ganho-$gasto;
			$insertBa="UPDATE balanco SET gasto=:g, balanco=:b WHERE id_cliente=:id ;";
			$execBa=$bd->getCon()->prepare($insertBa);
			$execBa->bindParam("g", $gasto);
			$execBa->bindParam("b", $balanco);
			$execBa->bindParam("id", $_SESSION['id']);
			$execBa->execute();
		}

		 header("location: ../../view/pv.php#tab");
}else if($_GET['type']=="sal"){
	require_once("classes/conexao.php");
	$bd = new Conectar();
	$sal="INSERT INTO balanco(ganho,id_cliente) VALUES(:sal,:id);";
	$cmd=$bd->getCon()->prepare($sal);
	$cmd->bindParam("sal", $_POST['salario']);
	$cmd->bindParam("id", $_SESSION['id']);
	$cmd->execute();
	$selectD="SELECT * FROM despesas WHERE id_cliente=:id;";
	$exec=$bd->getCon()->prepare($selectD);
	$exec->bindParam("id", $_SESSION['id']);
	$exec->execute();
	$obj=$exec->fetch(PDO::FETCH_OBJ);
	if($exec->rowCount()>0){
		$select="SELECT * FROM balanco WHERE id_cliente=:id;";
		$exec2=$bd->getCon()->prepare($select);
		$exec2->bindParam("id", $_SESSION['id']);
		$exec2->execute();
		$obj3=$exec2->fetch(PDO::FETCH_OBJ);
		$string_soma="SELECT SUM(valor) AS total FROM despesas WHERE id_cliente=:id;";
		$soma = $bd->getCon()->prepare($string_soma);
		$soma->bindParam("id", $_SESSION['id']);
		$soma->execute();
		$somatoria=$soma->fetchColumn();
		$tipo="C";
		$string_soma_comun="SELECT SUM(valor) AS total FROM despesas WHERE id_cliente=:id AND tipo=:tipo;";
		$soma_comun = $bd->getCon()->prepare($string_soma_comun);
		$soma_comun->bindParam("id", $_SESSION['id']);
		$soma_comun->bindParam("tipo", $tipo);
		$soma_comun->execute();
		$somatoria_comun=$soma_comun->fetchColumn();
		$gasto=$somatoria+$somatoria_comun;
		$balanco=$obj3->ganho-$gasto;
		$tipo="Mensal";
		$insertBa="UPDATE balanco SET gasto=:g, balanco=:b, tipo=:tipo WHERE id_cliente=:id ;";
		$execBa=$bd->getCon()->prepare($insertBa);
		$execBa->bindParam("g", $gasto);
		$execBa->bindParam("b", $balanco);
		$execBa->bindParam("tipo", $tipo);
		$execBa->bindParam("id", $_SESSION['id']);
		$execBa->execute();
	}
	 header("location: ../../view/pv.php");
}else if($_GET['type']=="atsal"){
	require_once("classes/conexao.php");
	$bd = new Conectar();
	$select="SELECT * FROM balanco WHERE id_cliente=:id;";
	$exec2=$bd->getCon()->prepare($select);
	$exec2->bindParam("id", $_SESSION['id']);
	$exec2->execute();
	$obj3=$exec2->fetch(PDO::FETCH_OBJ);
	$balanco=$_POST['salario']-$obj3->gasto;
	$cmd=$bd->getCon()->prepare("UPDATE balanco SET ganho=:g, balanco=:b WHERE id_cliente=:id");
	$cmd->bindParam("g", $_POST['salario']);
	$cmd->bindParam("b", $balanco);
	$cmd->bindParam("id", $_SESSION['id']);
	$cmd->execute();
	header("location: ../../pv.php");
}else{
	// PARTE DO CODIGO PAULO VITOR
	if($_GET['type']=="despesa"){
		require_once("classes/conexao.php");
		$bd = new Conectar();
		if(strlen($_POST['nomeDesp'])>=3){
			$sql="INSERT INTO despesas(id_cliente,nome_despesa,data_vencimento,valor,tipo) VALUES(:id,:nome,:data,:valor,:tipo);";
			$cmd=$bd->getCon()->prepare($sql);
			$cmd->bindParam("id",$_SESSION['id']);
			$cmd->bindParam("nome",$_POST['nomeDesp']);
			$cmd->bindParam("data", $_POST['dataVen']);
			$cmd->bindParam("valor", $_POST['valorDesp']);
			$cmd->bindParam("tipo", $_POST['tipo']);
			$cmd->execute();
			$string_soma="SELECT SUM(valor) AS total FROM despesas WHERE id_cliente=:id;";
			$soma = $bd->getCon()->prepare($string_soma);
			$soma->bindParam("id", $_SESSION['id']);
			$soma->execute();
			$somatoria=$soma->fetchColumn();
			$tipo="C";
			$string_soma_comun="SELECT SUM(valor) AS total FROM despesas WHERE id_cliente=:id AND tipo=:tipo;";
			$soma_comun = $bd->getCon()->prepare($string_soma_comun);
			$soma_comun->bindParam("id", $_SESSION['id']);
			$soma_comun->bindParam("tipo", $tipo);
			$soma_comun->execute();
			$somatoria_comun=$soma_comun->fetchColumn();
			$gasto=$somatoria+$somatoria_comun;
			$balanco=$obj3->ganho-$gasto;
			$select="SELECT * FROM balanco WHERE id_cliente=:id;";
			$exec2=$bd->getCon()->prepare($select);
			$exec2->bindParam("id", $_SESSION['id']);
			$exec2->execute();
			$obj3=$exec2->fetch(PDO::FETCH_OBJ);
			$balanco=$obj3->ganho-$gasto;
			$tipoM="Mensal";
			$insertBa="UPDATE balanco SET gasto=:g, balanco=:b, tipo=:tipo WHERE id_cliente=:id ;";
			$execBa=$bd->getCon()->prepare($insertBa);
			$execBa->bindParam("g", $gasto);
			$execBa->bindParam("b", $balanco);
			$execBa->bindParam("tipo", $tipoM);
			$execBa->bindParam("id", $_SESSION['id']);
			$execBa->execute();
		
		}else{
			$_SESSION['nomeDesp']="in";
		}
		 header("location: ../../view/pv.php");
	}
}
?>
