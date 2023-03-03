<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'string';

    $conn = new mysqli($host, $user, $password);


    if ($conn -> connect_error) {
        die('Ошибка: '.$conn->connect_error);
    }

    $mysql = "CREATE DATABASE IF NOT EXISTS $db_name";   

    if ($conn -> query($mysql)) {
        return $conn -> query($mysql);
    } else {
        echo "Ошибка: ". $conn -> error;
    }
?>