<?php

require("externo/connect.php");

$mes_ano = $_POST['mes_ano'] . " " . date("Y");

include_once('XLSXWriter/xlsxwriter.class.php');
$filename = "Vendas NF-e " . $mes_ano . ".xlsx";
header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');
$query = "SELECT nome, quantidade, id FROM $vendas ORDER BY $nome";
$result = mysqli_query($connect, $query);
$header = array(
    'NOME' => 'string',
    'QUANTIDADE' => 'integer',
    'REFERÊNCIA' => 'string',
);
$writer = new XLSXWriter();
$style_header = array('font-style' => 'bold', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'fill'=>'#30c130', 'widths'=>[78,15,23], 'halign' => 'center');
$style_cells1 = array(['border' => 'left,right,top,bottom', 'border-style' => 'thin', 'height'=>14, 'halign' => 'left'], ['border' => 'left,right,top,bottom', 'border-style' => 'thin', 'height'=>14, 'halign' => 'center'], ['border' => 'left,right,top,bottom', 'border-style' => 'thin', 'height'=>14, 'halign' => 'center']);
// $style_cells2 = array('border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'center');
$writer->writeSheetHeader($mes_ano, $header, $style_header);

$array = array();
while ($row = mysqli_fetch_row($result)) {
    for ($i = 0; $i < mysqli_num_fields($result); $i++) {
        $array[$i] = $row[$i];
    }
    $writer->writeSheetRow($mes_ano, $array, $style_cells1);
};
$writer->writeToStdOut();
exit(0);