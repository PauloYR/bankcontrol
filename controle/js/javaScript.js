$(document).ready(function(){
	$(".olho").mousedown(function(){
		$(".pass").attr("type", "text");
	});
	$(".olho").mouseup(function(){
		$(".pass").attr("type", "password");
	});
	$(".fixo").sticky({topSpacing:0, bottomSpacing:350});
});
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
