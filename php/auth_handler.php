<?php
session_start();
include 'db.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Проверка reCAPTCHA
    $recaptchaSecret = '6Ldk0wUqAAAAAL11FCEy68J_Ajin62npQVc2uQGx';
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';

    $recaptchaVerifyResponse = file_get_contents($recaptchaUrl . '?secret=' . $recaptchaSecret . '&response=' . $recaptchaResponse);
    $recaptchaVerifyResponseData = json_decode($recaptchaVerifyResponse);

    if (!$recaptchaVerifyResponseData->success) {
        $errors['recaptcha'] = "Проверка reCAPTCHA не пройдена. Попробуйте снова.";
    } else {
        $sql = "SELECT id, login, email, password, role FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $login, $email, $hashed_password, $role);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                $_SESSION['id'] = $id;
                $_SESSION['login'] = $login;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                header("Location: lk.php");
                exit();
            } else {
                $errors['password'] = "Неправильный пароль.";
            }
        } else {
            $errors['email'] = "Пользователь не найден.";
        }
    }

    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
    header("Location: auth.php");
    exit();
}

$stmt->close();
$db->close();
?>
