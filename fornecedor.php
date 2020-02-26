<?php
  if(!isset($_SESSION))
  {
    session_start();
	  
	  //FUNÇÃO MÁSCARA CNPJ/CPF
	  function formatCnpjCpf($value)
		{
		  $cnpj_cpf = preg_replace("/\D/", '', $value);

		  if (strlen($cnpj_cpf) === 11) {
			return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
		  } 

		  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
		}
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

?>
<script type="text/javascript" src="js/mascara.js"></script>

<div class="wrapper">

  <?php include('validacoes/menu.php'); ?>

    <div class="d-flex justify-content-between">
       <span class="mt-n4 mb-2 lead"><i class="fas fa-truck mr-2"></i><?php echo "FORNECEDOR";?></span>
       <span class="mt-n4 mb-2 lead">
        <?php if (isset($_SESSION['empresaNome'])) { echo $_SESSION['empresaNome'];} ?>
       </span>
    </div>
<!-- mensagens de erro-->
  <?php if(isset($_GET['excluir'])){ ?>
  <div class="text-center bg-danger mb-3 p-2 h5" id="salvo">Fornecedor excluido com sucesso!</div>
  <?php }?>
  <?php if(isset($_GET['alterar'])){ ?>
  <div class="text-center bg-primary mb-3 p-2 h5" id="salvo">Fornecedor alterado com sucesso!</div>
  <?php }?>
  <?php if(isset($_GET['salvo'])){ ?>
  <div class="text-center bg-success mb-3 p-2 h5" id="salvo">Fornecedor salvo com sucesso!</div>
  <?php }?>
<!--fim de mensagens de erro-->
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
<!-- tabela fornecedor -->
  <table class="shadow responsive text-center hover display compact stripe nowrap" id="minhaTabela">
  <thead>
    <tr>
      <th>NOME</th>
      <th>CNPJ</th>
      <th>REPONSÁVEL</th>
      <th>TELEFONE</th>
      <th>ATIVO</th>
      <th class="text-center">AÇÕES</th>
    </tr>
  </thead>
  <tbody>
   <?php  
    if (isset($_SESSION['empresaNome']))
    {
      
      include('banco/conexao.php');
        $script = "SELECT * FROM Tb_Fornecedor 
        WHERE Tb_Fornecedor.ativo = 1";
        $sql = mysqli_query($conn, $script);
      
    //----------------------------------------------------------------------------------------
        
      if(mysqli_num_rows($sql) > 0)
      {

        while($linha = mysqli_fetch_assoc($sql))
        {
          $_SESSION['id'] = $linha['idFornecedor'];
          $_SESSION['nomeFornecedor'] = $linha['nomeFornecedor'];
          $_SESSION['cnpj'] =  $linha['cnpj'];
          $_SESSION['cep'] = $linha['cep'];
          $_SESSION['endereco'] = $linha['endereco'];
          $_SESSION['numero'] = $linha['numero'];
          $_SESSION['bairro'] = $linha['bairro'];
          $_SESSION['cidade'] = $linha['cidade'];
          $_SESSION['estado'] = $linha['estado'];
          $_SESSION['nomeResponsavel'] = $linha['nomeResponsavel'];
          $_SESSION['telefoneComercial'] = $linha['telefoneComercial'];
          $_SESSION['telefoneCelular'] = $linha['telefoneCelular'];
          $_SESSION['eMail'] = $linha['eMail'];
          $_SESSION['idUsuarioCadastro'] = $linha['idUsuarioCadastro'];
          $codFunc = $_SESSION['id'];
          $ativo = $linha['ativo'];
          if ($ativo = "1") {
            $ativo = "ATIVO";
          }else{
            $ativo = "INATIVO";
          }
            $nome = $linha['nomeFornecedor'];
            //conta numero de caracteres da string
            $tam = strlen($nome);
          ?>

          <tr>
            <td><?php 
              //se string tiver mais que 25 caracteres
              //Exibe apenas 25 caracteres
                 if($tam > 30){ $rest = substr($nome, 0, 30); 
                    echo $rest . "...";
                  }else{
                    echo $nome;
                  } ?>
                    
            </td>
            <td><?php $cnpjResult = formatCnpjCpf($linha['cnpj']); echo $cnpjResult;  ?></td>
            <td><?php echo $linha['nomeResponsavel']; ?></td>
            <td><?php echo mask($linha['telefoneComercial'],'(##)####-####'); ?></td>
            <td><?php echo $ativo; ?></td>
            <td class="row mx-auto">
            
            <!-- botão excluir -->
              
              <button class="btn btn-sm mt-n1" data-toggle="modal" data-target="#modalExcluirFornecedor" value="<?php echo $linha['idFornecedor']; ?>" 
                data-altfunc="<?php echo $linha['idFornecedor']; ?>">
                <span class="fas fa-trash text-danger"></span>
              </button>
            
            <!-- botão informações -->
              <button class="btn btn-sm mt-n1" data-toggle="modal" data-target="#modalAlterarFornecedor" value="<?php echo $linha['idFornecedor']; ?>" 
                data-altforn="<?php echo $linha['idFornecedor']; ?>" 
                data-altnome="<?php echo $linha['nomeFornecedor']; ?>"
                data-altcnpj="<?php echo $cnpjResult = formatCnpjCpf($linha['cnpj']); echo $cnpjResult; ?>"  
                data-altcep="<?php echo mask($linha['cep'],'#####-###'); ?>" 
                data-altend="<?php echo $linha['endereco']; ?>" 
                data-altnum="<?php echo $linha['numero']; ?>"
                data-altbairro="<?php echo $linha['bairro']; ?>" 
                data-altcidade="<?php echo $linha['cidade']; ?>"
                data-altestado="<?php echo $linha['estado']; ?>" 
                data-altemail="<?php echo $linha['eMail']; ?>" 
                data-altresponsavel="<?php echo $linha['nomeResponsavel']; ?>" 
                data-alttel="<?php echo mask($linha['telefoneComercial'],'(##)####-####'); ?>" 
                data-altcel="<?php echo mask($linha['telefoneCelular'],'(##)#####-####'); ?>"
                data-altcadastradoPor="<?php echo $linha['idUsuarioCadastro']; ?>">
                <span class="fas fa-info text-warning"></span>
              </button>
            </td>
          </tr>
  <?php }
      }
    }?>
      
  </tbody>
</table>  
<!--fim da tabela fornecedor -->
</div>
<!-- Modal Cadastra Pessoas-->
<div class="modal fade bd-example-modal-lg" id="modalPessoas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container">
      <div class="modal-header">
        <h3 class="mx-auto" id="exampleModalLabel">CADASTRO DE FORNECEDOR</h3>
      </div>
      <div class="modal-body">
               <div id="mensagemFornecedor"></div>
        <form class="form-group" action="validacoes/validaFornecedor.php" method="post" id="cadastroFornecedor">
            
          <div class="row mt-2">
            <div class="col-1">
              <label class="col-form-label" >CNPJ:</label>
            </div>
            <div class="col-4">
              <input type="text" id="cnpj" name="cnpj" onKeyPress="MascaraCNPJ(cnpj);" maxlength="18" class="form-control" onblur="carregaCNPJ(this.value)" autofocus>  
              <div class="invalid-feedback d-none" id="campoCNPJ">Campo CNPJ vazio</div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">NOME:</label>
            </div>
            <div class="col-11">
              <input type="text" id="nome" name="nomeEmpresa" class="form-control"> 
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">CEP:</label> 
            </div>
            <div class="col-4">
              <input type="text" id="cep" name="cep" onKeyPress="MascaraCep(cep);" maxlength="10" class="form-control">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">END:</label>
            </div>
            <div class="col-8">
              <input type="text" id="endereco" name="endereco" class="form-control">
            </div>
            <div class="col-1">
              <label class="col-form-label">Nº:</label>
            </div>
            <div class="col-2">
              <input type="text" id="numEmpresa" name="numEmpresa" class="form-control">  
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">BAIRRO:</label>
            </div>
            <div class="col-3"> 
              <input type="text" id="bairro" name="bairro" class="form-control">
            </div>
            <div class="col-1">
              <label class="col-form-label">CIDADE:</label>  
            </div>
            <div class="col-3">
              <input type="text" id="cidade" name="cidade" class="form-control">
            </div>
            <div class="col-1">
              <label class="col-form-label">ESTADO:</label> 
            </div>
            <div class="col-3">
               <select class="form-control" id="uf" name="estado">
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

          <div class="row mt-3">
            <div class="col-3">
              <label class="col-form-label">NOME RESPONSÁVEL:</label> 
            </div>
            <div class="col-9">
              <input type="text" id="nomeResponsavel" name="nomeResponsavel" class="form-control">
            </div> 
          </div>

          <div class="row mt-3">
            <div class="col-1">                       
              <label class="col-form-label">EMAIL:</label>
            </div>
            <div class="col-11">
              <input type="text" id="emailEmpresa" name="emailEmpresa" class="form-control">
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">                       
              <label class="col-form-label">TEL:</label>
            </div>
            <div class="col-5">
              <input type="text" id="tel" name="tel" onKeyPress="MascaraTelefone(tel);" maxlength="14" class="form-control">
            </div>
            <div class="col-1">                       
              <label class="col-form-label">CEL:</label>
            </div>
            <div class="col-5">
              <input type="text" id="cel" name="cel"  onKeyPress="MascaraTelefone(cel);" maxlength="14" class="form-control">
            </div>
          </div>
           
            <div class="modal-footer mt-3">
              <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">FECHAR</button>
              <button class="btn btn-lg btn-success" type="submit">SALVAR</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<?php include('modal/modalFornecedor.php');?>


<script type="text/javascript" src="js/fornecedor/validacaoFornecedor.js"></script>
<script type="text/javascript" src="js/fornecedor/carregaModalFornecedor.js"></script>
<script type="text/javascript" src="js/carregaCNPJ.js"></script>

<script type="text/javascript">

$(document).ready(function(){
      $('#minhaTabela').DataTable({
           colReorder: true,
         "searching": true,
         "language": {
            "search": "Pesquise por:",
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
</script>

<script type="text/javascript">
  setTimeout(function() {
     $('#salvo').fadeOut('fast');
  }, 2000);
</script>

<!--<script type="text/javascript">
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
</script>-->