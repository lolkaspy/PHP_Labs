<?php 
$title = $titlehead = "Пользователи";
include "utils/header.php";
echo '<link rel="stylesheet" href="utils/style.css">';

if(!isset($_GET['searchType'])||!isset($_GET['searchTerm'])){
    echo "<p>Параметры поиска не заданы. Выведен полный список. </p>";
}
else{
    $searchType=addslashes($_GET['searchType']);
    $searchTerm=addslashes($_GET['searchTerm']);
    trim($searchTerm);
    $select_query = "SELECT * FROM users WHERE $searchType LIKE '%$searchTerm%' ORDER BY surname";
}

require_once("utils/config.php");

if(!isset($select_query))
$select_query = "SELECT * FROM users ORDER BY surname";
?>

<form action="users.php" method="get">
<p>Выберите параметр поиска:<br>
<select name="searchType">
<option value="surname" selected>По фамилии</option>
<option value="name">По имени</option>
<option value="email">По адресу</option>
<option value="position">По статусу</option></select>
</p>
<p>Задайте условия поиска:<br>
<input name="searchTerm" type="text">
</p>

<input type="submit" value="Найти пользователя">
</form>
<hr>

<?php
date_default_timezone_set('Asia/Barnaul');
echo "<form action='regform.php'><input type='submit' value='Добавить пользователя'></form>
<table><tr><th>№</th><th>Фамилия</th><th>Имя</th><th>E-mail</th><th>Дата регистрации</th>
<th>Фото</th><th>Статус</th><th>О себе</th><th colspan='2'>Действие</th></tr>";
$st = $db -> query($select_query);

if(!$st) echo "Ошибка при обращении к базе данных.";
$result = $st->fetchAll();
$count = 0;
foreach ($result as $row) {
    $login = htmlspecialchars(stripslashes($row['email']));
    $surname = htmlspecialchars(stripslashes($row['surname']));
    $name = htmlspecialchars(stripslashes($row['name']));
    $regdate = date("d.m.Y (Hч. iмин. sсек., Барнаул)",$row['regdate']);
	$photo = "";
	if(empty($row['photo'])){
		$photo = "img/default_avatar.png";
	}
	else{
		$photo = htmlspecialchars(stripslashes($row['photo']));
	}
    $position = htmlspecialchars(stripslashes($row['position']));
    $about = htmlspecialchars(stripslashes($row['about']));
    ++$count;

    echo "<tr><td>{$count}</td><td>{$surname}</td><td>{$name}</td><td>{$login}</td>
    <td>{$regdate}</td><td><img src='{$photo}' width='100' height='100' alt='Аватар пользователя {$name} {$surname}'></td><td>{$position}</td><td>{$about}</td>
    <td><a href='editform.php?id={$login}'>Редактировать</a></td><td><a href='delete.php?id={$login}'>Удалить</a></td></tr>";
}

echo "</table>";
echo "<form action='regform.php'><input type='submit' value='Добавить пользователя'></form>";


include "utils/footer.php";
?>