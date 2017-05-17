<?php
    $host = 'localhost';
    $database = 'runika';
    $user = 'root';
    $password = 'coderslab';
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
