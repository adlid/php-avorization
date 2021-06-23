<?php
$connect = mysqli_connect('localhost', 'root', '', 'intern');
if (!$connect) {
    die('Error connect to dataBase');
}
