<?php
    // Configurações para conexão com o banco de dados
    $host = "db";  
    $port = 3306;         
    $dbname = "vanguarda_db";
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $userName = "root";
    $passwd = "123456";

    // conexao com o banco de dados
    try {
        $pdo = new PDO("mysql:host=db;dbname=vanguarda_db;charset=utf8", "root", "123456");
    } catch (PDOException $e) {
        echo "Erro ao conectar no banco de dados: " . $e->getMessage();
    }
?>