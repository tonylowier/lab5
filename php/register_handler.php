<?php
session_start();
include 'db.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmed_password = $_POST['confirmed_password'];

    if ($password !== $confirmed_password) {
        $errors['password'] = "Пароли не совпадают.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (login, email, password, confirmed_password) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssss", $login, $email, $hashed_password, $hashed_password);

        if ($stmt->execute()) {
            header("Location: auth.php");
            exit();
        } else {
            $errors['general'] = "Ошибка: " . $stmt->error;
        }

        $stmt->close();
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
    header("Location: register.php");
    exit();
}

$db->close();
?>
