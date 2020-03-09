<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

    include_once '../../config/database.php';
    include_once '../../models/Contato.php';

    $database = new Database();
    $db = $database->connect();

    $contato = new Contato($db);

    $data = json_decode(file_get_contents("php://input"));

    $contato->nome = $data->nome;
    $contato->email = $data->email;
    $contato->telefone = $data->telefone;
    $contato->data_nascimento = $data->data_nascimento;

    if($contato->create()){
        echo json_encode(
            array(
                "mensagem" => "Contato criado!"
            )
        );
    } else {
        echo json_encode(
            array(
                "mensagem" => "Contato NÃO foi criado!"
            )
        );
    }
