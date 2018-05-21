	<!DOCTYPE html>
	<head>
		<title>Bankcontrol</title>
	
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<?php
		  $local=$_SERVER ['REQUEST_URI'];
		  if(strstr($local, "bankcontrol/view/")){
		  	if(strstr($local, "especialidades")){
		  		echo "
		  		<script src=\"../../controle/js/jquery.js\"></script>
			 <script src=\"../../stick/jquery.sticky.js\"></script>
			 <script src=\"../../controle/js/chartist.js\"></script>
			  <script src=\"../../maskmoney/dist/jquery.maskMoney.js\"></script>
			 <script src=\"../../controle/js/ajax.js\"></script>
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../../bootstrap/dist/css/bootstrap.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../../controle/css/chartist.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../../bootstrap/dist/css/bootstrap-grid.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../../sweet-modal-master/dist/min/jquery.sweet-modal.min.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"../../controle/css/estilo.css\">
			<script src=\"../../sweet-modal-master/dist/min/jquery.sweet-modal.min.js\"></script>
			<script src=\"../../bootstrap/dist/js/bootstrap.js\"></script>
			<script src=\"../../controle/js/javaScript.js\"></script>
			";
		}else{
		  	echo "
		  		<script src=\"../controle/js/jquery.js\"></script>
		  		<script src=\"../stick/jquery.sticky.js\"></script>
		  		 <script src=\"../controle/js/chartist.js\"></script>
		  		<script src=\"../maskmoney/dist/jquery.maskMoney.js\"></script>
		  		<script src=\"../controle/js/ajax.js\"></script>
				<link rel=\"stylesheet\" type=\"text/css\" href=\"../bootstrap/dist/css/bootstrap.css\">
				<link rel=\"stylesheet\" type=\"text/css\" href=\"../controle/css/chartist.css\">
				<link rel=\"stylesheet\" type=\"text/css\" href=\"../bootstrap/dist/css/bootstrap-grid.css\">
				<link rel=\"stylesheet\" type=\"text/css\" href=\"../sweet-modal-master/dist/min/jquery.sweet-modal.min.css\">
				<link rel=\"stylesheet\" type=\"text/css\" href=\"../controle/css/estilo.css\">
				<script src=\"../sweet-modal-master/dist/min/jquery.sweet-modal.min.js\"></script>
				<script src=\"../bootstrap/dist/js/bootstrap.js\"></script>
				<script src=\"../controle/js/javaScript.js\"></script>
		  	";
		  }
		  }else{
		  	echo "
		  		<script src=\"controle/js/jquery.js\"></script>
			 <script src=\"stick/jquery.sticky.js\"></script>
			  <script src=\"controle/js/chartist.js\"></script>
			 <script src=\"maskmoney/dist/jquery.maskMoney.js\"></script>
			 <script src=\"controle/js/ajax.js\"></script>
			<link rel=\"stylesheet\" type=\"text/css\" href=\"bootstrap/dist/css/bootstrap.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"controle/css/chartist.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"bootstrap/dist/css/bootstrap-grid.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"sweet-modal-master/dist/min/jquery.sweet-modal.min.css\">
			<link rel=\"stylesheet\" type=\"text/css\" href=\"controle/css/estilo.css\">
			<script src=\"sweet-modal-master/dist/min/jquery.sweet-modal.min.js\"></script>
			<script src=\"bootstrap/dist/js/bootstrap.js\"></script>
			<script src=\"controle/js/javaScript.js\"></script>
			";
		  }
		?>
	</head>