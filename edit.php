<?php 
#echo $_POST['email'];
$surname = addslashes($_POST["surname"]);
$name = addslashes($_POST["name"]);
$about = addslashes($_POST["about"]);
$position = addslashes($_POST["position"]);
$login = addslashes($_GET["id"]);
$photo = "";
$uploadfilename = $login.time();
$uploadfile = "";

if(isset($_FILES['photo']['name'])){
    switch($_FILES['photo']['type']){
        case 'image/png': $uploadfile=$uploadfilename.'.png'; break;
        case 'image/gif': $uploadfile=$uploadfilename.'.gif';  break;
        default: $uploadfile=$uploadfilename.'.jpg';  break;
    }
    $photo = $_FILES['photo']['name'];
}


//echo is_uploaded_file($_FILES['photo']['tmp_name']);
//echo basename($_FILES['photo']['name']);
//echo 'th_'.basename($_FILES['photo']['name']);




require_once("utils/config.php");


$update_query = $db -> prepare("UPDATE users SET surname = :surname, name = :name, 
photo = :photo, about = :about, position = :position WHERE email=:email");


$update_query->bindParam(':surname',$surname);
$update_query->bindParam(':name',$name);
$update_query->bindParam(':photo',$uploadfile);
$update_query->bindParam(':about',$about);
$update_query->bindParam(':position',$position);
$update_query->bindParam(':email',$login);




#$query="UPDATE users SET surname = '$surname',name = '$name',password ='$passwd' WHERE email='$email'";
#echo $update_query;

if($update_query->execute()){
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
        system('public_html/utils/resize'.$photo.' '.$uploadfile, $sys);
        system('public_html/utils/th'.$uploadfile, $sys);
        echo '<html lang="ru"><head><meta http-equiv="refresh" content="2; url=index.php"></head><body><p>Данные успешно обновлены.</p></body></html>';
    }
}


?>

