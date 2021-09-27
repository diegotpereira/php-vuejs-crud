<?php
    $host = "localhost";
    $usuario = "root";
    $senha= "root";
    $nomebanco = "db_php_vuejs_crud_master";
    // $id = '';

    $conexao = mysqli_connect($host, $usuario, $senha, $nomebanco);
    $metodo = $_SERVER['REQUEST_METHOD'];
    $request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

    if (!$conexao) {
        # code...
        die("Conexão falhou: ". mysqli_connect_error());
    }

    if (isset($_GET['id'])) {
        # code...
        $id = $_GET['id'];
    }

    switch($metodo) {
        case 'GET':
            $id = $_GET['id'];
            $SQL = "SELECT * FROM contatos" .($id?" WHERE id=$id": '');
            // $SQL = "SELECT * FROM contatos WHERE id = '".$id."' ";
            break;
        case 'POST':
            $nome = $_POST["nome"];
            $email = $_POST['email'];
            $nacionalidade = $_POST["nacionalidade"];
            $cidade = $_POST["cidade"];
            $cargo = $_POST["cargo"];

            $SQL = "INSERT INTO contatos (nome, email, nacionalidade, cidade, cargo) VALUES ('$nome', '$email', '$nacionalidade', '$cidade', '$cargo')";
    }

    $result  = mysqli_query($conexao, $SQL);

    if (!$result) {
        # code...
        http_response_code(404);
        die(mysqli_error($conexao));
    }

    if ($metodo == 'GET') {
        # code...
        if (!$id) echo '[';
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            echo ($i > 0 ? ',': '').json_encode(mysqli_fetch_object($result));
        }
        if(!$id) echo ']';
    }elseif ($metodo == 'POST') {
        # code...
        echo json_encode($result);
    }else {
        echo mysqli_affected_rows($conexao);
    }

    $conexao->close();
?>