<?php
require_once 'config/database.php';
require_once 'app/Models/User.php';

class AuthController {

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $db = Database::connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$_POST['username']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                die("USER TIDAK KETEMU");
            }

            if (!password_verify($_POST['password'], $user['password'])) {
                die("PASSWORD SALAH");
            }

            $_SESSION['user'] = $user;
            header("Location: /trifting/product/index");
            exit;
        }

        include 'app/Views/auth/login.php';
    }

    public function logout(){
        session_destroy();
        header("Location: /trifting/");
    }
}
