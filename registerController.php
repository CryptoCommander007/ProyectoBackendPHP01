<?php

require_once '../database/db.php';
require_once '../models/User.php';

class RegisterController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($name, $username, $rut, $email, $password, $phone) {
        try {
            // Hash de la contraseña
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // Preparar y ejecutar el Stored Procedure
            $stmt = $this->db->prepare("CALL register_user(:username, :email, :phone, :password_hash, :name, @success, @message)");
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':phone' => $phone,
                ':password_hash' => $password_hash,
                ':name' => $name
            ]);

            // Obtener los valores de salida del Stored Procedure
            $output = $this->db->query("SELECT @success AS success, @message AS message")->fetch(PDO::FETCH_ASSOC);

            return [
                'success' => (bool) $output['success'], 
                'message' => $output['message']
            ];
        } catch (PDOException $e) {
            return [
                'success' => false, 
                'message' => 'Error al registrar el usuario: ' . $e->getMessage()
            ];
        }
    }
}
?>
