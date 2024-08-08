<?php
require_once '../../config/db.php';
require_once '../../models/user.php';
session_start();

if(isset($_POST['register_submit'])) {
    $database = new DB();
    $db = $database->connect();

    if($db) {
        $user = new User($db);
        
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $confirmPass = $_POST['confirm_password'];

        // Almacenar los datos del formulario en la sesión
        $_SESSION['form_data'] = [
            'username' => $_POST['username'],
            'email' => $_POST['email']
        ];

        if($user->password === $confirmPass ) {
            $result = $user->register();

            if($result === true) {
                // Limpiar los datos del formulario de la sesión
                unset($_SESSION['form_data']);
                // Redirigir al usuario a la página de inicio de sesión con un mensaje de éxito
                $_SESSION['success'] = "Registration successful, please sign in";
                header("Location: ../../views/id/login.php?registration=success");
                exit();
            } else {
                // Almacenar el mensaje de error en la sesión
                $_SESSION['error'] = $result;
            }
        } else {
            $_SESSION['error'] = "The passwords do not match.";
        }
    } else {
        $_SESSION['error'] = "Failed to connect to the database."; // Mensaje de error si la conexión falla
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirigir de vuelta a la página de registro para mostrar el mensaje
header("Location: ../../views/id/register.php");
exit();
