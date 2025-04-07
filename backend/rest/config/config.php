<?php
$host = 'localhost';
$db = '';
$user = '';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    Flight::set('db', $pdo);
} catch (PDOException $e) {
    die('DB connection failed: ' . $e->getMessage());
}
