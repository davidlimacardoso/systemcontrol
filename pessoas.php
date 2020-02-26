<?php


  if(!isset($_SESSION))
  {
    session_start();
  }
?>
<style type="text/css">
  #minhaTabela_filter{
    display: flex;
    flex-flow: row wrap;
    align-items: center;
}
</style>
<script type="text/javascript" src="js/mascara.js"></script>

<div class="wrapper">

  <?php include('validacoes/menu.php'); ?>

    <div class="d-flex justify-content-between">
       <span class="mt-n4 mb-3 lead"><i class="fas fa-users mr-2"></i><?php echo "FUNCIONÁRIOS"; ?></span>
       <span class="mt-n4 mb-2 lead">
        <?php date_default_timezone_set("America/Sao_Paulo");
        $data = date('Y-m-d H:i'); 
        if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
       </span>
    </div>

  <?php if(isset($_GET['excluir'])){ ?>
  <div class="text-center bg-danger mb-3 p-2 h5" id="salvo">Funcionário excluido com sucesso!</div>
  <?php }?>
  <?php if(isset($_GET['alterar'])){ ?>
  <div class="text-center bg-primary mb-3 p-2 h5" id="salvo">Funcionário alterado com sucesso!</div>
  <?php }?>
  <?php if(isset($_GET['salvo'])){ ?>
  <div class="text-center bg-success mb-3 p-2 h5" id="salvo">Funcionário salvo com sucesso!</div>
  <?php }?>
  <?php if(isset($_GET['senhaAlterara'])){ ?>
  <div class="text-center bg-success mb-3 p-2 h5" id="salvo">Senhas alterada com sucesso!</div>
  <?php }?>
  <?php if (isset($_GET['dados']) && $_GET['dados']='erro' ) { ?>
    <div class="text-center bg-danger mb-3 p-2 h5" id="salvo">Não foi possível alterar a senha. Por favor tente novamente mais tarde.</div>
  <?php }?>
  <?php 
				   			if(isset($_SESSION['msgCad'])){
							echo $_SESSION['msgCad'];
							unset($_SESSION['msgCad']);
		}
				   	?>

  <!-- gif load-->
      <div class="text-center corFundoLoad" id="fundoLoad" style="display:none;">
          <div class="load" id="loading" style="display:none;">
              <div class="spinner-grow text-light" role="status">
                  <span class="sr-only">Loading...</span>
              </div>
              <p class=" text-light">Alterando a senha, porfavor aguarde...</p>
          </div>
      </div>
    <!-- fim gif load-->

    <div class="mb-3">
        <div class="row">
          <div class="col-4">
            <button type="button" class="btn text-light" data-toggle="modal" data-target="#modalPessoas" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;">
              <i class="fas fa-plus-circle mr-2"></i>
               ADICIONAR
            </button>
          </div>
        </div>
    </div>
  <table class="shadow responsive text-center hover compact stripe nowrap" id="minhaTabela">
  <thead>
    <tr>
      <th>NOME</th>
      <th>CPF</th>
      <th>CARGO</th>
      <th>USUÁRIO</th>
      <th>DATA CADASTRO</th>
      <th>ATIVO</th>
      <th class="text-center">AÇÕES</th>
    </tr>
  </thead>
  <tbody id="tabelaPessoas">
   <?php  
    if (isset($_SESSION['empresaNome']))
    {   
		
		//MÁSCARA CPF CNPJ
	  function formatCnpjCpf($value)
	{
	  $cnpjcpf = preg_replace("/\D/", '', $value);

	  if (strlen($cnpjcpf) === 11) {
		return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpjcpf);
	  } 

	  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpjcpf);
	}
	
		
	//MASCARA PERSONALIZADAS	
	function mask($val, $mask){
             $maskared = '';
            $k = 0;
            for($i = 0; $i<=strlen($mask)-1; $i++){ if($mask[$i] == '#') { if(isset($val[$k])) 
                $maskared .= $val[$k++];
                     }
            else {
                if(isset($mask[$i]))
                     $maskared .= $mask[$i];
            }
         }    
         return $maskared;
    }
		$_SESSION['urlAtual'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";//PEGAR PÁGINA ATUAL E ARMAZENAR
      include('banco/conexao.php');

      if(isset($_GET["pesquisaPor"]) && $_GET["pesquisaPor"] != ""){
        $pesquisaPor = $_GET["pesquisaPor"];
        $script = "SELECT * FROM Tb_Usuario 
        left join Tb_Perfil ON (Tb_Usuario.idPerfil = Tb_Perfil.idPerfil )
        WHERE Tb_Usuario.nomeUsuario like '%$pesquisaPor%' && Tb_Usuario.ativo = 1";
        $sql = mysqli_query($conn, $script);
      }else{
        $script = "SELECT * FROM Tb_Usuario 
        left join Tb_Perfil ON (Tb_Usuario.idPerfil = Tb_Perfil.idPerfil ) 
        WHERE Tb_Usuario.ativo = 1 
        ORDER BY nomeUsuario ASC ";
        $sql = mysqli_query($conn, $script);
      }
    //----------------------------------------------------------------------------------------
        
      if(mysqli_num_rows($sql) > 0)
      {

        while($linha = mysqli_fetch_assoc($sql))
        {
          $_SESSION['id'] = $linha['idUsuario'];
          $_SESSION['nomeUsuario'] = $linha['nomeUsuario'];
          $_SESSION['cpf'] =  $linha['cpf'];
          $_SESSION['rg'] = $linha['rg'];
          $_SESSION['nomePerfil'] = $linha['nomePerfil'];
          $_SESSION['cep'] = $linha['cep'];
          $_SESSION['endereco'] = $linha['endereco'];
          $_SESSION['numero'] = $linha['numero'];
          $_SESSION['bairro'] = $linha['bairro'];
          $_SESSION['cidade'] = $linha['cidade'];
          $_SESSION['estado'] = $linha['estado'];
          $_SESSION['eMail'] = $linha['eMail'];
          $_SESSION['nickName'] = $linha['nickName'];
          $_SESSION['senha'] = $linha['senha'];
          $_SESSION['tel'] = $linha['tel'];
          $_SESSION['cel'] = $linha['cel'];
          $_SESSION['dataAtualizacao'] = $linha['dataAtualizacao'];
          $codFunc = $_SESSION['id'];
          $ativo = $linha['ativo'];
          if ($ativo = "1") {
            $ativo = "ATIVO";
          }else{
            $ativo = "INATIVO";
          }
          $nome = $linha['nomeUsuario'];
            //conta numero de caracteres da string
            $tam = strlen($nome);
          ?>

          <tr>
            <td><?php 
              //se string tiver mais que 25 caracteres
              //Exibe apenas 25 caracteres
                 if($tam > 30){ $rest = substr($nome, 0, 30); 
                    echo $rest . " ...";
                  }else{
                    echo $nome;
                  } ?>
                    
            </td>
            <td><?php echo $retornoCpfCnpj = formatCnpjCpf($linha['cpf']); ?></td>
            <td><?php echo $linha['nomePerfil']; ?></td>
            <td><?php echo $linha['nickName']; ?></td>
            <td><?php echo date('d/m/Y', strtotime($linha['dataCadastro'])); ?></td>
            <td><?php echo $ativo; ?></td>
            <td class="row ml-auto">

              <button class="btn btn-sm mt-n1" data-toggle="modal" data-target="#modalSenha" value="<?php echo $linha['idUsuario']; ?>" 
                data-altfunc="<?php echo $linha['idUsuario']; ?>"
                data-altsnome="<?php echo $linha['nickName']; ?>"
                data-altsemail="<?php echo $linha['eMail']; ?>">
                <span class="fas fa-key text-secondary"></span>
              </button>
            
            <!-- botão excluir -->
              
              <button class="btn btn-sm mt-n1" data-toggle="modal" data-target="#modalExcluir" value="<?php echo $linha['idUsuario']; ?>" 
                data-altfunc="<?php echo $linha['idUsuario']; ?>">
                <span class="fas fa-trash text-danger"></span>
              </button>
            
            <!-- botão informações -->
              <button class="btn btn-sm mt-n1" data-toggle="modal" data-target="#modalAlterar" value="<?php echo $linha['idUsuario']; ?>" 
                data-altfunc="<?php echo $linha['idUsuario']; ?>" 
                data-altnome="<?php echo $linha['nomeUsuario']; ?>"
                data-altrg="<?php echo  mask($linha['rg'],'##.###.###-#'); ?>" 
                data-altcpf="<?php echo formatCnpjCpf($linha['cpf']); ?>"
                data-altcargo="<?php echo $linha['idPerfil']; ?>"
                data-altsexo="<?php echo $linha['sexo']; ?>"  
                data-altcep="<?php echo $linha['cep']; ?>" 
                data-altend="<?php echo $linha['endereco']; ?>" 
                data-altnum="<?php echo $linha['numero']; ?>"
                data-altbairro="<?php echo $linha['bairro']; ?>" 
                data-altcidade="<?php echo $linha['cidade']; ?>"
                data-altestado="<?php echo $linha['estado']; ?>" 
                data-altemail="<?php echo $linha['eMail']; ?>" 
                data-altuser="<?php echo $linha['nickName']; ?>" 
                data-altsenha="<?php echo $linha['senha']; ?>" 
                data-alttel="<?php echo $linha['tel']; ?>"
                data-altcel="<?php echo $linha['cel']; ?>">
                <span class="fas fa-info text-warning"></span>
              </button>
            </td>
          </tr>
  <?php }
      }
    }?>
      
  </tbody>
  </table>


</div>
<!-- Modal Cadastra Pessoas-->
<div class="modal fade bd-example-modal-lg" id="modalPessoas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container">
      <div class="modal-header">
        <h3 class="mx-auto" id="exampleModalLabel">CADASTRO DE USUÁRIO</h3>
      </div>
      <div class="modal-body">
       <div id="mensagemFunc"></div>
        <?PHP 
          include('banco/conexao.php');
          $script = "SELECT * FROM Tb_Perfil";
          $sql = mysqli_query($conn, $script);
         ?>
        <form class="form-group" action="validacoes/validaFuncionario.php" method="post" id="cadastroFunc">
            
            <div class="form-group row">
              <div class="col-1">
                <label for="PerfilNome" class="col-form-label">NOME</label>
              </div>
              <div class="col-11">
                <input type="text" name="PerfilNome" id="PerfilNome" class="form-control" autofocus>
                <div class="invalid-feedback d-none" id="ErradoNomePerfil">Campo nome vazio
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="rg" class="col-form-label">RG</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="rg" name="rg" onKeyPress="MascaraRG(rg);" maxlength="12">
                <div class="invalid-feedback d-none" id="ErradoRg">Campo RG vazio</div>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CPF</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="cpf" name="cpf" onKeyPress="MascaraCPF(cpf);" maxlength="14">
                <div class="invalid-feedback d-none" id="ErradoCpf">Campo CPF vazio</div>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CARGO</label>
              </div>
              <div class="col-3">
                <select class="form-control" id="cargo" name="cargo">
                  <option value="" selected>---SELECIONE---</option> 
                  <?php while($linha = mysqli_fetch_assoc($sql)) {?>
                    <option value="<?php echo $linha['idPerfil'];?>"><?php echo $linha['nomePerfil'];?></option>
                  <?php }?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="estado" class="col-form-label">SEXO</label>
              </div>
              <div class="col-3">
                <select class="form-control" id="sexo" name="sexo">
                  <option value="" selected>---SELECIONE---</option>
                  <option value="M">MASCULINO</option>
                  <option value="F">FEMININO</option>
                </select>
              </div>
              <div class="col-1">
                <label for="cepEndereco" class="col-form-label">CEP</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="cep" name="cepEndereco" onKeyPress="MascaraCep(cep);" maxlength="10" onblur="getDadosEnderecoPorCEP(this.value)">
                <div class="invalid-feedback d-none" id="ErradoCep">Campo CEP vazio</div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="endUm" class="col-form-label">END.</label>
              </div>
              <div class="col-8">
                <input type="text" class="form-control" id="endereco" name="end">
                <div class="invalid-feedback d-none" id="ErradoEnd">Campo Endereço vazio</div>
              </div>
                <div class="col-1">
                  <label for="numero" class="col-form-label">Nº</label>
                </div>
                <div class="col-2">
                  <input type="text" class="form-control" id="numero" name="numero">
                  <div class="invalid-feedback d-none" id="ErradoNum">Campo Nº vazio</div>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-md-1">
                <label for="cidade" class="col-form-label">BAIRRO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="bairro" name="bairro">
                <div class="invalid-feedback d-none" id="ErradoCity">Campo Cidade vazio</div>
              </div>
              <div class="col-1">
                <label for="cidade" class="col-form-label">CIDADE</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="cidade" name="cidade">
                <div class="invalid-feedback d-none" id="ErradoCity">Campo Cidade vazio</div>
              </div>
              <div class="col-1">
                <label for="estado" class="col-form-label">ESTADO</label>
              </div>
              <div class="col-3">
                <select class="form-control" id="estado" name="estado">
                  <option value="" selected>---SELECIONE---</option>
                  <option value="AC">Acre</option>
                  <option value="AL">Alagoas</option>
                  <option value="AP">Amapá</option>
                  <option value="AM">Amazonas</option>
                  <option value="BA">Bahia</option>
                  <option value="CE">Ceará</option>
                  <option value="DF">Distrito Federal</option>
                  <option value="ES">Espírito Santo</option>
                  <option value="GO">Goiás</option>
                  <option value="MA">Maranhão</option>
                  <option value="MT">Mato Grosso</option>
                  <option value="MS">Mato Grosso do Sul</option>
                  <option value="MG">Minas Gerais</option>
                  <option value="PA">Pará</option>
                  <option value="PB">Paraíba</option>
                  <option value="PR">Paraná</option>
                  <option value="PE">Pernambuco</option>
                  <option value="PI">Piauí</option>
                  <option value="RJ">Rio de Janeiro</option>
                  <option value="RN">Rio Grande do Norte</option>
                  <option value="RS">Rio Grande do Sul</option>
                  <option value="RO">Rondônia</option>
                  <option value="RR">Roraima</option>
                  <option value="SC">Santa Catarina</option>
                  <option value="SP">São Paulo</option>
                  <option value="SE">Sergipe</option>
                  <option value="TO">Tocantins</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">                
                <label for="email" class="col-form-label">EMAIL</label>
              </div>
              <div class="col-6">
                <input type="text" name="email" id="email" class="form-control">
                <div class="invalid-feedback d-none" id="ErradoEmail">Campo email vazio</div>
              </div>
              <div class="col-1">
                <label for="user" class="col-form-label ml-n1">USUÁRIO</label>
              </div>
              <div class="col-4">
                <input type="text" name="user" id="user" class="form-control">
                <div class="invalid-feedback d-none" id="ErradoUserPerfil">Campo usuario vazio</div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">                
                <label for="senha" class="col-form-label">SENHA</label>
              </div>
              <div class="col-4">
                <input type="password" name="senha" id="senha" class="form-control">
                <div class="invalid-feedback d-none" id="ErradoEmail">Campo senha vazio</div>
              </div>
              <div class="col-3">
                <label for="confSenha" class="col-form-label ml-4">CONFIRMA SENHA</label>
              </div>
              <div class="col-4">
                <input type="password" name="confSenha" id="confSenha" class="form-control ">
                <div class="invalid-feedback d-none" id="ErradoUserPerfil">Campo confirma senha vazio</div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="telefone" class="col-form-label">TEL</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control" id="tel" name="telefone" onKeyPress="MascaraTelefone(tel);" maxlength="14">
                <div class="invalid-feedback d-none" id="ErradoTel">Campo Telefone vazio</div>
              </div>
              <div class="col-1">
                <label for="celular" class="col-form-label ml-n1">CELULAR</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control" id="cel" name="celular" onKeyPress="MascaraCelular(cel);" maxlength="15">
              </div>
            </div>
           
            <div class="modal-footer">
              <?php if(isset($_GET['senhaCadastro'])){ ?>
                <div class="text-center bg-danger mb-3 p-2 h5" id="salvo">Senhas não conferem</div>
              <?php }?>
              <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">FECHAR</button>
              <button class="btn btn-lg btn-success" type="submit">SALVAR</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<script>
//********************* 	MENSAGEM AJAX DO INSERT DO PRODUTO E VERIFICA SE JÁ EXISTENTE	 ****************************
	
	$('#cadastroFunc').keyup(function(e){
		e.preventDefault();
		var formularioPesq = $(this);
		var retornoPesq = addFormPesq(formularioPesq)
	});
	
	function addFormPesq(dados){
		
		$.ajax({
			type:"POST",
			data:dados.serialize(),
			url:"validacoes/validaPesqFunc.php",
			sync:false
		}).done(function retornaMensagemPesq(data){
				$sucesso = $.parseJSON(data)["sucesso"];
				$mensagem = $.parseJSON(data)["mensagem"];

				if($sucesso == false){
					
					//$('#mensagemProduto').html($mensagem);
					$('#mensagemFunc').html($mensagem);			
						
				}else{
					
					$('#mensagemFunc').html('');			
				}

			}).fail(function(){
			//ESSA MENSAGEM SÓ EXIBE QUANDO NAO PODE SE COMUNICAR COM A VALIDAÇÃO NO URL:
				$('#mensagemFunc').html('<div class="btn-warning">Erro no sistema tente mais tarde...</div>').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );

			}).always(function(){
				
				$('#mensagemFunc').show();
			});
	}
	
	/*$('#cadastroFunc').submit(function(e){
		e.preventDefault();
		var formularioFunc = $(this);
		var retornoFunc = addFormFunc(formularioFunc)
	});
	
	
	function addFormFunc(dados){
		
		$.ajax({
			type:"POST",
			data:dados.serialize(),
			url:"validacoes/validaFuncionario.php",
			sync:false
		}).done(function retornaMensagemFunc(data){
				$sucesso = $.parseJSON(data)["sucesso"];
				$mensagem = $.parseJSON(data)["mensagem"];

				if($sucesso){
					//$('#mensagemTipoProduto').html($mensagem);
					$("#mensagemFunc" ).html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
					$('#cadastroFunc input,select').each(function(){
						$(this).val('');
					})
				}else{
					//EXIBEQUANDOACONTECEALGUMA FALHA NO MOMENTO DA ALTERAÇÃO
					$('#mensagemFunc').html($mensagem).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
				}

			}).fail(function(){
			//ESSA MENSAGEM SÓ EXIBE QUANDO NAO PODE SE COMUNICAR COM A VALIDAÇÃO NO URL:
				$('#mensagemFunc').html('<div class="btn-warning">Erro no sistema tente mais tarde...</div>').fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );

			}).always(function(){
				
				$('#mensagemFunc').show();
			});
			
	}*/
	

</script>
<?php include('modal/modalFuncionarios.php');?>
<?php include('modal/modalAlertas/modalRespostas.php');?>
<script type="text/javascript">

  setTimeout(function() {
     $('#salvo').fadeOut('fast');
  }, 2000);

</script>
<script type="text/javascript" src="js/funcionarios/validacaoFunc.js"></script>
<script type="text/javascript" src="js/funcionarios/carregamodalFunc.js"></script>


<script type="text/javascript">
  $('#btnAlteraSenha').click(function(e) {
            e.preventDefault();
            $('#modalSenha').modal('hide');
            $('#loading').show();
            $('#fundoLoad').show();
            $('#fundoLoad').css("margin-left","-220px");
            $('#fundoLoad').css("margin-top","-110px");
            var dados = $('#formAlteraSenha').serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'validacoes/alteraSenha.php',
                async: true,
                data: dados,
                success: function(response) {
                    
                    if (success = true) {
                        $('.load').hide()
                        $('.corFundoLoad').hide()
                        $('input').val('')
                        $('#modalAcerto').modal('show')
                        $('#ModalMensagem').html('E-mail validado com sucesso.<br>Enviamos um email com instruções para recuperação de sua senha.') 

                    }else{
                        $('.load').hide()
                        $('.corFundoLoad').hide()
                        $('input').val('')
                        $('#modalFalha').modal('show') 
                        $('#ModalMensagemErro').html('Falha ao recuperar sua senha. </br>E-mail inválido.')
                    }
                    
                }
            });

            return false;
        });
</script>
<script type="text/javascript">
$(document).ready(function(){
      $('#minhaTabela').DataTable({
           colReorder: true,
         "searching": true,
         "language": {
            "search": "Pesquisar:",
             "paginate": {
                "previous": "Anterior",
                "next": "Proxima"
              },
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
           },

           dom: 'frtBp',
           buttons: [ 'excel' ,'print']
      });
      $('#minhaTabela_filter').addClass('form-inline');
      $('#minhaTabela_filter').addClass('mb-3');
      $('#minhaTabela_filter').addClass('mt-n5');
  });

  function getDadosEnderecoPorCEP(cep) {
      
    var CEP = cep.replace(/[^0-9]/g,'')
  
        let url = 'https://viacep.com.br/ws/'+CEP+'/json/unicode/'
        let xmlHttp = new XMLHttpRequest()
        xmlHttp.open('GET', url)

        xmlHttp.onreadystatechange = () => {
          if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            let dadosJSONText = xmlHttp.responseText
            let dadosJSONObj = JSON.parse(dadosJSONText)

            document.getElementById('endereco').value = dadosJSONObj.logradouro
            document.getElementById('bairro').value = dadosJSONObj.bairro
            document.getElementById('cidade').value = dadosJSONObj.localidade
            document.getElementById('estado').value = dadosJSONObj.uf
            
          }
        }

        xmlHttp.send()
      }
</script>