<div class="containtall">
    <fieldset class="field">
        <form action="./Controlers/avatar_add.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <label for="Avatar_User">Avatar</label>
                <input type="file" class="inputFile" id="Avatar_User" name="Avatar_User" accept="image/*">
                <input type="hidden" id="imghid" name="imghid" value="">
            </div>

            <div id="modal-container" class="modal-container">
                <div class="modal-background">
                    <div class="modal">
                        <div id="mask" class="mask">
                            <div id="unblurred" class="unblurred"></div>
                        </div>
                        <img id="blurred" class="blurred">
                    </div>
                </div>
            </div>
            <input type="submit" class="subavatar" value="Valider">
        </form>
    </fieldset>
    <a href="../index.php" class="etape">Passer cette étape >></a>
</div>