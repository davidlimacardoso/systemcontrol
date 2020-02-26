<script type="text/javascript">
   //-----------------   DESABILITAR/HABILITAR CAMPOS MODAL DETALHES COM JQUERY 1.6  -----------------------------

$().ready(function () {
  var bt = document.getElementById('clicker');

  $('#clicker').click(function () {
    $('.bloq').each(function () {
      if ($(this).attr('disabled')) {
        $(this).removeAttr('disabled');


      } else {
        $(this).attr({
          'disabled': 'disabled'
        });
      }
    });
    $('select').each(function () {
      if ($(this).attr('disabled')) {
        $(this).removeAttr('disabled');
      } else {
        $(this).attr({
          'disabled': 'disabled'
        });
      }
    });
    //DESABILITA BOTAO ATUALIZAR
    $('#atualizaDados').each(function () {
      if ($(this).attr('disabled')) {
        $(this).removeAttr('disabled');

        //ALTERA O TEXTO DO BOTÃO
        $('button#clicker').text("Cancelar").attr({
          title: "Cancelar edição"
        });
         $('button#clicker').addClass('btn-danger');
      } else {
        $('button#clicker').removeClass('btn-danger');
        $('button#clicker').addClass('btn-success');
        //ALTERA O TEXTO DO BOTÃO
        $('button#clicker').text("Editar").attr({
          title: "Editar dados do funcionario"
        });
        $(this).attr({
          'disabled': 'disabled'
        });
      }
    });
  });
});
</script>
<!-- modal permissão-->
<div class="modal fade" id="modalPermissao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo($_SESSION['p_nome']);?></h5>
      </div>
      <div class="modal-body">
        <h5 class="text-center text-danger">Voçê nao permissão para alterar usuários</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
      
<!-- modal Exclui Pessoas-->
<div class="modal fade" id="modalExcluirFornecedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo($_SESSION['p_nome']);?></h5>
      </div>
      <form class="form-group" action="validacoes/excluirFornecedor.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id" class="form-control">
          <h5 class="text-center text-danger">Voçê tem certeza que deseja excluir esse fornecedor?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button class="btn btn-danger" type="submit">EXCLUIR</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Altera Pessoas -->
<div class="modal fade bd-example-modal-lg" id="modalAlterarFornecedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container">
      <div class="modal-header">
        <h3 class="mx-auto" id="exampleModalLabel">ALTERAR FORNECEDOR</h3>
      </div>
      <div class="modal-body">
       
        <form class="form-group" action="validacoes/alteraFornecedor.php" method="POST">
            
          <div class="row mt-2">
            <div class="col-1">
              <label class="col-form-label">CNPJ:</label>
            </div>
            <div class="col-4">
              <input type="hidden" name="id" id="id" class="bloq" disabled>
              <input type="text" id="cnpj" name="cnpj" onKeyPress="MascaraCNPJ(cnpj);" maxlength="18" class="form-control bloq" onblur="carregaCNPJ(this.value)" disabled>  
              <div class="invalid-feedback d-none" id="campoCNPJ">Campo CNPJ vazio</div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">NOME:</label>
            </div>
            <div class="col-11">
              <input type="text" id="nomeEmpresa" name="nomeEmpresa" class="form-control bloq" disabled> 
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">CEP:</label> 
            </div>
            <div class="col-4">
              <input type="text" id="cep" name="cep" onKeyPress="MascaraCep(cep);" maxlength="9" class="form-control bloq" disabled>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">END:</label>
            </div>
            <div class="col-8">
              <input type="text" id="endereco" name="endereco" class="form-control bloq" disabled>
            </div>
            <div class="col-1">
              <label class="col-form-label">Nº:</label>
            </div>
            <div class="col-2">
              <input type="text" id="numEmpresa" name="numEmpresa" class="form-control bloq" disabled>  
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">
              <label class="col-form-label">BAIRRO:</label>
            </div>
            <div class="col-3"> 
              <input type="text" id="bairro" name="bairro" class="form-control bloq" disabled>
            </div>
            <div class="col-1">
              <label class="col-form-label">CIDADE:</label>  
            </div>
            <div class="col-3">
              <input type="text" id="cidade" name="cidade" class="form-control bloq" disabled>
            </div>
            <div class="col-1">
              <label class="col-form-label">ESTADO:</label> 
            </div>
            <div class="col-3">
               <select class="form-control" id="uf" name="estado" disabled>
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
              <input type="text" id="nomeResponsavel" name="nomeResponsavel" class="form-control bloq" disabled>
            </div> 
          </div>

          <div class="row mt-3">
            <div class="col-1">                       
              <label class="col-form-label">EMAIL:</label>
            </div>
            <div class="col-11">
              <input type="text" id="emailEmpresa" name="emailEmpresa" class="form-control bloq" disabled>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-1">                       
              <label class="col-form-label">TEL:</label>
            </div>
            <div class="col-5">
              <input type="text" id="tel" name="tel" class="form-control bloq" onKeyPress="MascaraTelefone(tel);" maxlength="14" disabled>
            </div>
            <div class="col-1">                       
              <label class="col-form-label">CEL:</label>
            </div>
            <div class="col-5">
              <input type="text" id="cel" name="cel" class="form-control bloq" onKeyPress="MascaraTelefone(cel);" maxlength="14" disabled>
            </div>
          </div>
           
            <div class="modal-footer mt-3">
              <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">FECHAR</button>
              <button class="btn btn-lg btn-success" id="atualizaDados" type="submit" disabled>ATUALIZAR</button>
              <button class="btn btn-lg btn-success" id="clicker" type="button">EDITAR</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>