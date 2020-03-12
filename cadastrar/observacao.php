<?php 

if (!isset($_POST['data'])) {
    header("location:../");
} else if (trim($_POST['data'] == "") || trim($_POST['data'] == null)) {
    header("location:../");
} else {
	require('../externo/connect.php');

    $data = trim($_POST['data']);
    // echo $data;
    $pesquisar = mysqli_query($connect, "SELECT * FROM $observacao");
    $numero = mysqli_num_rows($pesquisar);

    if ($numero == 0) {
        $query = mysqli_query($connect, "INSERT INTO $observacao($ultima_data) VALUES ('$data')");
    } else {
        $query = mysqli_query($connect, "UPDATE $observacao SET $ultima_data = '$data'");
    }
    header("location:../");
}
?>