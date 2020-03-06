<?php
require '../autoload.php';


if (isset($_FILES["Avatar_User"]) && isset($_SESSION['Pseudo_User']) & isset($_SESSION['Id_User'])) {
    if (isset($_POST["imghid"])) {
        echo $_POST["imghid"];

       // header("content-type:image/png");
        $img = explode(',', $_POST["imghid"])[1];
        $param = base64_decode($img);
        $name= "../img/".$_SESSION['Id_User'].".jpeg";
        //file_put_contents("../img/avatar.jpeg",  $param);
        file_put_contents($name,  $param);
    }


    // $tab['Avatar_User']=$_FILES['Avatar_User']['name'];
    /*
       if(is_uploaded_file($_FILES['Avatar_User']['tmp_name']))
       {
        move_uploaded_file($_FILES['Avatar_User']['tmp_name'],"../img/".$_FILES['Avatar_User']['name']);
       }*/
}


    header('location:../index.php');
