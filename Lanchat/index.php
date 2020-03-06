<?php
require './autoload.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lan Chat</title>
    <link rel="Stylesheet" href="./css/style.css">
    <link rel="Stylesheet" href="./css/stylecolor.css">
    <link rel="Stylesheet" href="./css/modal.css">
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body><?php
        /*if (isset($_SESSION['Pseudo_User'])){
    echo '<H2>'.$_SESSION['Pseudo_User'].'</H2>';
}*/
        ?>
        <nav>
            <ul class="menu">
                <li><a href="./">Accueil</a></li>
                <li><a href="/inscription">Inscription</a></li>
                <li><a href="/update">Update</a></li>
                <?php if (isset($_SESSION['Pseudo_User'])) {

                    echo '<li><a href="/Views/disconnect.php">Deconnexion</a></li>';
                } else {
                    echo '<li><a href="/login">Login</a></li>';
                }
                ?>

            </ul>
        </nav>
        <H1>Bonjour</H1>
        <?php
        /*
$page="login";

if(!empty($_GET['page'])){

    $page=$$_GET['page'];

}*/
        $page = !empty($_GET['page']) ? basename($_GET['page']) : "login";
        $path = (__DIR__ . "/Views/" . $page . ".php");
        if (is_file($path)) {

            require($path);
        } else {
            echo "La page demandée n'existe pas ou a été déplacé";
        }

        ?>
        <!--<script type="text/javascript" src="./js/javascript.js"></script>-->
        <script type="text/javascript" src="./js/formValidator.js"></script>
        <script type="text/javascript" src="./js/modal.js"></script>
        <script type="text/javascript" src="./js/fileValidator.js"></script>

    </body>

</html>