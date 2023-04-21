<?php

// membuat koneksi ke database menggunakan PDO
function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "belajar_mysql";
    $username = "root";
    $password = "";

    return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
}
