<?php
session_start();

require_once 'connect.php';


$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' ");
if (mysqli_num_rows($check_login) > 0) {
    $responce = [
        "status" => false,
        "type" => 1,
        "check" => "Такой логин логин уже существует",
        "fields" => ['login']
    ];
    echo json_encode($responce);
    die();
}
$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}
if ($password === '') {
    $error_fields[] = 'password';
}
if ($name === '') {
    $error_fields[] = 'name';
}
if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}
if (!empty($error_fields)) {
    $responce = [
        "status" => false,
        "type" => 1,
        "check" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];
    echo json_encode($responce);
    die();
}
if ($password === $password_confirm) {
    $password = md5($password);
    mysqli_query(
        $connect,
        "INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`) 
         VALUES (NULL, '$name', '$login', '$email', '$password')"
    );
    $responce = [
        "status" => true,
        "message" => "Регистрация прошло успешно",
    ];
    echo json_encode($responce);
} else {
    $responce = [
        "status" => false,
        "message" => "Пароль не совпадает",
    ];
    echo json_encode($responce);
}
