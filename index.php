<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="blueBg">
            <div class="box signin">
                <h2>У вас уже есть аккаунт</h2>
                <button class="signinBtn">Войти</button>
            </div>
            <div class="box sigup">
                <h2>У вас все еще нет аккаунта</h2>
                <button class="signupBtn">Регистрация</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form>
                    <h2>Вход</h2>

                    <input class="signinForm__login" type="text" name="login" placeholder="Логин">

                    <input class="signinForm__pass" type="password" name="password" placeholder="Пароль">
                    <button class="btn btn-login" type="submit">Войти</button>
                    <a class="forgot" href="">Забыли пароль?</a>
                    <p class="success_message"> </p>
                </form>
            </div>

            <div class="form signupForm">
                <form>
                    <h2>Регистрация</h2>
                    <input class="signupForm__name" type="text" name="name" id="" placeholder="Имя">

                    <input class="signupForm__log" t type="text" name="login" placeholder="Логин">

                    <input class="signupForm__email" type="text" name="email" placeholder="Почта">

                    <input class="signupForm__pass" type="password" name="password" placeholder="Пароль">

                    <input class="signupForm__conf" type="password" name="password_confirm" placeholder="Повторите пароль">
                    <button class="btn btn-register" type="submit">Регистрация</button>
                    <p class="success_message-up"> </p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>