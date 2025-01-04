<?php
$postData = $_POST;

if(!isset($postData['email'])
   ||!filter_var($postData['email'],FILTER_VALIDATE_EMAIL)
   || empty($postData['message'])
   || trim($postData['message'])==='')    
{
    echo "il faut un email et un mot de passe !";

    return;
}
?>

<h1>Message bien reçu !</h1>
        
<div class="card">
    
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo $postData['email']; ?></p>
        <p class="card-text"><b>Message</b> : <?php echo strip_tags($postData['message']); ?></p>
    </div>
</div>

