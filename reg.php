<?php 
#echo $_POST['email'];
$surname = addslashes($_POST['surname']);
$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$password = addslashes($_POST['passwd']);

if(!$email || !$password || !$name){
echo '<p>Не все данные введены!</p>';

}
else{

if($_POST['passwd2']<>$password){
echo '<p>Пароли не совпадают!</p>';
}
else{
$password = SHA1(md5($password));
$regdate = time();

$query = "INSERT INTO users VALUES ('$surname','$name','$password','$email','$regdate','','','')";
include_once("utils/config.php");

if($db->exec($query)){
echo '<html lang="ru"><head><meta http-equiv="refresh" content="2; url=index.php"></head><body><p>Данные успешно добавлены в базу!</p></body></html>';
}
}
}



#echo $query;




?>

