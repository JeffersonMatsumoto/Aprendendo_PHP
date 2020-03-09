<!DOCTYPE HTML>
<html>

<head>
    <title>Sistema A</title>
    <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<form action="criar_contato.php" method="post" id="formulario">
        
        <!-- <p>Nome: <input type="text" name="name" /></p> -->
            <!-- <input type="text" name="name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping"> -->

        <!-- <code><b>IMPORTANTE:</b> Caso o nome contenha aspas, utilize duas aspas (Ex.: D''Angelo)</code> -->
        <!-- <p>Idade: <input type="text" name="age" /></p> -->

        <!-- <p>E-mail: <input type="email" name="email" /></p> -->
            <!-- <input type="email" name="email" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping"> -->

        <!-- <p>Telefone: <input type="tel" name="telefone" /></p> -->
            <!-- <input type="tel" name="telefone" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping"> -->

        <!-- <p>Data de Nascimento: <input type="date" name="data_nascimento" /></p> -->
            <!-- <input type="date" name="data_nascimento" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping"> -->

        <!-- <p><input type="submit" /></p> -->

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="name" class="form-control">
            <small class="form-text text-muted"><b>IMPORTANTE:</b> Caso o nome contenha aspas, utilize duas aspas (Ex.: D''Angelo)</small>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="tel" minlength="10" maxlength="11" name="telefone" class="form-control">
            <small class="form-text text-muted"><b>FORMATO:</b> DDD + número</small>
        </div>
        <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar no Banco de Dados</button>
    </form>

    <?php

    include_once("conexao.php");

    // $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
    // var_dump(json_decode($jsonobj, true));

    // GET
    $tsql= "SELECT * FROM CONTATOS;";
    $getResults= sqlsrv_query($conn, $tsql);
    echo ("Lendo os dados da tabela <b>CONTATO</b> do banco de dados <b>SISTEMA_A</b>" . PHP_EOL);
    if ($getResults == FALSE)
        die(FormatErrors(sqlsrv_errors()));
    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        echo ( 
            '<code><hr><b>(' .$row['ID'] .")</b> " .$row['NOME'] ." " .$row['EMAIL'] ." " .$row['TELEFONE'] ." " .$row['DATA_NASCIMENTO']->format('d/m/Y') .PHP_EOL .'</hr></code>'
        );
        // print json_encode($row);
    }
    sqlsrv_free_stmt($getResults);


    function FormatErrors( $errors )
    {
        /* Display errors. */
        echo "Error information: ";

    foreach ( $errors as $error )
        {
            echo "SQLSTATE: ".$error['SQLSTATE']."";
            echo "Code: ".$error['code']."";
            echo "Message: ".$error['message']."";
        }
    }   

    ?>
    
    
</body>

</html>

<!-- shift + a ou z -> zoom do texto do editor -->