<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title><?= $title ?></title>
</head>
<body>

<header>




<?php
session_start();
if(isset($_SESSION['person']['email'])){
    $email = $_SESSION['person']['email'];
    $name = $_SESSION['person']['name'];
    echo $name."</br>";
    echo '<form class="logout_btn" action="logout.php" method="post">
    <input type="submit" value="Выйти"></form>
    <form class="self_edit_btn" action="selfeditform.php?id='.$email.'" method="post"><input type="submit" value="Личный кабинет"></form>';
}
else{
    echo '<form class="login_form" action="auth.php" method="post">
    <input name="email" type="text" maxlength="25" size="20" required placeholder="Ваш e-mail">
    <input name="passwd" type="password" maxlength="40" size="20" required placeholder="Пароль">
    <input type="submit" value="Войти">
    <a href="regform.php">Регистрация</a>
    </form>';
}
?>

<hr>
<nav>
<menu>
<li><a href="index.php">Главная</a></li>
<li><a href="users.php">Пользователи</a></li>
<li><a href="news.php">Новости</a></li>
</menu>
</nav>
<h1><?= $titlehead ?></h1>

</header>
