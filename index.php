<?php 
$title = $titlehead = "Главная страница";
include "utils/header.php";

if(isset($_SESSION['person']['name'])){

    echo "<h2>Добро пожаловать, ".$_SESSION['person']['name']."</h2>";
    
}
else{
    echo "<h2>Добро пожаловать! Войдите или зарегистрируйтесь, чтобы видеть все содержимое на сайте</h2>";
}
?>



<?php
include "utils/footer.php";
?>