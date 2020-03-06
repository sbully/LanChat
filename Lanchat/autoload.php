<?php

session_start();


if (isset($_SESSION['Last_Action'])) {
        if (time() - $_SESSION['Last_Action'] > $_SESSION['Time_Out']) {
            session_destroy();
            header("location:./Views/disconnect.php");
        } else {
            $_SESSION['Last_Action'] = time();
        }
    }

/*
if (isset($_SESSION['Last_Action'])) {
    while (true) {
        if (time() - $_SESSION['Last_Action'] > $_SESSION['Time_Out']) {
            session_destroy();
            header("location:./Views/disconnect.php");
        } else {
            $_SESSION['Last_Action'] = time();
        }
        sleep(30);
        var_dump($_SESSION['Last_Action']);
    }
}*/





function AutoLoad($className)
{
    $filename = (__DIR__ . '/Models/' . $className . '.php');
    //var_dump($filename);
    //var_dump(__DIR__);
    if (is_file($filename)) {
        require $filename;
    } else {
        exit("Erreur Fatal (AutoLoad)" . $filename);
    }
}

spl_autoload_register('AutoLoad');

function debug($_obj, $_title = null, $exit = false)
{
    echo '<h2>' . $_title . '</h2>';
    echo '<pre>' . var_export($_obj);
    if ($exit) {
        exit();
    }
}
