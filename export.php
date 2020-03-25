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
// $query = "SELECT cod_athos, nome, quantidade, id FROM $vendas ORDER BY $nome"; todos registros
$query = "SELECT cod_athos, nome, quantidade, id FROM $vendas WHERE $quantidade > 0 ORDER BY $nome"; //Somente vendidos
$result = mysqli_query($connect, $query);
$header = array(
    'CÓD. ATHOS' => 'string',
    'NOME' => 'string',
    'QTDE' => 'integer',
    'REFERÊNCIA' => 'string',
);
$writer = new XLSXWriter();
$style_header = array('font-size'=>12, 'font-style' => 'bold', 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'fill'=>'#30c130', 'widths'=>[23,78,8,38], 'halign' => 'center');
$style_cells1 = array(['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'height'=>14, 'halign' => 'center'], ['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'height'=>14, 'halign' => 'left'], ['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'height'=>14, 'halign' => 'center'], ['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'height'=>14, 'halign' => 'center']);
$style_cells2 = array(['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'fill'=>'#cfcfd2', 'height'=>14, 'halign' => 'center'], ['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'fill'=>'#cfcfd2', 'height'=>14, 'halign' => 'left'], ['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'fill'=>'#cfcfd2', 'height'=>14, 'halign' => 'center'], ['font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'fill'=>'#cfcfd2', 'height'=>14, 'halign' => 'center']);
// $style_cells2 = array('font-size'=>12, 'border' => 'left,right,top,bottom', 'border-style' => 'thin', 'halign' => 'center');
$writer->writeSheetHeader($mes_ano, $header, $style_header);

$array = array();
$x = 0;
while ($row = mysqli_fetch_row($result)) {
    for ($i = 0; $i < mysqli_num_fields($result); $i++) {
        $array[$i] = $row[$i];
    }
    if ($x % 2 == 0) {
        $writer->writeSheetRow($mes_ano, $array, $style_cells1);
    } else {
        $writer->writeSheetRow($mes_ano, $array, $style_cells2);
    }
    $x++;
};
$writer->writeToStdOut();
exit(0);
