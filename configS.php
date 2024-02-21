<?php 
//phpinfo();
try{
$db = new PDO('sqlite:db/belyaev2009a.db');
/*$db->exec(
"CREATE TABLE IF NOT EXISTS `users` (
   `surname` varchar(15) DEFAULT NULL,
   `name` varchar(15) NOT NULL,
   `password` varchar(40) NOT NULL,
   `email` varchar(25) NOT NULL,
   `regdate` int(10) NOT NULL,
   `photo` varchar(200) DEFAULT NULL,
   `position` int(1) DEFAULT NULL,
   `about` text);"
);*/
}
catch(PDOException $er){
	die($er->getMessage());
}
?>