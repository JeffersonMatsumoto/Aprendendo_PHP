<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
        </br>
        <a style="text-decoration: none; color: black; margin-left: 1%" href="sistema_a.php"><button class="btn btn-primary">VOLTAR</button></a>
    <?php

        include_once("conexao.php");

        $name = htmlspecialchars($_POST['name']);
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];

        $query = "INSERT INTO CONTATOS (NOME, EMAIL, TELEFONE, DATA_NASCIMENTO) VALUES 
        ('$name', '$email', '$telefone', '$data_nascimento')";

        $resultado = sqlsrv_query($conn, $query);

        $rowsAffected = sqlsrv_rows_affected($resultado);
        if ($resultado == FALSE or $rowsAffected == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        echo ($rowsAffected. " linha(s) inserida(s): " . PHP_EOL);

        sqlsrv_free_stmt($resultado);
        sqlsrv_close($conn);

        $array = [
            "name" => $name,
            "email" => $email,
            "telefone" => $telefone,
            "data_nascimento" => $data_nascimento
        ];
        json_encode($array);
        print_r($array);
        ?>
        
</body>
</html>