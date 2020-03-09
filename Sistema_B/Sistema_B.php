<!DOCTYPE HTML>
<html>

<head>
    <title>Sistema B</title>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <?php
        // header('Content-Type: application/json; charset=utf-8');

        include_once("conexao_b.php");

        $url = "http://localhost:8000/api/contato/read.php";

        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $contatos = json_decode(curl_exec($ch));

        // curl_close($ch);

        $resultado = json_decode(file_get_contents($url));
        // var_dump($resultado);

        foreach ($resultado->lista_de_contatos as $contato) {
            echo "<b>Id:</b> " .$contato->id ."<br>";
            echo "<b>Nome:</b> " .$contato->nome ."<br>";
            echo "<b>E-mail:</b> " .$contato->email ."<br>";
            echo "<b>Telefone:</b> " .$contato->telefone ."<br>";
            echo "<b>Data de Nascimento:</b> " .$contato->data_nascimento ."<br>";
            echo "<hr>";

            $query = "INSERT INTO CONTATOS (NOME, EMAIL, TELEFONE, DATA_NASCIMENTO, ID_SISTEMA_A) VALUES 
            ('$contato->nome', '$contato->email', '$contato->telefone', '$contato->data_nascimento', $contato->id)";

            $resultado = sqlsrv_query($conn, $query);

            $rowsAffected = sqlsrv_rows_affected($resultado);
            if ($resultado == FALSE or $rowsAffected == FALSE)
                die(FormatErrors(sqlsrv_errors()));
            echo ($rowsAffected. " linha(s) inserida(s): " . PHP_EOL);

            sqlsrv_free_stmt($resultado);
            sqlsrv_close($conn);
        }

        // var_dump($response);
        // $vars = get_object_vars ( $contatos );
        // print_r ( $vars );
        // echo current(current($vars))->id;
        // echo current(current($vars))->nome;
        // echo current(current($vars))->email;
        // echo current(current($vars))->telefone;
        // echo current(current($vars))->data_nascimento;

        // $id_sistema_a = current(current($vars))->id;
        // $nome = current(current($vars))->nome;
        // $email = current(current($vars))->email;
        // $telefone = current(current($vars))->telefone;
        // $data_nascimento = current(current($vars))->data_nascimento;
        
        // $arrayContatos = get_object_vars($contatos);
        // print_r($arrayContatos);
        // print_r(array_keys($arrayContatos));

        // $name = htmlspecialchars($_POST['name']);
        // $email = $_POST['email'];
        // $telefone = $_POST['telefone'];
        // $data_nascimento = $_POST['data_nascimento'];

        // $query = "INSERT INTO CONTATOS (NOME, EMAIL, TELEFONE, DATA_NASCIMENTO, ID_SISTEMA_A) VALUES 
        // ('$nome', '$email', '$telefone', '$data_nascimento', $id_sistema_a)";

        // $resultado = sqlsrv_query($conn, $query);

        // $rowsAffected = sqlsrv_rows_affected($resultado);
        // if ($resultado == FALSE or $rowsAffected == FALSE)
        //     die(FormatErrors(sqlsrv_errors()));
        // echo ($rowsAffected. " linha(s) inserida(s): " . PHP_EOL);

        // sqlsrv_free_stmt($resultado);
        // sqlsrv_close($conn);

        // $array = [
        //     "name" => $name,
        //     "email" => $email,
        //     "telefone" => $telefone,
        //     "data_nascimento" => $data_nascimento
        // ];
        // json_encode($array);
        // print_r($array);
    ?>
</body>

</html>

<!-- shift + a ou z -> zoom do texto do editor -->