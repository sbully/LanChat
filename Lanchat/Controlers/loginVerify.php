<?php
//session_start();

require '../autoload.php';
debug($_POST,"POST");
if (isset($_POST['Pseudo_User']) && isset($_POST['Password_User'])) {

    $users = new Users();
    foreach ($_POST as $key => $value) {
        if ($key != 'Password_User') {
            $param[$key] = $value;
        }
    }

    $result = $users->find($param);

    $pass = password_verify($_POST['Password_User'], $result->Password_User);
    var_dump($pass);
    if($pass){
        $_SESSION['Pseudo_User']=$_POST['Pseudo_User'];
        $_SESSION['Mail_User']=$result->Mail_User;

        $_SESSION['Last_Action']=time();
        $_SESSION['Time_Out']= 300;
    }
    
}else{
    var_dump("Fail");
}

header('location:../index.php');