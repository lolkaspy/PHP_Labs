<?php 
include_once("utils/config.php");

$email = addslashes($_POST['email']);
$password = addslashes($_POST['passwd']);
if(!$email || !$password ){
    echo '<p>Вы ввели пустой e-mail или пароль</p>';
    }
else{
    $password = SHA1(md5($password));
    $select_query = "SELECT email, password, name FROM users WHERE email='{$email}'";
    $st = $db -> query($select_query);
    $result = $st->fetch();
    //echo $result['email']." ".$result['name'];
    if(isset($result['email'])&&$result['email']==$email&&$result['password']==$password){
        session_start();
		$session_vars['name'] = $result['name'];
		$session_vars['email'] = $result['email'];
        $_SESSION['person'] = $session_vars;
        echo '<html lang="ru"><head><meta http-equiv="refresh" content="2; url=index.php"></head><body><p>Вы авторизованы. Сейчас вас вернет на главную страницу!</p></body></html>';
  
    }
    else{
        echo '<p>Пользователя с таким e-mail нет в системе, либо пароль неверный</p>';
    }

}

?>