

<?php
if (isset($_POST["email"]) && isset($_POST["password"])) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "L'email est invalide !";
    } else {

        foreach ($users as $user) {
            if($user["email"] === $_POST["email"] && $user["password"] === $_POST["password"]) {
                $loggerUser = [
                    "email" => $user["email"]
                ];
            }
        }

        if (!isset($loggerUser)) {
            $errorMsg = sprintf(
                "Les infos données ne permettent pas de vous s'identifier : (%s/%s)",
                $_POST["email"],
                strip_tags($_POST["password"])
            );
        }
    }
}
?>
    <?php if(!isset($loggerUser)):?>
    <form action="index.php" method="POST">
    <?php if(isset($errorMsg)):?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMsg;?>
        </div>
    <?php endif; ?>
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email">
        <label for="mdp">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password"></br>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php else :?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $loggerUser["email"]?>, bienvenue dans mon site !
    </div>
<?php endif; ?>