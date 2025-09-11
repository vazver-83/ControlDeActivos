<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validate input
            if (empty($username) || empty($password)) {
                $error = 'Username and password are required.';
                require_once __DIR__ . '/../Views/login.php';
                return;
            }

            // Attempt to find user
            $user = User::findByUsername($username);
            if ($user && password_verify($password, $user->password)) {
                // Set session or token
                session_start();
                $_SESSION['user_id'] = $user->id;
                header('Location: /dashboard');
                exit;
            } else {
                $error = 'Invalid username or password.';
                require_once __DIR__ . '/../Views/login.php';
                return;
            }
        }

        // Show login form
        require_once __DIR__ . '/../Views/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
