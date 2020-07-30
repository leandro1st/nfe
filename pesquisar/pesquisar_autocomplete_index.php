
<?php

if (isset($_GET["term"])) {
    $connect = new PDO("mysql:host=localhost; dbname=nfe", "root", "");

    $term_post = mb_convert_case(trim($_GET['term']), MB_CASE_UPPER, 'utf-8');

    // dividindo $term_post em partes e criando termos de pesquisa para cada pedaço de string e armazenando-os numa string
    $searchTerms = explode(' ', $term_post);
    $searchTermBits = array();
    foreach ($searchTerms as $term) {
        $term = trim($term);
        if (!empty($term)) {
            $searchTermBits[] = "(codigo LIKE '%$term%' or nome LIKE '%$term%' or cod_athos LIKE '%$term%' or id LIKE '%$term%')";
        }
    }

    // query, juntando as strings armazenadas dentro do array $searchTermBits
    $query = "SELECT * FROM vendas WHERE " . implode(" AND ", $searchTermBits) . " ORDER BY nome ASC";

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
            $extensions = array("jpeg", "jpg", "png", "gif", "webp");

            if (($file_ext == "") || (in_array($file_ext, $extensions) === false)) {
                $temp_array['label'] = '<div class="row" style="margin: 0; display: flex; justify-content: center; align-items: center"><div class="col-4"><fieldset id="sem_imagem" class="img-thumbnail text-center" style="padding: 15px 0px 10px 0px; background-color: #575759"><div><i class="fas fa-image text-white" style="font-size: 25px"></i></fieldset></div><div class="col" style="word-wrap: break-word">' . $row['nome'] . '</div></div>';
            } else {
                $temp_array['label'] = '<div class="row" style="margin: 0; display: flex; justify-content: center; align-items: center"><div class="col-4"><img src="produtos/' . $row['imagem'] . '" width="70"></div><div class="col" style="word-wrap: break-word">' . $row['nome'] . '</div></div>';
            }
            $array_produto[] = $temp_array;
        }
    } else {
        // $array_produto['value'] = '';
        // $array_produto['label'] = 'Nenhum resultado encontrado';
    }
    echo json_encode($array_produto);
}

?>