<?php
    $serverName = ""; //
    $connectionOptions = array(
        "Database" => "SISTEMA_B",
        "Uid" => "",
        "PWD" => "",
        "CharacterSet" => "UTF-8"
    );

    $conn = sqlsrv_connect($serverName, $connectionOptions);