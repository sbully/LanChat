<?php

session_start();
session_destroy();

echo '<h2>Session a expiré retour à la page d\'acceuil</h2>';


/*
if(isset($_POST['Deconnexion'])){
    session_destroy();
    }else{
echo'<h2>Session a expiré retour à la page d\'acceuil</h2>';
}*/

header("Location:/");
