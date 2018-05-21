<?php
	session_start();
	if($_GET['form']=="conta"){
		$nome=$_POST['nome'];
		$cpf=$_POST['cpf'];
		$tele=$_POST['tele'];
		$lo=$_POST['login'];
		$se=$_POST['senha'];
		require_once('classes/conexao.php');
		$con=new Conectar();
		$select="SELECT * FROM conta WHERE login=:log;";
		$cmd=$con->getCon()->prepare($select);
		$cmd->bindParam("log", $lo);
		$cmd->execute();
		$obj=$cmd->fetch(PDO::FETCH_OBJ);
		if($cmd->rowCount()>0 && $obj->cod!=$_SESSION['cod']){
			$_SESSION['exist'];
		}else{
			$select2="SELECT * FROM conta WHERE cpf=:cpf;";
			$cmd2=$con->getCon()->prepare($select2);
			$cmd2->bindParam("cpf", $cpf);
			$cmd2->execute();
			if($cmd2->rowCount()>2 && $obj->cpf!=$_SESSION['cpf']){
				$_SESSION['m2']="cpf";
			}else{
				$update= "UPDATE conta SET nome=:nome, cpf=:cpf, telefone=:tele, login=:lo, senha=:se WHERE id=:id;";
				$prepareUp=$con->getCon()->prepare($update);
				$prepareUp->bindParam("nome", $nome);
				$prepareUp->bindParam("cpf", $cpf);
				$prepareUp->bindParam("tele", $tele);
				$prepareUp->bindParam("lo", $lo);
				$prepareUp->bindParam("se", $se);
				$prepareUp->bindParam("id", $_SESSION['id']);
				$prepareUp->execute();
				$_SESSION['nome']=$nome;
				$_SESSION['cpf']=$cpf;
				$_SESSION['tele']=$tele;
				$_SESSION['login']=$lo;
				$_SESSION['senha']=$se;
			}
		}
		header("location:../../view/configConta.php");
	}else if($_GET['form']=="rmconta"){
		require_once('classes/conexao.php');
		$con=new Conectar();
		$delete_balanco= "DELETE FROM balanco WHERE id_cliente=:id ;";
		$prepareUp=$con->getCon()->prepare($delete_balanco);
		$prepareUp->bindParam("id", $_SESSION['id']);
		$prepareUp->execute();
			$delete_despesas= "DELETE FROM despesas WHERE id_cliente=:id ;";
		$prepareUp=$con->getCon()->prepare($delete_despesas);
		$prepareUp->bindParam("id", $_SESSION['id']);
		$prepareUp->execute();
			$delete_credito= "DELETE FROM icredito WHERE id_cliente=:id ;";
		$prepareUp=$con->getCon()->prepare($delete_credito);
		$prepareUp->bindParam("id", $_SESSION['id']);
		$prepareUp->execute();
			$delete_bancaria= "DELETE FROM ibancarias WHERE id_cliente=:id ;";
		$prepareUp=$con->getCon()->prepare($delete_bancaria);
		$prepareUp->bindParam("id", $_SESSION['id']);
		$prepareUp->execute();
			$delete= "DELETE FROM conta WHERE id=:id ;";
		$prepareUp=$con->getCon()->prepare($delete);
		$prepareUp->bindParam("id", $_SESSION['id']);
		$prepareUp->execute();
		session_destroy();
		header("location:../../");

	}else if($_GET['form']=="ban"){
		require_once('classes/conexao.php');
		$con=new Conectar();
		$delete= "DELETE FROM ibancarias WHERE id_cliente=:id ;";
		$prepareUp=$con->getCon()->prepare($delete);
		$prepareUp->bindParam("id", $_SESSION['id']);
		$prepareUp->execute();
		header("location:../../view/configConta.php");

	}else if($_GET['form']=="cre"){
		require_once('classes/conexao.php');
		$con=new Conectar();
		$delete= "DELETE FROM icredito WHERE id_cliente=:id ;";
		$prepareUp=$con->getCon()->prepare($delete);
		$prepareUp->bindParam("id", $_SESSION['id']);
		$prepareUp->execute();
		header("location:../../view/configConta.php");

	}
?>


