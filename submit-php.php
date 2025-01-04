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

<?php
if(isset($_FILES['screenshot']) && $_FILES['screenshot']['error']==0)
{
    if($_FILES['screenshot']['size']>1000000)
    {
        echo 'Taille de fichier trop grands !';
        return;
    }
}

$pathInfo = pathinfo($_FILES['screenshot']['name']);

$extension = $pathInfo['extension'];

$validExtension=['jpg','jpeg','gif', 'png'];
if(!in_array($extension, $validExtension))
{
    echo "L'extension {$extension} n'est pas valide !";
    return;
}


$path = __DIR__ . '/uploads/';

if(!is_dir($path))
{
    echo "Le dossier uploads n'existe pas !";
    return;
}
else
{
    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']));
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

