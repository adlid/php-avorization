<?php session_start();
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

    <form>
        <label for="">Name</label>
        <input type="text" name="name" id="">
        <label for="">login</label>
        <input type="text" name="login" placeholder="login">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="email">
        <label for="">pass</label>
        <input type="password" name="password" placeholder="password">
        <label for="">Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="password_confirm">
        <button class="btn btn-register" type="submit">Sign in</button>
        <p>У вас уже есть аккаунт<a href="/">Авторизуйтесь </a></p>
        <p class="success_message success_message--active"> </p>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>