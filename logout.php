<?php 
session_start();

$_SESSION = array();

if(session_destroy())
echo '<html lang="ru"><head><meta http-equiv="refresh" content="2; url=index.php"></head><body><p>Осуществляется выход из системы</p></body></html>';

?>