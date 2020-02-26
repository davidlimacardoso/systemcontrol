<?php
  if(!isset($_SESSION))
  {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--CSS-Custom -->
    <link rel="stylesheet" type="text/css" href="css-custom/estilo.css">
    <link href="DataTables/estiloDataTables.css" rel="stylesheet">
 

    <style type="text/css">
        .page-item.active a.page-link{
            background-color: #fff;
            color: #000000;
            border-color: <?php if (isset($_SESSION['corLogoFundo'])) {echo $_SESSION['corLogoFundo']; }?>;
        }
        a.page-link{
            color: #000000;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <link rel="stylesheet" href="bootstrap-select/dist/css/bootstrap-select.min.css">
    
    <title>SYSTEM CONTROL</title>
  </head>

  <body style="background-color: #F5F5F5;" >
 
    <!-- Sidebar  -->
    <nav id="sidebar" class="d-print-none" style="background-color: 
    <?php if (isset($_SESSION['corMenuFundo'])) { echo $_SESSION['corMenuFundo']; }?>;">

        <div class="sidebar-header" id="sidebar-header" style="background-color: <?php if (isset($_SESSION['corLogoFundo'])) {echo $_SESSION['corLogoFundo']; }?>; ">

            <h3 class="ulSidebar" style="color: <?php if (isset($_SESSION['corLogoTxt'])) { echo $_SESSION['corLogoTxt']; }?>;"><?php if (isset($_SESSION['nomeFantasia'])) { echo $_SESSION['nomeFantasia'];}else{ echo "LOGOTIPO";}?>
            </h3>
            <strong>SC</strong>
                
        </div>

            <ul class="list-unstyled components">
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2){ 
                echo
                '<li>'.
                   '<a href="home.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-home"></i>'.
                    'Dashboard'.
                    '</a>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2 || $_SESSION['idPerfil'] == 4){ 
                echo
                '<li>'.
                   '<a href="vendas.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-shopping-cart"></i>'.
                    'Vendas'.
                    '</a>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2 || $_SESSION['idPerfil'] == 7){ 
                echo
                '<li>'.
                   '<a href="compras.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-shopping-cart"></i>'.
                    'Compras'.
                    '</a>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2 || $_SESSION['idPerfil'] == 7){ 
                echo
                '<li>'.
                   '<a href="produtos.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-box"></i>'.
                    'Produtos'.
                    '</a>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2 || $_SESSION['idPerfil'] == 3 || $_SESSION['idPerfil'] == 5 || $_SESSION['idPerfil'] == 6 || $_SESSION['idPerfil'] == 7){ 
                echo
                '<li>'.
                   '<a href="estoque.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-pallet"></i>'.
                    'Estoque'.
                    '</a>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2){ 
                echo
                '<li>'.
                   '<a href="pessoas.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-users"></i>'.
                    'Funcionários'.
                    '</a>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2 || $_SESSION['idPerfil'] == 7){ 
                echo
                '<li>'.
                   '<a href="fornecedor.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-truck"></i>'.
                    'Fornecedor'.
                    '</a>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2){ 
                echo
                '<li>'.
                    '<a href="#relatorioSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; }; ">'.
                    '<i class="fas fa-paper-plane"></i>'.
                    'Relatórios'.
                    '</a>'.
                    '<ul class="collapse list-unstyled" id="relatorioSubmenu">'.
                        '<li>'.
                            '<a href="relatorioDiario.php" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                            '<i class="fas fa-calendar-day"></i>'.
                            'Relatório Vendas'.
                            '</a>'.
                        '</li>'.
                        '<li>'.
                            '<a href="relatorioProdutos.php" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                            '<i class="fas fa-box"></i>'.
                            'Relatório Produtos'.
                            '</a>'.
                        '</li>'.
                        '<li>'.
                            '<a href="relatorioPessoas.php" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                            '<i class="fas fa-users"></i>'.
                            'Relatório Func.'.
                            '</a>'.
                        '</li>'.
                    '</ul>'.
                '</li>';}
                ?>
                <?php if($_SESSION['idPerfil'] == 1 || $_SESSION['idPerfil'] == 2){ 
                echo
                '<li>'.
                   '<a href="config.php" class="ulSidebar" style="color: if (isset($_SESSION["corMenuTxt"])) { echo $_SESSION["corMenuTxt"]; };">'.
                    '<i class="fas fa-cogs"></i>'.
                    'Configurar'.
                    '</a>'.
                '</li>';}
                ?>
            </ul>
        </nav>
        <!-- Conteúdo da página  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light d-print-none">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                    <i class="fas fa-align-left"></i>   
                </button>
                <span class="text-secondary h6 mr-2 my-auto ml-auto d-print-none"><?php echo $_SESSION['p_nome']; ?></span>
                <div class="input-group-append d-print-none">     
                    <a class="text-right text-light btn" id="logoff" href="validacoes/logoff.php?token=sair" data-toggle="modal" data-target="#modalMenu" style="background-color: <?php if (!isset($_SESSION['corLogoFundo'])) { echo "#808080";}else{ echo $_SESSION['corLogoFundo']; }?>;">SAIR</a>
                </div>
                </div>
            </nav>
            <!-- Modal -->
            <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                        <span class="h6 mr-2 text-dark"><?php echo $_SESSION['p_nome']; ?></span>confirma que deseja sair?</h5>
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                    <a class="btn btn-success" href="validacoes/logoff.php?token=sair">SAIR</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- gif load-->
              <div class="text-center corFundoLoad" id="fundoLoad" style="display:none;">
                  <div class="load" id="loading" style="display:none;">
                      <div class="spinner-grow text-light" role="status">
                          <span class="sr-only">Loading...</span>
                      </div>
                      <p class=" text-light">Enviando sua mensagem, porfavor aguarde...</p>
                  </div>
              </div>
            <!-- fim gif load-->

            <!-- botao modal fale conosco -->
            <div class="btnPesquisar">
                <div class="col-3 ">
                    <button type="button" class="btn btn-secondary rounded-circle p-3" title="FALE CONOSCO" data-toggle="modal" data-target=".modalMensagem-modal-lg"><i class="fas fa-envelope fa-lg"></i></button>
                </div>
            </div>
            <!-- fim modal fale conosco -->
            <div class="modal fade modalMensagem-modal-lg" id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLabel">SYSTEM CONTROL</h5>
                    
                  </div>
                    <form id="formMensagem">
                        <p class="lead text-center">Deixe sua dúvida ou sugestão que entraremos em contato com uma resposta.</p>
                        <div class="modal-body mt-n3">
                            <div class="form-group">
                                <label for="assunto">Assunto</label>
                                <input name="assunto" type="text" class="form-control" id="assunto">
                            </div>

                            <div class="form-group">
                                <label for="mensagem">Mensagem</label>
                                <textarea name="mensagem" class="form-control" id="mensagem" rows="5" cols="33"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
                          <button type="button" id="enviaMensagem" class="btn btn-success float-right">ENVIAR MENSAGEM</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>

            
    <?php include('modal/modalAlertas/modalRespostas.php');?>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="bootstrap-select/dist/js/bootstrap-select.min.js"></script>


       <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

       $('#enviaMensagem').click(function(e) {
            e.preventDefault();
            $('#modalMensagem').css("z-index","-999");
            $('#loading').show();
            $('#fundoLoad').show();
            $('#fundoLoad').css("margin-left","-220px");
            var dados = $('#formMensagem').serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'validacoes/processa_envio.php',
                async: true,
                data: dados,
                success: function(response) {
                    
                    if (success = true) {
                        $('.load').hide()
                        $('.corFundoLoad').hide()
                        $('input, textarea').val('')
                        $('#modalMensagem').modal('hide')
                        $('#modalAcerto').modal('show')
                        $('#ModalMensagem').html('Mensagem enviado com sucesso!') 

                    }else{
                        $('.load').hide()
                        $('input, textarea').val('')
                        $('#modalMensagem').modal('hide')  
                        $('#modalFalha').modal('show')
                        $('#ModalMensagemErro').html('Falha ao enviar sua mensagem.<br> Porfavor tente novamente mais tarde.') 
                    }
                    
                }
            });

            return false;
        });
       </script>

    </body>

</html>