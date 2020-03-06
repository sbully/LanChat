<?php 
header('Content-type: application/json', true);

session_start();

if(isset($_POST['refresh'])){
    if (isset($_SESSION['Last_Action'])) {
        if (time() - $_SESSION['Last_Action'] > $_SESSION['Time_Out']) {
            echo json_encode(array('TIMEOUT'=>"TRUE",));
        } else {
            echo json_encode(array('TIMEOUT'=>"FALSE IF",));
        }
    }else{
    echo json_encode(array('TIMEOUT'=>"FALSE",));
    }
} 