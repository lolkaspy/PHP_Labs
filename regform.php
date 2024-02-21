<?php 
$title = $titlehead = "Главная страница";
include "utils/header.php";
?>

<h2>Регистрационная форма</h2>
<form action="reg.php" method="post">
<table>
<tr><td><label for="surname">Фамилия</label></td><td><input id="surname" name="surname" type="text" size="20" maxlength="15"></td></tr>
<tr><td><label for="name">Имя</label></td><td><input id="name" name="name" type="text" size="20" maxlength="15"></td></tr>
<tr><td><label for="email">E-mail</label></td><td><input id="email" name="email" type="email" size="20" maxlength="25"></td></tr>
<tr><td><label for="passwd">Пароль</label></td><td><input id="passwd" name="passwd" type="password" size="20" maxlength="40"></td></tr>
<tr><td><label for="passwd2">Повторите пароль</label></td><td><input id="passwd2" name="passwd2" type="password" size="20" maxlength="40"></td></tr>
<tr><td><input type="submit" value="Зарегистрироваться"></td>
<td><input type="reset" value="Сбросить данные"></td></tr>
</table>

</form>
<?php
include "utils/footer.php";
?>