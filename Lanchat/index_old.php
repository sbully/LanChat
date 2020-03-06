<?php

/** Cré un cookie avec le nom, la valeur, la duré de vie
 * le true c est pour le httponly rend le cookie un peu plus secure et inacessible en js 
 */
//setcookie('pseudo',"seb",time()+365*24*3600,null,null,false,true);


/** Destruction du cookie
 * en lui affectant une durée de vie negative
 */
//setcookie('pseudo',"seb",time()-3600,null,null,false,true);

require 'autoload.php';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lan Chat</title>
    <link rel="Stylesheet" href="./css/style.css">
    <script src="//code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body><?php
        if (isset($_COOKIE['pseudo'])) {
            echo 'Bonjour ' . $_COOKIE['pseudo'] . ' bon retour parmis nous';
        }
        if (!isset($_SESSION['Pseudo_User'])) { ?>
        <fieldset>
            <legend>LOGIN</legend>

            <form method="POST" action="./Controlers/loginVerify.php">

                <label> Pseudo : </label>
                <input type="text" name="Pseudo_User" id="Pseudo_login"><br /><br />
                <label> password : </label>
                <input type="text" name="Password_User" id="Password_login"><br /><br />
                <input type="submit" id="inputValid" value="Envoyer" disabled>
            </form>
        </fieldset><?php
                } else {
                    ?>
        <fieldset>
            <legend>NOUVEL UTILISATEUR</legend>
            <form method="POST" action="./Controlers/register_add.php">

                <label> Pseudo_User : </label>
                <input type="text" name="Pseudo_User" id="Pseudo_User"><br /><br />
                <label> Password_User : </label>
                <input type="text" name="Password_User" id="Password_User"><br /><br />
                <label> Mail_User : </label>
                <input type="text" name="Mail_User" id="Mail_User"><br /><br />
                <label> UserRight_User: </label>
                <input type="text" name="UserRight_User" id="UserRight_User"><br /><br />
                <!--<label> tel: </label>
                <input type="text" name="Phone_Number" id="Phone_Number"><br /><br />
                <label>photo</label>
                <input type="file" name="Avatar_User" id="Avatar_User">-->
                <input type="submit" id="inputAdd" value="Envoyer">

            </form>
        </fieldset>
        <fieldset>
            <legend>UPDATE</legend>
            <form method="POST" action="./Controlers/update_user.php">

                <label> Pseudo_User : </label>
                <input type="text" name="Pseudo_User" id="Pseudo_User"><br /><br />
                <label> Password_User : </label>
                <input type="text" name="Password_User" id="Password_User"><br /><br />
                <label> Mail_User : </label>
                <input type="text" name="Mail_User" id="Mail_User"><br /><br />
                <label> UserRight_User: </label>
                <input type="text" name="UserRight_User" id="UserRight_User"><br /><br />
                <input type="submit" id="inputAdd" value="Envoyer">
            </form>
        </fieldset>
        <fieldset>
            <legend>Deconnexion</legend>
            <form method="POST" action="./Views/disconnect.php">
                <input type="hidden" name="Deconnexion" value="true">
                <input type="submit" value="Deconnexion" />
            </form>
        </fieldset>

    <?php
    }

    ?>




    <script type="text/javascript" src="./js/javascript.js"></script>
</body>

</html>

<?php

/*
$user = new User();
$card = new Card();
$type = 'User';
$typecard = 'Card';

debug(($user instanceof $typecard));
debug(($user instanceof Card));
debug(($user instanceof User));
debug(($user instanceof $type));

*/

/*


$db = DbConnection::getInstance();
var_export($db);


$users = new Users();
$result = $users->select(1);
$result->Mail_User = "nouveaumail1@gmail.com";

$newUser = new User();
$newUser->Mail_User = "newgamer3@gmail.com";
$newUser->UserRight_User = 2;
$newUser->Avatar_User = "";
$newUser->Pseudo_User = "Rambo";
$newUser->Password_User = "John";

$tab=[
     "Mail_User"=>"jesaispas@gmail.com",
     "UserRight_User"=>1,
     "Avatar_User"=>"aucune idee",
     "Pseudo_User"=>"Bambou",
     "Password_User"=>"AZERTY"
];

$userTest = new User($tab);

debug($userTest,"New User");
/*
$newUser->Id_User=$users->insert($newUser);
debug($newUser->Id_User);
$users->delete($newUser->Id_User);
//var_export($result);
//echo'<pre>'.var_export($result,true);
echo '</br></br></br>';
$resultall = $users->selectAll();
//var_export($resultall);

var_dump($users->update($result));*/
?>