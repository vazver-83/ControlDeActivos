<?php

namespace App\Models;

class User
{
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    // Example: Replace with your actual DB logic
    public static function findByUsername($username)
    {
        // Example using PDO (replace with your DB connection)
        $pdo = new \PDO('mysql:host=localhost;dbname=control_de_activos', 'root', '');
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new self($row['id'], $row['username'], $row['password']);
        }
        return null;

        0*asmjabsdjasbaskjdbaksjdbkajsbdkajsbd*/ */
    }
}
