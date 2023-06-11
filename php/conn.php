<?php

require_once 'config.php';
require_once 'queries.php';

try {
    $db = "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE . ";charset=utf8";
    $conn = new PDO($db, DB_USERNAME, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}