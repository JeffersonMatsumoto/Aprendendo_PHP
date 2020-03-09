<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8");

    include_once '../../config/database.php';
    include_once '../../models/Contato.php';

    $database = new Database();
    $db = $database->connect();

    $contato = new Contato($db);
    $result = $contato->read();
    $num = $result->rowCount();
    
    if($num < 0) {
        $contatos_array = array();
        $contatos_array['lista_de_contatos'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){

            extract($row);
            $contatos_item = array(
                "id" => $id,
                "nome" => $nome,
                "email" => $email,
                "telefone" => $telefone,
                "data_nascimento" => $data_nascimento,
                "status_integracao_b" => $status_integracao_b,
                "id_integracao_sistema_b" => $id_integracao_sistema_b
            );

            array_push($contatos_array['lista_de_contatos'], $contatos_item);
        }

        echo json_encode($contatos_array);

    } else {
        echo json_encode(
            array('message' => "Nenhum contato encontrado.")
        );
    }