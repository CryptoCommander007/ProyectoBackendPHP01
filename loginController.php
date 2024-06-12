<?php

require_once __DIR__ . '/../database/db.php';
require_once __DIR__ . '/../models/User.php';

function authenticateUser($username, $password) {
    global $db;

    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return [
                'success' => true,
                'user' => new User(
                    $user['id'],
                    $user['username'],
                    $user['email'],
                    $user['phone'],
                    $user['password_hash'],
                    $user['google_id'],
                    $user['name'],
                    $user['profile_picture'],
                    $user['bio'],
                    $user['is_active'],
                    $user['is_admin'],
                    $user['created_at'],
                    $user['updated_at'],
                    $user['last_login'],
                    $user['password_reset_token'],
                    $user['password_reset_expires']
                )
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Nombre de usuario o contraseña incorrectos.'
            ];
        }
    } catch (PDOException $e) {
        return [
            'success' => false,
            'message' => 'Error al autenticar: ' . $e->getMessage()
        ];
    }
}
?>

