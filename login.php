    <?php if(!isset($_SESSION['LOGGED_USER'])):?>
    <form action="submit_login.php" method="POST">
    <?php if(isset($_SESSION['LOGIN_ERROR_MESSAGE'])):?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
            unset($_SESSION['LOGIN_ERROR_MESSAGE']);?>
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
        Bonjour <?php echo $_SESSION['LOGGED_USER']['email']?>, bienvenue dans mon site !
    </div>
<?php endif; ?>