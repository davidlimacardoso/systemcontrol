<?php
include("../banco/conexao.php");
        $result_transacoes = "SELECT * FROM Tb_Fornecedor WHERE ativo = 1";
          $resultado_trasacoes = mysqli_query($conn, $result_transacoes);

          $order = $resultado_trasacoes;

ob_start();

require_once("imprimiForn.php");

$template = ob_get_clean();

require_once 'dompdf/autoload.inc.php';

// referenciando o namespace do dompdf

use Dompdf\Dompdf;

// instanciando o dompdf

$dompdf = new Dompdf();

//lendo o arquivo HTML correspondente

//$html = file_get_contents('imprimiFunc.php');

//inserindo o HTML que queremos converter

$dompdf->loadHtml($template);
$dompdf->setPaper('A4', 'landscape');
// Renderizando o HTML como PDF

$dompdf->render();

// Enviando o PDF para o browser

$dompdf->stream(
"Relatorio de Fornecedores.pdf",
array(
        "Attachment" => false /* Para download, altere para true */
    )
);

?>