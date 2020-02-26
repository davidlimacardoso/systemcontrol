       //passar os dados para o modal alterar
$('#modalAlterarFornecedor').on('show.bs.modal', function (event) {
        //recebe os dados
      var button = $(event.relatedTarget) 
      var recipient_codForn = button.data('altforn') 
      var recipient_nomeForn = button.data('altnome')
      var recipient_cnpj = button.data('altcnpj')
      var recipient_cep = button.data('altcep')
      var recipient_end = button.data('altend')
      var recipient_num = button.data('altnum') 
      var recipient_bairro = button.data('altbairro')
      var recipient_cidade = button.data('altcidade')
      var recipient_estado = button.data('altestado') 
      var recipient_email = button.data('altemail')
      var recipient_responsavel = button.data('altresponsavel')
      var recipient_tel = button.data('alttel')
      var recipient_cel = button.data('altcel')
        //imprimi os dados
      var modal = $(this)
      modal.find('#id').val(recipient_codForn)
      modal.find('#nomeEmpresa').val(recipient_nomeForn)
      modal.find('#cnpj').val(recipient_cnpj)
      modal.find('#cep').val(recipient_cep)
      modal.find('#endereco').val(recipient_end)
      modal.find('#numEmpresa').val(recipient_num)
      modal.find('#bairro').val(recipient_bairro)
      modal.find('#cidade').val(recipient_cidade)
      modal.find('#uf').val(recipient_estado)
      modal.find('#emailEmpresa').val(recipient_email)
      modal.find('#nomeResponsavel').val(recipient_responsavel)
      modal.find('#tel').val(recipient_tel)
      modal.find('#cel').val(recipient_cel)
});

       //passar os dados para o modal excluir
$('#modalExcluirFornecedor').on('show.bs.modal', function (event) {
        //recebe os dados
      var button = $(event.relatedTarget) 
      var recipient_cod = button.data('altfunc')
        //imprimi os dados
      var modal = $(this)
      modal.find('#id').val(recipient_cod)
});