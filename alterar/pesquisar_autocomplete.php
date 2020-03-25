<?php

if (isset($_GET["term"])) {
    $connect = new PDO("mysql:host=localhost; dbname=nfe", "root", "");

    $term = mb_convert_case(trim($_GET['term']), MB_CASE_UPPER, 'utf-8');

    $query = "SELECT * FROM vendas WHERE nome LIKE '%" . $term . "%' or cod_athos LIKE '%" . $term . "%' or id LIKE '%" . $term . "%' ORDER BY nome ASC";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $total_row = $statement->rowCount();

    $array_produto = array();
    if ($total_row > 0) {
        foreach ($result as $row) {
            $temp_array = array();
            $temp_array['value'] = $row['codigo'];
            
            // Verificando se imagem existe
            $file_explode = explode('.', $row['imagem']);
            $file_ext = strtolower(end($file_explode));
            $extensions = array("jpeg", "jpg", "png", "gif");

            if (($file_ext == "") || (in_array($file_ext, $extensions) === false)) {
                $temp_array['label'] = '<div class="row" style="margin: 0; display: flex; justify-content: center; align-items: center"><div class="col-4"><fieldset id="sem_imagem" class="img-thumbnail text-center" style="padding: 15px 0px 10px 0px; background-color: #575759"><div><i class="fas fa-image" style="font-size: 25px; color: white"></i></fieldset></div><div class="col">' . $row['nome'] . '</div></div>';
            } else {
                $temp_array['label'] = '<div class="row" style="margin: 0; display: flex; justify-content: center; align-items: center"><div class="col-4"><img src="../produtos/' . $row['imagem'] . '" width="70"></div><div class="col">' . $row['nome'] . '</div></div>';
            }
            $array_produto[] = $temp_array;
        }
    } else {
        // $array_produto['value'] = '';
        // $array_produto['label'] = '<span style="padding-left: 70px"></span>';
    }
    echo json_encode($array_produto);
}

?>