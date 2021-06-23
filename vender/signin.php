<?php
session_start();
require_once('connect.php');
$login = $_POST['login'];
$password = $_POST['password'];
$error_fields = [];

if ($login === '') {
    $error_fields[] = 'Заполните логин';
}
if ($password === '') {
    $error_fields[] = 'Заполните пароль';
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
$password = md5($_POST['password']);
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE  `login`= '$login' AND `password`='$password'");
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "email" => $user['email']
    ];
    //header('Location: ../profile.php');
    $responce  = [
        "status" => true
    ];
    echo json_encode($responce);
} else {
    $responce  = [
        "status" => false,
        "message" =>  "Неверный логин или пароль"
    ];
    echo json_encode($responce);
}
