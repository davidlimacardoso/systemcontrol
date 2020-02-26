function carregaCNPJ(cnpj) {
      
  var CNPJ = cnpj.replace(/[^0-9]/g,'')

  var param = {};
  param.url = 'https://www.receitaws.com.br/v1/cnpj/' + CNPJ;
  param.method = 'GET';
  param.success =  function(data){
    console.log(data);
    document.getElementById('nome').value = data.nome
    document.getElementById('cep').value = data.cep
    document.getElementById('endereco').value = data.logradouro
    document.getElementById('numEmpresa').value = data.numero
    document.getElementById('bairro').value = data.bairro
    document.getElementById('cidade').value = data.municipio
    document.getElementById('uf').value = data.uf
    document.getElementById('nomeResponsavel').value = data.qsa[0]['nome']
    document.getElementById('emailEmpresa').value = data.email
    document.getElementById('tel').value = data.telefone
    document.getElementById('tipo').value = data.tipo
    document.getElementById('fantasia').value = data.fantasia
  };
  param.dataType = 'jsonp';


  serviceRest(param); 
}


function serviceRest(param){

  $.ajax({
  url: param.url,
  dataType: param.dataType,
  type: param.method,
  data: param.data,
  success: param.success
  });
}