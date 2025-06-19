<?php

    require 'config/databaseConn.php';
    require 'controller/ContatoController.php';

    // Passo a conexão do banco de dados para ContatoController
    $controller = new ContatoController($pdo);

    // Interface aparece automaticamente ao inserir (url+?listar) no navegador
    $controller->handleRequest(); 
    
?>