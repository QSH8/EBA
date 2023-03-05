<?php
    $config = [
        $host = 'localhost',
        $user = 'root',
        $password = '',
        $db_name = 'rewrite',
    ];

    $conn = mysqli_connect($host, $user, $password);

    if (!$conn) {
        echo ('Ошибка: '.mysqli_connect_error());
    } else {
        $db = "CREATE DATABASE IF NOT EXISTS $db_name default CHARSET utf8";
        mysqli_query($conn, $db);
        mysqli_close($conn);
    }
    
    $conn = mysqli_connect(...$config);
    
    $table = "CREATE TABLE IF NOT EXISTS `correction` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `text` TEXT NOT NULL,
        PRIMARY KEY (`id`)
    )";
    
    mysqli_query($conn, $table);
    
    mysqli_close($conn)
?>