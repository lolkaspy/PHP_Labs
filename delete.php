<?php 
require_once("utils/config.php");

$login = $_GET['id'];
$select_query = "SELECT * FROM users WHERE email='{$login}'";
$st = $db -> query($select_query);
$result = $st->fetch();

if(isset($result)){
    $path_f = "img/".htmlspecialchars(stripslashes($result['photo']));
    $path_s = "img/".substr_replace(htmlspecialchars(stripslashes($result['photo'])),'th_',4,0);
    //echo $path_f."    ".$path_s;
    $delete_query = "DELETE FROM users WHERE email='{$login}'";
    if($db->exec($delete_query))
    
    echo '<html lang="ru"><head><meta http-equiv="refresh" content="2; url=index.php"></head><body><p>Данные пользователя успешно удалены!</p></body></html>';
    
    if(file_exists($path_f)&&file_exists($path_s)){
       
        unlink($path_f);
        unlink($path_s); 
    }
   
    
}
else{
    echo "<p>Ошибка при запросе к базе данных.</p>";
}
?>