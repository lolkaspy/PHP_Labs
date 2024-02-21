<?php 
$title = $titlehead = "Личный кабинет";
include "utils/header.php";
require_once("utils/config.php");
echo "<h2>Редактирование данных</h2>";
//echo $_SESSION['person']['email'];
if(isset($_SESSION['person']['email'])){
    $login = $_SESSION['person']['email'];
    $select_query = "SELECT * FROM users WHERE email='{$login}'";
    $st = $db -> query($select_query);
    $result = $st->fetch();
    $surname = htmlspecialchars(stripslashes($result['surname']));
    $name = htmlspecialchars(stripslashes($result['name']));
    if(empty($result['photo'])){
		$photo = "img/default_avatar.png";
	}
	else{
		$photo = "img/th_".htmlspecialchars(stripslashes($result['photo']));
	}
    $position = htmlspecialchars(stripslashes($result['position']));
    $about = htmlspecialchars(stripslashes($result['about']));

    $position_option = "";
    switch($position){
        case 0: 
            $position_option = "Администратор";
            break;
        case 1: 
            $position_option = "Студент";
            break;
        case 2: 
            $position_option = "Обычный пользователь";
            break;
    }

    echo "<form action='edit.php?id={$login}' method='post' enctype='multipart/form-data'>
    <table>
    <tr><td><label for='email'>E-mail</label></td><td>{$login}</td></tr>
    <tr><td><label for='surname'>Фамилия</label></td><td><input name='surname' type='text' value='{$surname}' size='20' maxlength='15'></td></tr>
    <tr><td><label for='name'>Имя</label></td><td><input name='name' type='text' value='{$name}' size='20' maxlength='15'></td></tr>
    <tr><td><label for='photo'>Аватар</label></td><td><img src='{$photo}' width='100' height='100'></br><input type='file' name='photo' accept='image/png, image/jpeg' size='20' maxlength='40'></td></tr>
    <tr><td><label for='about'>О себе</label></td><td><textarea name='about' rows='5' cols='60' placeholder='Введите текст'>{$about}</textarea></td></tr>
    <tr><td><label for='position'>Статус</label></td><td>{$position_option}</td></tr>
    <tr><td><label for='select_position'>Выберите статус</label></td><td><select name='position'><option value='0'>Администратор</option><option value='1'>Студент</option><option value='2'>Обычный пользователь</option></select></td></tr>
    <tr><td><input type='submit' value='Обновить данные'></td>
    <td><input type='reset' value='Сбросить данные'></td></tr>
    </table>
    
    </form>";
}
else {
    echo "При переходе был указан неверный параметр id";
}

include "utils/footer.php";
?>