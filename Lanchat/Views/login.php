<?php


if(isset($_SESSION['Pseudo_User'])){
?>

<H2>Bonjour <?=$_SESSION['Pseudo_User']?></H2>


<?php
}else{

?>


<fieldset class="field">
<legend>LOGIN</legend>

<form method="POST" action="./Controlers/loginVerify.php">
<div class="container">
    <label for="Pseudo_User">Pseudo</label>
    <input type="text" class="input" name="Pseudo_User" id="Pseudo_User">
</div>
    <div class="container">
    <label for="Password_User">password</label>
    <input type="text" class="input" name="Password_User" id="Password_User">
    </div>
    
    <input type="submit"  class="submit" value="Envoyer" disabled>
</div>
</form>
</fieldset><?php
}