$('#cadastroEmpresa').validate({
        errorClass: 'error',
        validClass: 'valid',

        rules : {
          nomeEmpresa : {
            required : true
          },
          cnpj : {
            required : true,
            minlength : 18,
            maxlength : 18
          },
          cep : {
            required : true,
            minlength : 10,
            maxlength : 10
          },
          endereco : {
            required : true
          },
          numEmpresa : {
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
          tipo : {
            required : true
          },
          fantasia : {
            required : true
          },
          emailEmpresa : {
            required : true,
            email : true
          },
          nomeResponsavel : {
            required : true
          },
          tel : {
            required : true,
            minlength : 14,
            maxlength : 14
          }
        },
        messages : {
          nomeEmpresa : {
            required : 'Informe o nome.'
          },
          cnpj : {
            required : 'Informe o CNPJ.',
            minlength : 'O CNPJ deve ter no mínimo 18 caracteres.'
          },
          cep : {
            required : 'Informe o CEP.',
            minlength : 'O CEP deve ter no mínimo 10 caracteres.'
          },
          endereco : {
            required : 'Informe o Endereço.'
          },
          numEmpresa : {
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
          tipo : {
            required : 'Informe o Tipo.'
          },
          fantasia : {
            required : 'Informe o Nome fantasia.'
          },
          emailEmpresa : {
            required : 'Informe o Email.',
            email : 'Informe um e-mail válido.'
          },
          nomeResponsavel : {
            required : 'Informe o Nome do Responsável.'
          },
          tel : {
            required : 'Informe o Telefone.',
            minlength : 'O Telefone deve ter no mínimo 14 caracteres.'
          }
        },
      });

$('#liberaConf').validate({
        errorClass: 'error',
        validClass: 'valid',

        rules : {
          email : {
            required : true,
            minlength : 3
          },
          pass : {
            required : true
          }
        },
        messages : {
          email : {
            required : 'Informe o usuário.'
          },
          pass : {
            required : 'Informe a senha.',
            minlength : 'A senha deve ter, no mínimo, 3 caracteres.',
            maxlength : 'A senha deve ter, no máximo, 20 caracteres.'
          },
        },
});