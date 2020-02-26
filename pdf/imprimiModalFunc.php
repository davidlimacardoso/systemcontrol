<?php

if (!isset($order)) die();

?>
    <div class="container mt-5">
        <h3 class="text-center">INFORMAÇÕES COMPLETAS DO USUÁRIO</h3>
		      <form class="border p-3" action="" method="POST">
            <?php
          while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
            $ativo = $row_transacoes["ativo"];
                  if ($ativo = "1") {
                    $ativo = "ATIVO";
                  }else{
                    $ativo = "INATIVO";
                  }
              
        ?>
            <div>
              <div class="col-1">
                <label for="PerfilNome" class="col-form-label">NOME</label>
              </div>
              <div class="col-11">
                <input type="text" name="PerfilNome" id="PerfilNome" class="form-control" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
            </div>

            <div>
              <div class="col-1">
                <label for="rg" class="col-form-label">RG</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CPF</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
              <div class="col-1">
                <label for="cpf" class="col-form-label">CARGO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
            </div>

            <div>
              <div class="col-1">
                <label for="cepEndereco" class="col-form-label">CEP</label>
              </div>
              <div class="col-4">
                <input type="text" class="form-control" id="cep" name="cepEndereco" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
            </div>

            <div>
              <div class="col-1">
                <label for="endUm" class="col-form-label">END.</label>
              </div>
              <div class="col-8">
                <input type="text" class="form-control" id="endereco" name="end" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
                <div class="col-1">
                  <label for="numero" class="col-form-label">Nº</label>
                </div>
                <div class="col-2">
                  <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
                </div>
            </div>

            <div>
              <div class="col-md-1">
                <label for="cidade" class="col-form-label">BAIRRO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
              <div class="col-1">
                <label for="cidade" class="col-form-label">CIDADE</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
              <div class="col-1">
                <label for="estado" class="col-form-label">ESTADO</label>
              </div>
              <div class="col-3">
                <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
            </div>

            <div>
              <div class="col-1">                
                <label for="email" class="col-form-label">EMAIL</label>
              </div>
              <div class="col-6">
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
              <div class="col-1">
                <label for="user" class="col-form-label ml-n1">USUÁRIO</label>
              </div>
              <div class="col-4">
                <input type="text" name="user" id="user" class="form-control" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
            </div>

            <div>
              <div class="col-1">
                <label for="telefone" class="col-form-label">TEL</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control" id="tel" name="telefone" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
              <div class="col-1">
                <label for="celular" class="col-form-label ml-n1">CELULAR</label>
              </div>
              <div class="col-5">
                <input type="text" class="form-control" id="cel" name="celular" value="<?php echo $row_transacoes['nomeUsuario'];?>" disabled>
              </div>
            </div>
            <?php  } ?>
        </form>
    </div>


