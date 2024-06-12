<?php
// backend/database/db.php

$dbServername = getenv('NOMBRE_SERVIDOR');
$dbUsername = getenv('NOMBRE_USUARIO_BASE_DE_DATOS');
$dbPassword = getenv('NOMBRE_USUARIO_BASE_DE_DATOS');
$dbName = getenv('NOMBRE_BASE_DE_DATOS');

try {
    $db = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
    // Establecer el modo de error de PDO a excepci��n
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexi��n exitosa a la base de datos";
} catch(PDOException $e) {
    echo "Error de conexi��n a la base de datos: " . $e->getMessage();
    die();
}
?>
