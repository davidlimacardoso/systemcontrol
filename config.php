<div class="wrapper">

<?php include('validacoes/menu.php'); ?>
<?php
  if(!isset($_SESSION))
  {
    session_start();
  }
  if($_SESSION['idPerfil'] != 1 & $_SESSION['idPerfil'] != 2 & $_SESSION['idPerfil'] != 4){ 
   if($_SESSION['cnpj'] == ""){?>
    <div class="text-center bg-danger mb-3 p-2 h5">Solicite para seu gerente verificar as configurações do sistema.</div>
  <?php }?>
    <div class="text-center"><img src="imagens/pagina_erro.png"></div>
<?php }else{
?>
<!-- JavaScript -->

<script type="text/javascript" src="js/mascara.js"></script>

    <?php 
        if(isset($_SESSION['msgCad']))
        {
          echo $_SESSION['msgCad'];
          unset($_SESSION['msgCad']);
        }
    ?>

  <?php if (isset($_GET['dados']) && $_GET['dados']='OK' ) { ?>
    
  <?php }?>
  <?php if(isset($_GET['alterar'])){ ?>
  <div class="text-center bg-danger mb-3 p-2 h5" id="salvo">Você não tem permição para alterar esse dados.</div>
  <?php }?>

  <div class="border" >

    <div class="container-fluid">    

      <h4 class="text-secondary mt-4 mb-n4">Informações da Empresa</h4>
      <div class="text-right">
        <?php 
          if (isset($_SESSION['empresaNome'])){
        ?>
          <button id="troca2" type="button" class="btn" data-toggle="modal" data-target="#alteraConfig">editar</button>
        <?php 
          }else{
        ?>
          <button id="troca" class="btn">editar</button>
        <?php
          }
        ?>
      </div>

        <form class="form-group border p-2" action="validacoes/validaEmpresa.php" method="POST" id="cadastroEmpresa">
          <div class="row mt-2">
            <div class="col-12 col-sm-12 col-md-4">
              <label class="col-form-label" >CNPJ:</label>
              <input type="text" id="cnpj" name="cnpj" onKeyPress="MascaraCNPJ(cnpj);" maxlength="18" class="form-control deslbloquia" value="<?php if (isset($_SESSION['cnpj'])) { echo $_SESSION['cnpj']; }?>" onblur="carregaCNPJ(this.value)" autofocus disabled>  
              <div class="invalid-feedback d-none" id="campoCNPJ">Campo CNPJ vazio</div>
            </div>
            <div class="col-12 col-sm-12 col-md-8">
              <label class="col-form-label">NOME DA EMPRESA:</label>
              <input type="text" id="nome" name="nomeEmpresa" class="form-control deslbloquia" value="<?php if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome']; }?>" disabled> 
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-6 col-sm-6 col-md-2">
              <label class="col-form-label">CEP:</label> 
              <input type="text" id="cep" name="cep" onKeyPress="MascaraCep(cep);" maxlength="10" class="form-control deslbloquia" value="<?php if (isset($_SESSION['empresaCep'])) { echo $_SESSION['empresaCep']; }?>" disabled>
            </div>
            <div class="col-10 col-sm-10 col-md-8">
              <label class="col-form-label">ENDEREÇO:</label>
              <input type="text" id="endereco" name="endereco" class="form-control deslbloquia" value="<?php if (isset($_SESSION['endEmpresa'])) { echo $_SESSION['endEmpresa']; }?>" disabled>
            </div>
            <div class="col-2 col-sm-2 col-md-2">
              <label class="col-form-label">Nº:</label>
              <input type="text" id="numEmpresa" name="numEmpresa" class="form-control deslbloquia" value="<?php if (isset($_SESSION['empresaNum'])) { echo $_SESSION['empresaNum']; }?>" disabled>  
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-sm-12 col-md-4">
              <label class="col-form-label">BAIRRO:</label> 
              <input type="text" id="bairro" name="bairro" class="form-control deslbloquia" value="<?php if (isset($_SESSION['bairro'])) { echo $_SESSION['bairro']; }?>" disabled>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
              <label class="col-form-label">CIDADE:</label>  
              <input type="text" id="cidade" name="cidade" class="form-control deslbloquia" value="<?php if (isset($_SESSION['cidade'])) { echo $_SESSION['cidade']; }?>" disabled>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
              <label class="col-form-label">ESTADO:</label> 
               <input type="text" id="uf" name="estado" class="form-control deslbloquia" value="<?php if (isset($_SESSION['estado'])) { echo $_SESSION['estado']; }else{echo "Escolher...";}?>" disabled>
            </div>
          </div>

           <div class="row mt-3">
            <div class="col-12 col-sm-12 col-md-6">
              <label class="col-form-label">NOME RESPONSÁVEL:</label> 
              <input type="text" id="nomeResponsavel" name="nomeResponsavel" class="form-control deslbloquia" value="<?php if (isset($_SESSION['responsavel'])) { echo $_SESSION['responsavel']; }?>" disabled>
            </div> 
            <div class="col-12 col-sm-12 col-md-6">                       
              <label class="col-form-label">EMAIL:</label>
              <input type="text" id="emailEmpresa" name="emailEmpresa" class="form-control deslbloquia" value="<?php if (isset($_SESSION['emailEmpresa'])) { echo $_SESSION['emailEmpresa']; }?>" disabled>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-sm-12 col-md-6">                       
              <label class="col-form-label">TELEFONE:</label>
              <input type="text" id="tel" name="tel" onKeyPress="MascaraTelefone(tel);" maxlength="14" class="form-control deslbloquia" value="<?php if (isset($_SESSION['telEmpresa'])) { echo $_SESSION['telEmpresa']; }?>" disabled>
            </div>
            <div class="col-12 col-sm-12 col-md-6">                       
              <label class="col-form-label">TIPO:</label>
              <input type="text" id="tipo" name="tipo" class="form-control deslbloquia" value="<?php if (isset($_SESSION['tipo'])) { echo $_SESSION['tipo']; }?>" disabled>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-12 col-md-6"> 
            <label class="col-form-label">NOME FANTASIA:</label>         
                <input type="text" id="fantasia" name="fantasia" class="form-control deslbloquia" value="<?php if (isset($_SESSION['nomeFantasia'])) { echo $_SESSION['nomeFantasia']; }?>" disabled>
              </div>
          </div>
          <div class="row">
            <div class="col">
              <button class="btn btn-secondary btn-lg mt-3 float-right deslbloquia" type="submit" id="salvar" disabled>SALVAR</button>
            </div>
          </div>
              
        </form>

      <h4 class="text-secondary mt-2">Configuração do Sistema</h4>

      <form class="form-group mt-3 border p-2" action="" method="POST">
        <p class="col-form-label text-center">PERSONALIZE SEU MENU LATERAL</p>
        <div class="row mt-2 mb-2 mt-sm-2">
          <div class="mx-auto">
          <button id="padrao" class="mr-2 btn" type="button" style="width: 50px; height: 50px; background-color: #696969; border:none;"></button>
          <button id="areia" class="mr-2 btn-warning btn" type="button" style="width: 50px; height: 50px; background-color: #D2B48C; border:none;"></button>
          <button id="anil" class="mr-2 btn-info btn" type="button" style="width: 50px; height: 50px; background-color: #008080; border:none;"></button>
          <button id="azul" class="mr-2 btn" type="button" style="width: 50px; height: 50px; background-color: #000080; border:none;"></button>
          <button id="oliva" class="mr-2 btn-success btn" type="button" style="width: 50px; height: 50px; background-color: #556B2F; border:none;"></button>
          <button id="verde" class="mr-2 btn" type="button" style="width: 50px; height: 50px; background-color: #006400; border:none;"></button>
          <button id="amarelo" class="mr-2 btn" type="button" style="width: 50px; height: 50px; background-color: #FFD700; border:none;"></button>
          <button id="vermelho" class="mr-2 btn-danger btn" type="button" style="width: 50px; height: 50px; background-color: #8B0000; border:none;"></button>
          <button id="laranja" class="mr-2 btn-primary btn" type="button" style="width: 50px; height: 50px; background-color: #FF4500; border:none;"></button>
          <button id="marrom" class="mr-2 btn-secondary btn" type="button" style="width: 50px; height: 50px; background-color: #8B4513; border:none;"></button>
          <button id="lilas" class="mr-2 btn-danger btn" type="button" style="width: 50px; height: 50px; background-color: #4B0082; border:none;"></button>
          <button id="rosa" class="mr-2 btn-info btn" type="button" style="width: 50px; height: 50px; background-color: #C71585; border:none;"></button>
        </div>
        </div>
      </form> 

    </div>
  </div>
</div>
<!-- modal permissão-->

<div class="modal fade" id="alteraConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="mr-2">
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo($_SESSION['p_nome']);?><br> Insira seu usuário e senha para alterar os dados</h5>
        <hr>
       <form class="form-group" action="" method="POST" id="formAltera">
            <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
                <input type="text" name="emailConfig" id="emailConfig" placeholder="USUÁRIO" class="form-control limpa" autofocus>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-key"></i>
                  </div>
                </div>
                <input type="password" name="passConfig" id="passConfig" placeholder="SENHA" class="form-control limpa">
            </div>
          <div class="modal-footer mb-n4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            <button type="button" class="btn btn-success" id="btnLibera">VALIDAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('modal/modalAlertas/modalRespostas.php');?>

<script type="text/javascript">
  setTimeout(function() {
     $('#salvo').fadeOut('fast');
  }, 4000);
</script>

<script type="text/javascript" src="js/coresSistema.js"></script>
<script type="text/javascript" src="js/carregaCNPJ.js"></script>

<script type="text/javascript">
    
    $('#btnLibera').click(function(e) {
    e.preventDefault();
    var dados = $('#formAltera').serialize();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'validacoes/alteraConfig.php',
        async: true,
        data: dados,
        success: function(response) {
            if (success = true){
                $('.limpa').val('')
                $('#alteraConfig').modal('hide') 
                // Redirecionando para o painel
                $('.deslbloquia').removeAttr('disabled')
                $('#troca2').html("cancelar edição")
                $('#troca2').removeAttr('data-toggle')
                $('#troca2').removeAttr('data-target')
               return false;
            }
        
          },
        error: function (response) {
         
               $('.limpa').val('') 
               $('#alteraConfig').modal('hide') 
                // Exibimos a mensagem de erro
                $('#modalFalha').modal('show')
                $('#ModalMensagemErro').html('Usuário ou senha inválidos.') 
        }
    });

    return false;
});

</script>

<script type="text/javascript">
     $('#troca2').click(function() {
        $('.deslbloquia').attr({'disabled': 'disabled'})
        $('#troca2').html("editar")
        $('#troca2').attr("data-toggle","modal")
        $('#troca2').attr("data-target","#alteraConfig")
        });
</script>

  <script type="text/javascript"> 
    var bt = document.getElementById('troca');

    $('#troca').click(function() {
        $('input').each(function() {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
      
        
            }
            else {
                $(this).attr({
                    'disabled': 'disabled'
                });
            }
        });

    //DESABILITA BOTAO ATUALIZAR

    $('#salvar').each(function() {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
          
        //ALTERA O TEXTO DO BOTÃO
        $('button#troca').text("cancelar edição").attr({
      title:"Cancelar edição"
    });
            }
            else {
        //ALTERA O TEXTO DO BOTÃO
        $('button#troca').text("editar").attr({
      title:"Editar dados do produto"
    });
                $(this).attr({
                    'disabled': 'disabled'
                });
            }
        });
    });

  
 /* function carregaCNPJ(cnpj) {
      
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
        }-->*/

      
  </script>
<?php }?>