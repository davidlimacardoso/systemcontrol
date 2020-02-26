
	$('#dataInicio').change(function (){
    dataInicio = ($(this).val());
    console.log(dataInicio);
 	});

 	$('#dataFim').change(function (){
    var dataFim = ($(this).val());
    console.log(dataFim);
 	});

 	$('#mesInicio').change(function (){
    
    var dados = $('#relatorioMes').serialize();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'validacoes/mesRelario.php',
        async: true,
        data: dados,
        success: function(response) {
           console.log(response)
        
          },
        error: function (response) {
         
                alert('erro');
        }
    });

    return false;
 	});

 	$('#mesAnoInicio').change(function (){
    var mesAnoInicio = ($(this).val());
    console.log(mesAnoInicio);
 	});

 	$('#mesFim').change(function (){
    var mesFim = ($(this).val());
    console.log(mesFim);
 	});

 	$('#mesAnoFim').change(function (){
    var mesAnoFim = ($(this).val());
    console.log(mesAnoFim);
 	});

 	$('#anoInicio').change(function (){
    var anoInicio = ($(this).val());
    console.log(anoInicio);
 	});

 	$('#anoFim').change(function (){
    var anoFim = ($(this).val());
    console.log(anoFim);
 	});

alteraDiv = function (){
    if($('#data').val() == 1){
        $("#dia").show();
        $("#mes").hide();
        $("#ano").hide();
        window.location.href = "relatorioDiario.php";
    }
    if($('#data').val() == 2){
        $("#dia").hide();
        $("#mes").show();
        $("#ano").hide();
        window.location.href = "relatorioMensal.php";
    }

    if($('#data').val() == 3){
        $("#dia").hide();
        $("#mes").hide();
        $("#ano").show();
        window.location.href = "relatorioAnual.php";
    }
    
}
