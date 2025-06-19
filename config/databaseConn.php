<?php
    // Configurações para conexão com o banco de dados
    $host = "db";  
    $port = 3306;         
    $dbname = "vanguarda_db";
    $user_name = "root";
    $passwd = "123456";
    
    $dns = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

    // conexao com o banco de dados
    try {
        $pdo = new PDO($dns, $user_name, $passwd);
    } catch (PDOException $e) {
        echo "Erro ao conectar no banco de dados: ". $e->getMessage();
    }
?>