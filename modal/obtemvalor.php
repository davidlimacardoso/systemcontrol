<?php
if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checa se valor existe
    $action = $_POST["action"];
    $id = $_POST['idservico'];
    switch($action) {
      case "obtervalor": obter_valor_servico($id);
      break;
    }
  }
}

//Funcao que checa se a requisicao ajax e valida.
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function obter_valor_servico($id){
    $sql = "SELECT id, valor FROM servicos WHERE id = ".intval($id);
    $resultado = mysql_query ($sql) or die ("Problema na lista!");

    $linha = mysql_fetch_object($resultado);

    echo json_encode($linha);
}
?>