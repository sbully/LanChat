<?php
if(isset($_SESSION['Pseudo_User'])){
?>
<fieldset class="field">
    <legend>UPDATE</legend>
    <form method="POST" action="./Controlers/update_user.php">
        <div class="container">
            <label for="Pseudo_User">Pseudo</label>
            <input type="text" class="input" id="Pseudo_User" name="Pseudo_User" value=<?=$_SESSION['Pseudo_User']?>>
        </div>

        <div class="container">
            <label for="Mail_User">Mail</label>
            <input type="email" class="input" id="Mail_User" name="Mail_User" value=<?=$_SESSION['Mail_User']?>>
        </div>

        <div class="container">
            <label for="Mail_User_Confirm">Mail confirm</label>
            <input type="email" class="input" id="Mail_User_Confirm" name="Mail_User_Confirm">
        </div>
        <div class="container">
            <label for="Password_User">Current Password</label>
            <input type="password" class="input" id="Password_User" name="Password_User">
        </div>
        <div class="container">
            <label for="Password_User">New Password</label>
            <input type="password" class="input" id="Password_User" name="Password_User">
        </div>
        <div class="container">
            <label for="Password_User_Confirm">Confirm New Password</label>
            <input type="password" class="input" id="Password_User_Confirm" name="Password_User_Confirm">
        </div>
        <div class="container">
            <label for="Avatar_User">Confirm New Password</label>
            <input type="password" class="input" id="Password_User_Confirm" name="Password_User_Confirm">
        </div>
        <input type="submit" class="submit" value="Soumettre">
        <!--<button type="submit">Valider</button>-->

    </form>
</fieldset><?php
}else{?>
<H2>Vous n'êtes pas connecté</H2><?php
}
?>
