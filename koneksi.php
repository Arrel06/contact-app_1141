<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "contact"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection err: " . $e->getMessage();
}

?>