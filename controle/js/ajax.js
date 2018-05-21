		function GetXMLHttp() {
			if(navigator.appName == 'Microsoft Internet Explorer') {
				xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			else {
				xmlHttp = new XMLHttpRequest();
			}
			return xmlHttp;
		}
		
		var xmlRequest = GetXMLHttp();

			function requisicao(valor){
				var url = valor;
				
				xmlRequest.open('GET',url,true);
				xmlRequest.onreadystatechange = mudancaEstado;
				xmlRequest.send(null);
				
				if (xmlRequest.readyState == 1) {
					document.getElementById("local").innerHTML = '';
				}
				
				return url;
			}
			
			function mudancaEstado(){
				if (xmlRequest.readyState == 4){
					document.getElementById("local").innerHTML = xmlRequest.responseText;
				}
			}
			
