<?php
if (isset($_SESSION['Pseudo_User'])) {
    ?>
    <H2>Vous êtes déjà inscrit sur le site</H2>
<?php
} else {
    ?>
    <fieldset class="field">
        <legend>INSCRIPTION</legend>

        <form action="./Controlers/register_add.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <label for="Pseudo_User">Pseudo</label>
                <input type="text" class="input" id="Pseudo_User" name="Pseudo_User">
            </div>

            <div class="container">
                <label for="Mail_User">Mail</label>
                <input type="email" class="input" id="Mail_User" name="Mail_User">
            </div>

            <div class="container">
                <label for="Mail_User_Confirm">Mail confirm</label>
                <input type="email" class="input" id="Mail_User_Confirm" name="Mail_User_Confirm">
            </div>

            <div class="container">
                <label for="Password_User">Password</label>
                <input type="password" class="input" id="Password_User" name="Password_User">
            </div>
            <div class="container">
                <label for="Password_User_Confirm">Password confirm</label>
                <input type="password" class="input" id="Password_User_Confirm" name="Password_User_Confirm">
            </div>
           <!-- <div class="container">
                <label for="Avatar_User">Avatar</label>
                <input type="file" class="inputFile" id="Avatar_User" name="Avatar_User" accept="image/*">
                <input type="hidden">
            </div>-->

            <input type="submit" class="submit" value="Soumettre">
            <!--<button type="submit">Valider</button>-->
        </form>
    </fieldset>

<?php


}
