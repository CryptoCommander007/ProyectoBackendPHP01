<?php

// backend/models/User.php

class User {
    // Propiedades que representan los campos de la tabla users
    public $id;
    public $username;
    public $email;
    public $phone;
    public $password_hash;
    public $google_id;
    public $name;
    public $profile_picture;
    public $bio;
    public $is_active;
    public $is_admin;
    public $created_at;
    public $updated_at;
    public $last_login;
    public $password_reset_token;
    public $password_reset_expires;

    // Constructor que inicializa los valores de las propiedades
    public function __construct($id, $username, $email, $phone, $password_hash, $google_id, $name, $profile_picture, $bio, $is_active, $is_admin, $created_at, $updated_at, $last_login, $password_reset_token, $password_reset_expires) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password_hash = $password_hash;
        $this->google_id = $google_id;
        $this->name = $name;
        $this->profile_picture = $profile_picture;
        $this->bio = $bio;
        $this->is_active = $is_active;
        $this->is_admin = $is_admin;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->last_login = $last_login;
        $this->password_reset_token = $password_reset_token;
        $this->password_reset_expires = $password_reset_expires;
    }
}
