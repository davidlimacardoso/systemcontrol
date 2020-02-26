<script type="text/javascript">
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

 $('#alteraFunc').validate({
        errorClass: 'error',
        validClass: 'valid',

        rules : {
          PerfilNome : {
            required : true,
            minlength : 3
          },
          rg : {
            required : true,
            minlength : 12,
            maxlength : 12
          },
          cpf : {
            required : true,
            minlength : 14,
            maxlength : 14
          },
          cargo : {
            required : true
          },
          sexo : {
            required : true
          },
          cepEndereco : {
            required : true,
            minlength : 9,
            maxlength : 9
          },
          end : {
            required : true
          },
          numero : {
            required : true,
            number : true
          },
          bairro : {
            required : true
          },
          cidade : {
            required : true
          },
          estado : {
            required : true
          },
          email : {
            required : true,
            email : true
          },
          user : {
            required : true
          },
          senha : {
            required : true,
            minlength : 3,
            maxlength : 20
          },
          confSenha : {
            required : true,
            equalTo : '#senha'
          },
          telefone : {
            required : true,
            minlength : 14,
            maxlength : 14
          }
        },
        messages : {
          PerfilNome : {
            required : 'Informe o nome.'
          },
          rg : {
            required : 'Informe o RG.',
            minlength : 'O RG deve ter no mínimo 12 caracteres.'
          },
          cpf : {
            required : 'Informe o CPF.',
            minlength : 'O CPF deve ter no mínimo 14 caracteres.'
          },
          cargo : {
            required : 'Informe o Cargo.'
          },
          sexo : {
            required : 'Informe o Sexo.'
          },
          cepEndereco : {
            required : 'Informe o CEP.',
            minlength : 'O CEP deve ter no mínimo 9 caracteres.'
          },
          end : {
            required : 'Informe o Endereço.'
          },
          numero : {
            required : 'Informe o Nº.',
            number : 'Esse campo só é permitido números.'
          },
          bairro : {
            required : 'Informe o Bairro.'
          },
          cidade : {
            required : 'Informe o Cidade.'
          },
          estado : {
            required : 'Informe o Estado.'
          },
          email : {
            required : 'Informe o Email.',
            email : 'Informe um e-mail válido.'
          },
          user : {
            required : 'Informe o Usuário.'
          },
          telefone : {
            required : 'Informe o Telefone.',
            minlength : 'O Telefone deve ter no mínimo 14 caracteres.'
          },
          senha : {
            required : 'Informe a senha.',
            minlength : 'A senha deve ter, no mínimo, 3 caracteres.',
            maxlength : 'A senha deve ter, no máximo, 20 caracteres.'
          },
          confSenha : {
            required : 'Confirme a senha.',
            equalTo : 'As senhas não se correspondem.'
          }
        },
      });
</script>
<!-- modal altera senha-->
<div class="modal fade" id="modalSenha" tabindex="10" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="mx-auto" id="exampleModalLabel">ALTERAR SENHA</h5>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo($_SESSION['p_nome']);?> confirma que deseja alterar a senha?</h5>
        <form class="form-group" action="" method="POST" id="formAlteraSenha">
            <div class="form-group">
              <div class="col">
                <input type="hidden" name="id" id="id" class="form-control">
                <input type="hidden" name="nomeSenha" id="nomeSenha" class="form-control">
                <input type="hidden" name="emailSenha" id="emailSenha" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button class="btn btn-success" type="button" id="btnAlteraSenha">ALTERAR</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
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

<!-- modal ativar-->
<div class="modal fade" id="modalFuncAtivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo($_SESSION['p_nome']);?></h5>
      </div>
      <form class="form-group" action="validacoes/excluirFuncionario.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id" class="form-control">
          <h5 class="text-center text-danger">Voçê tem certeza que deseja excluir esse usuários?</h5>
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
<div class="modal fade bd-example-modal-lg" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container">
      <div class="modal-header">
        <h3 class="mx-auto" id="exampleModalLabel">ALTERAR USUÁRIO</h3>
      </div>
      <div class="modal-body">
        <?PHP 
          
         ?>
        <form class="form-group" action="validacoes/alteraFuncionario.php" method="POST" id="alteraFunc">
            
            <div class="form-group row">
              <div class="col-1">
                <label for="PerfilNome" class="col-form-label">NOME</label>
              </div>
              <div class="col-11">
                <input type="hidden" name="id" id="id" class="form-control bloq" disabled>
                <input type="text" name="PerfilNome" id="PerfilNome" class="form-control bloq" disabled>
                <div class="invalid-feedback d-none" id="ErradoNomePerfil">Campo nome vazio
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="rg" class="col-form-label">RG</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control bloq" id="rg" name="rg" onKeyPress="MascaraRG(rg);" maxlength="12" disabled>
                <div class="invalid-feedback d-none" id="ErradoRg">Campo RG vazio</div>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CPF</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control bloq" id="cpf" name="cpf" onKeyPress="MascaraCPF(cpf);" maxlength="14" disabled>
                <div class="invalid-feedback d-none" id="ErradoCpf">Campo CPF vazio</div>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CARGO</label>
              </div>
              <div class="col-3">
                <select class="form-control" name="cargo" id="cargo" disabled>
                  <option value="" selected>---SELECIONE---</option> 
                  <?php 
                  include('banco/conexao.php');
                  $script = "SELECT * FROM Tb_Perfil";
                  $sql = mysqli_query($conn, $script);
                  if(mysqli_num_rows($sql) > 0)
                        {
                          while($linha = mysqli_fetch_assoc($sql))
                          {?>
                            <option value="<?php echo $linha['idPerfil'];?>"><?php echo $linha['nomePerfil'];?></option>
                    <?php }
                        }?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="estado" class="col-form-label">SEXO</label>
              </div>
              <div class="col-3">
                <select class="form-control" id="sexo" name="sexo" disabled>
                  <?php 
                  include('banco/conexao.php');
                  $script = "SELECT * FROM Tb_Usuario";
                  $sql = mysqli_query($conn, $script);
                  if(mysqli_num_rows($sql) > 0)
                        {
                          while($linha = mysqli_fetch_assoc($sql))
                          {?>
                            <option value="<?php echo $linha['sexo'];?>">
                              <?php 
                              if( $linha['sexo'] == 'm')
                              {
                                echo "MASCULINO";
                              }else
                              {
                                echo "FEMININO";
                              };?>
                            </option>
                    <?php }
                        }?>
                </select>
              </div>
              <div class="col-1">
                <label for="cepEndereco" class="col-form-label">CEP</label>
              </div>
              <div class="col-4">
                <input type="text" class="form-control bloq" id="cep" name="cepEndereco" onKeyPress="MascaraCep(cep);" maxlength="10" onblur="getDadosEnderecoPorCEP(this.value)" disabled>
                <div class="invalid-feedback d-none" id="ErradoCep">Campo CEP vazio</div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="endUm" class="col-form-label">END.</label>
              </div>
              <div class="col-8">
                <input type="text" class="form-control bloq" id="endereco" name="end" disabled>
                <div class="invalid-feedback d-none" id="ErradoEnd">Campo Endereço vazio</div>
              </div>
                <div class="col-1">
                  <label for="numero" class="col-form-label">Nº</label>
                </div>
                <div class="col-2">
                  <input type="text" class="form-control bloq" id="numero" name="numero" disabled>
                  <div class="invalid-feedback d-none" id="ErradoNum">Campo Nº vazio</div>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-md-1">
                <label for="cidade" class="col-form-label">BAIRRO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control bloq" id="bairro" name="bairro" disabled>
                <div class="invalid-feedback d-none" id="ErradoCity">Campo Cidade vazio</div>
              </div>
              <div class="col-1">
                <label for="cidade" class="col-form-label">CIDADE</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control bloq" id="cidade" name="cidade" disabled>
                <div class="invalid-feedback d-none" id="ErradoCity">Campo Cidade vazio</div>
              </div>
              <div class="col-1">
                <label for="estado" class="col-form-label">ESTADO</label>
              </div>
              <div class="col-3">
                <select class="form-control" id="estado" name="estado" disabled>
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
                <input type="email" name="email" id="email" class="form-control bloq" disabled>
                <div class="invalid-feedback d-none" id="ErradoEmail">Campo email vazio</div>
              </div>
              <div class="col-1">
                <label for="user" class="col-form-label ml-n1">USUÁRIO</label>
              </div>
              <div class="col-4">
                <input type="text" name="user" id="user" class="form-control bloq" disabled>
                <div class="invalid-feedback d-none" id="ErradoUserPerfil">Campo usuario vazio</div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="telefone" class="col-form-label">TEL</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control bloq" id="tel" name="telefone" onKeyPress="MascaraTelefone(tel);" maxlength="14" disabled>
                <div class="invalid-feedback d-none" id="ErradoTel">Campo Telefone vazio</div>
              </div>
              <div class="col-1">
                <label for="celular" class="col-form-label ml-n1">CELULAR</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control bloq" id="cel" name="celular" onKeyPress="MascaraCelular(cel);" maxlength="14" disabled>
              </div>
            </div>

           <div class="modal-footer">
              <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">FECHAR</button>
              <button class="btn btn-lg btn-success" id="atualizaDados" type="submit" disabled>ATUALIZAR</button>
              <button class="btn btn-lg btn-success" id="clicker" type="button">EDITAR</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal informações Pessoas
<div class="modal fade bd-example-modal-lg modalprinter" id="modalInformacoes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content container">
      <div class="modal-header">
        <h3 class="mx-auto" id="exampleModalLabel">INFORMAÇÕES COMPLETAS DO USUÁRIO</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="" method="POST">
            
            <div class="form-group row">
              <div class="col-1">
                <label for="PerfilNome" class="col-form-label">NOME</label>
              </div>
              <div class="col-11">
                <input type="hidden" name="id" id="id" class="form-control" disabled>
                <input type="text" name="PerfilNome" id="PerfilNome" class="form-control" disabled>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="rg" class="col-form-label">RG</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="rg" name="rg" disabled>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CPF</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="cpf" name="cpf" disabled>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CARGO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" name="cargo" id="cargo" disabled>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="estado" class="col-form-label">SEXO</label>
              </div>
              <div class="col-3">
                <select class="form-control" id="sexo" name="sexo" disabled>
                  <option value="" selected>---SELECIONE---</option>
                  <?php 
                  include('banco/conexao.php');
                  $script = "SELECT * FROM Tb_Usuario";
                  $sql = mysqli_query($conn, $script);
                  if(mysqli_num_rows($sql) > 0)
                        {
                          while($linha = mysqli_fetch_assoc($sql))
                          {?>
                            <option value="<?php echo $linha['sexo'];?>">
                              <?php 
                              if( $linha['sexo'] == 'm')
                              {
                                echo "MASCULINO";
                              }else
                              {
                                echo "FEMININO";
                              };?>
                            </option>
                    <?php }
                        }?>
                </select>
              </div>
              <div class="col-1">
                <label for="cepEndereco" class="col-form-label">CEP</label>
              </div>
              <div class="col-4">
                <input type="text" class="form-control" id="cep" name="cepEndereco" disabled>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="endUm" class="col-form-label">END.</label>
              </div>
              <div class="col-8">
                <input type="text" class="form-control" id="endereco" name="end" disabled>
              </div>
                <div class="col-1">
                  <label for="numero" class="col-form-label">Nº</label>
                </div>
                <div class="col-2">
                  <input type="text" class="form-control" id="numero" name="numero" disabled>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-md-1">
                <label for="cidade" class="col-form-label">BAIRRO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="bairro" name="bairro" disabled>
              </div>
              <div class="col-1">
                <label for="cidade" class="col-form-label">CIDADE</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="cidade" name="cidade" disabled>
              </div>
              <div class="col-1">
                <label for="estado" class="col-form-label">ESTADO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="estado" name="estado" disabled>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">                
                <label for="email" class="col-form-label">EMAIL</label>
              </div>
              <div class="col-6">
                <input type="email" name="email" id="email" class="form-control" disabled>
              </div>
              <div class="col-1">
                <label for="user" class="col-form-label ml-n1">USUÁRIO</label>
              </div>
              <div class="col-4">
                <input type="text" name="user" id="user" class="form-control" disabled>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-1">
                <label for="telefone" class="col-form-label">TEL</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control" id="tel" name="telefone" disabled>
              </div>
              <div class="col-1">
                <label for="celular" class="col-form-label ml-n1">CELULAR</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control" id="cel" name="celular" disabled>
              </div>
            </div>
            <div class="modal-footer">
                <a href="pdf/index2.php?func" class="btn btn-secondary" target="blank">
                  IMPRIMIR
                </a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>-->


