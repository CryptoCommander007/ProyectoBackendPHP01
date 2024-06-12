<?php

require_once '../controllers/registerController.php';
require_once '../database/db.php';

// Obtener los datos del formulario
$name = $_POST['name'] ?? null;
$username = $_POST['username'] ?? null;
$rut = $_POST['rut'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$confirm_password = $_POST['confirm_password'] ?? null;
$phone = $_POST['phone_full'] ?? null; // El número de teléfono completo procesado por intl-tel-input

// Validar que las contraseñas coincidan
if ($password !== $confirm_password) {
    echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden.']);
    exit;
}

// Crear instancia del controlador y registrar el usuario
$controller = new RegisterController($db);
$response = $controller->register($name, $username, $rut, $email, $password, $phone);

echo json_encode($response);
?>
