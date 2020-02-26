 $('#cadastroFunc').validate({
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