$(function(){
	//Pesquisar os cursos sem refresh na página
	$("#enviar").on('click',function(){
		
		var pesquisa = $("#pesquisa").val();
		
		//Verificar se há algo digitado
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}		
			$.post('validacoes/busca.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
				$("pesquisa").val("");
			});
		}else{
			$(".resultado").html('');
			alert('erro');
		}		
	});
});