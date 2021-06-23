<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
}
include_once('functions.php');
$isSend = false;
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    if ($title === '' || $content === '') {
        $err = 'Заполните формы';
    } else if (mb_strlen($title, 'UTF8') < 2) {
        $err = 'Имя не короче 2 символов!';
    } else {
        addArticle($title, $content);
    }
} else {
    $title = '';
    $content = '';
}
$articles = getArticles();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/js/libs/Swiper/swiper-bundle.min.css">
    <title>Document</title>
</head>

<body>

    <!--<div>
        <h2> <?= $_SESSION['user']['name'] ?></h2>
        <a href="#"> <?= $_SESSION['user']['email'] ?></a>
        <div><?= $_SESSION['user']['name'] ?></div>
        <a href="vender/logout.php">Log out</a>

    </div>-->
    <header class="header">
        <div class="container">
            <div class="header__nav">
                <nav class="header__menu fill">
                    <div class="menu__icon">
                        <div class="menu__icon-bg">
                        </div>
                        <span></span>
                    </div>
                    <div class="menu__body ">
                        <ul class="header__list menu__list">
                            <li class="header__item">
                                <a href="#services" data-goto=".services" class="header__link menu__link ">
                                    Посты
                                </a>
                            </li>
                            <li class="header__item">
                                <a href="#services" data-goto=".services" class="header__link menu__link ">
                                    Юзеры
                                </a>
                            </li>
                            <li class="header__item header__user">
                                <?= $_SESSION['user']['name'] ?>
                                <a href="vender/logout.php" class="header__link menu__link ">
                                    Выход
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section class="top-page">
        <div class="top-page__opacity">
            <div class="top-page__inner">
                <div class="top-page__title ">Тестовое задание</div>
                <a class="arrow-down" href="#portfolio"></a>
            </div>
        </div>
    </section>
    <div class="popup">
        <div class="popup__content ">
            <button type="button" class="popup__close"><strong>&times;</strong></button>
            <div class="popup__message">
                <h4 class="popup__title">Добро пожаловать <?= $_SESSION['user']['name'] ?> </h4>
                <p class="popup__text"> Мы сделали все возможное чтобы пройти тестовую заданию с минимум дизайном </p>
                <div class="popup__slider">
                    <div class="image-slider swiper-container">
                        <div class="image-slider__wrapper swiper-wrapper">
                            <!-- Slides -->
                            <div class="image-slider__slide swiper-slide">
                                <div class="image-slider__images">
                                    <img src="assets/images/cat-3.jpg" alt="">
                                </div>
                            </div>
                            <div class="image-slider__slide swiper-slide">
                                <div class="image-slider__images">
                                    <img src="assets/images/cat-1.jpg" alt="">
                                </div>
                            </div>
                            <div class="image-slider__slide swiper-slide">
                                <div class="image-slider__images">
                                    <img src="assets/images/cat-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="posts">
        <div class="container">
            <div class="posts__wrapper">
                <div class="title post__title">Добавить новые посты</div>
                <div class="posts__add">
                    <? if ($isSend) : ?>
                    <? else : ?>
                        <form method="post">

                            <input type="text" name="title" id="" placeholder="title">

                            <input type="text" name="content" id="" placeholder="text">
                            <button type="submit">Add</button>
                            <div class="error">
                                <h1><?= $err ?></h1>
                            </div>
                        </form>
                    <? endif; ?>
                </div>
                <div class="posts__list">

                </div>
            </div>
        </div>
    </section>

    <section class="articles">
        <div class="container">
            <div class="articles__wrapper">
                <div class="title">Все посты</div>
                <div class="visit__block">
                    <? foreach ($articles as $id => $article) : ?>
                        <div class="visit__block-item view view-first">
                            <img class="visit__block-img" src="assets/images/post.jpg" alt="">
                            <div class="mask">
                                <h2><?= $article['title'] ?></h2>
                                <p>Чтобы удалить пост переходите по ссылке</p>
                                <a href="article.php?id=<?= $id ?>">Read more</a>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/js/libs/Swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/profile.js"></script>
</body>

</html>