<?php
session_start();
require_once(__DIR__ . '/fonctions.php');
require_once(__DIR__ . '/variables.php')
?>

<?php
if (isset($_POST["email"]) && isset($_POST["password"])) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = "L'email est invalide !";
    } else {

        foreach ($users as $user) {
            if($user["email"] === $_POST["email"] && $user["password"] === $_POST["password"]) {
                $_SESSION['LOGGED_USER'] = [
                    "email" => $user["email"],
                    'user_id' => $user['user_id'],
                ];
            }
        }

        if (!isset( $_SESSION['LOGGED_USER'])) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                "Les infos données ne permettent pas de vous s'identifier : (%s/%s)",
                $_POST["email"],
                strip_tags($_POST["password"])
            );
        }
    }

redirectToUrl('index.php');
}
?>