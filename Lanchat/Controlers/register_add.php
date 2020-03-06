<?php
require '../autoload.php';

/*
$pass = password_hash($_POST['Password_User'],PASSWORD_BCRYPT);
var_dump($pass);
*/
$extensions = array('.gif','.jpeg','.jpg','.png');


if (
    isset($_POST['Pseudo_User']) && isset($_POST['Password_User'])
    && isset($_POST['Mail_User'])) {

    $tab = [];
    foreach ($_POST as $key => $value) {
        if($key=='Password_User'){
            $tab[$key] = password_hash($value,PASSWORD_BCRYPT);
        }else{
        $tab[$key] = $value;
    }
    }

    var_dump($tab);
    $user = new User($tab);
    $users = new Users();
    //var_dump($users->insert($user));
    $_SESSION['Pseudo_User']=$_POST['Pseudo_User'];
    $_SESSION['Mail_User']=$_POST['Mail_User'];
    $_SESSION['Id_User']=($users->insert($user));
    
} else {
    var_dump("fail");
}

header('location:../index.php?page=avatar');