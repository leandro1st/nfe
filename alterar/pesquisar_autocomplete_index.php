
<?php

if (isset($_GET["term"])) {
    $connect = new PDO("mysql:host=localhost; dbname=nfe", "root", "");

    $query = "SELECT * FROM vendas WHERE nome LIKE '%" . trim($_GET["term"]) . "%' ORDER BY nome ASC";

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $total_row = $statement->rowCount();

    $array_produto = array();
    if ($total_row > 0) {
        foreach ($result as $row) {
            $temp_array = array();
            $temp_array['value'] = $row['nome'];
            $temp_array['label'] = '<div class="row" style="margin: 0; display: flex; justify-content: center; align-items: center"><div class="col-4"><img src="produtos/' . $row['imagem'] . '" width="70"></div><div class="col">' . $row['nome'] . '</div></div>';
            $array_produto[] = $temp_array;
        }
    } else {
        // $array_produto['value'] = '';
        // $array_produto['label'] = 'Nenhum resultado encontrado';
    }
    echo json_encode($array_produto);
}

?>