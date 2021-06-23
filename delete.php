<?php

include_once('functions.php');
$id = (int)($_GET['id'] ?? '');
$isDone = false;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    removeArticle($id);
    $isDone = true;
}
?>

<div>
    <? if ($isDone) : ?>
        <p>Пост удалено</p>
    <? endif ?>


</div>
<hr>
<a href="profile.php">Главная Страница</a>