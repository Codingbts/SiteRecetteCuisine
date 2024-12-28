<?php 
$recette=[
    [
        'title' => 'Couscous',
        'author' => 'Saad'
    ],
    [
        'title' => 'Burger',
        'author' => 'Karim',
    ],
    [
        'title' => 'Pizza',
        'author' => 'Saber',
    ],
    [
        'title' => 'Choucroute',
        'author' => 'Marie',
    ]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette cuisine</title>
</head>
<body>
    <ul>
        <?php for($lines=0; $lines<=3; $lines++):?>
            <li><?php echo $recette[$lines]['title'] . ' ' . $recette[$lines]['author'];?></li>
        <?php endfor;?>
    </ul>
    
</body>
</html>