 $('#modalSenha').on('show.bs.modal', function (event) {
        //recebe os dados
      var button = $(event.relatedTarget) 
      var recipient_cod = button.data('altfunc') 
      var recipient_nome = button.data('altsnome')
      var recipient_email = button.data('altsemail')
        //imprimi os dados
      var modal = $(this)
      modal.find('#id').val(recipient_cod)
      modal.find('#nomeSenha').val(recipient_nome)
      modal.find('#emailSenha').val(recipient_email)
      });

            //passar os dados para o modal informações
      $('#modalInformacoes').on('show.bs.modal', function (event) {
        //recebe os dados
      var button = $(event.relatedTarget) 
      var recipient_cod = button.data('altfunc') 
      var recipient_nome = button.data('altnome')
      var recipient_rg = button.data('altrg')
      var recipient_cpf = button.data('altcpf')
      var recipient_cargo = button.data('altcargo')
      var recipient_sexo = button.data('altsexo') 
      var recipient_cep = button.data('altcep')
      var recipient_end = button.data('altend')
      var recipient_num = button.data('altnum') 
      var recipient_bairro = button.data('altbairro')
      var recipient_cidade = button.data('altcidade')
      var recipient_estado = button.data('altestado') 
      var recipient_email = button.data('altemail')
      var recipient_user = button.data('altuser')
      var recipient_senha = button.data('altsenha') 
      var recipient_tel = button.data('alttel')
      var recipient_cel = button.data('altcel')
      var recipient_dataAtual = button.data('altdataAtual')
        //imprimi os dados
      var modal = $(this)
      modal.find('#id').val(recipient_cod)
      modal.find('#PerfilNome').val(recipient_nome)
      modal.find('#rg').val(recipient_rg)
      modal.find('#cpf').val(recipient_cpf)
      modal.find('#cargo').val(recipient_cargo)
      modal.find('#sexo').val(recipient_sexo)
      modal.find('#cep').val(recipient_cep)
      modal.find('#endereco').val(recipient_end)
      modal.find('#numero').val(recipient_num)
      modal.find('#bairro').val(recipient_bairro)
      modal.find('#cidade').val(recipient_cidade)
      modal.find('#estado').val(recipient_estado)
      modal.find('#email').val(recipient_email)
      modal.find('#user').val(recipient_user)
      modal.find('#senha').val(recipient_senha)
      modal.find('#tel').val(recipient_tel)
      modal.find('#cel').val(recipient_cel)
      modal.find('#dataAtual').text(recipient_dataAtual)
      });

       //passar os dados para o modal alterar
      $('#modalAlterar').on('show.bs.modal', function (event) {
        //recebe os dados
      var button = $(event.relatedTarget) 
      var recipient_cod = button.data('altfunc') 
      var recipient_nome = button.data('altnome')
      var recipient_rg = button.data('altrg')
      var recipient_cpf = button.data('altcpf') 
      var recipient_cargo = button.data('altcargo')
      var recipient_sexo = button.data('altsexo')
      var recipient_cep = button.data('altcep')
      var recipient_end = button.data('altend')
      var recipient_num = button.data('altnum') 
      var recipient_bairro = button.data('altbairro')
      var recipient_cidade = button.data('altcidade')
      var recipient_estado = button.data('altestado') 
      var recipient_email = button.data('altemail')
      var recipient_user = button.data('altuser')
      var recipient_senha = button.data('altsenha') 
      var recipient_tel = button.data('alttel')
      var recipient_cel = button.data('altcel')
        //imprimi os dados
      var modal = $(this)
      modal.find('#id').val(recipient_cod)
      modal.find('#PerfilNome').val(recipient_nome)
      modal.find('#rg').val(recipient_rg)
      modal.find('#cpf').val(recipient_cpf)
      modal.find('#cargo').val(recipient_cargo)
      modal.find('#sexo').val(recipient_sexo)
      modal.find('#cep').val(recipient_cep)
      modal.find('#endereco').val(recipient_end)
      modal.find('#numero').val(recipient_num)
      modal.find('#bairro').val(recipient_bairro)
      modal.find('#cidade').val(recipient_cidade)
      modal.find('#estado').val(recipient_estado)
      modal.find('#email').val(recipient_email)
      modal.find('#user').val(recipient_user)
      modal.find('#tel').val(recipient_tel)
      modal.find('#cel').val(recipient_cel)
      });

       //passar os dados para o modal excluir
      $('#modalExcluir').on('show.bs.modal', function (event) {
        //recebe os dados
      var button = $(event.relatedTarget) 
      var recipient_cod = button.data('altfunc')
        //imprimi os dados
      var modal = $(this)
      modal.find('#id').val(recipient_cod)
      });