<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="hidth=device-hidth, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../ASSETS/images_the_district/the_district_brand/favicon.png">
    <link rel="stylesheet" href="styles.css">
    <title>The District</title>
</head>
<body>
<header>
<div class="container-fluid  " style="background-color: #970747;">
    
    <nav class="navbar navbar-expand-lg navbar-light ">
        
        <img src="../ASSETS/images_the_district/the_district_brand/logo_transparent.png" style="width: 13vw; height: 13vw;" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            Menu<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="menu">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            
            <li class="nav-item ">
                <a class="nav-link <?=$navta?> h<?=$nava?>" href="index.php">Accueil </a>
            </li>
            
            
            <li class="nav-item ">
                <a class="nav-link <?=$navtca?> h<?=$navca?>" href="catégories.php"><span class="sr-only">(current)</span>Catégorie</a>
            </li>
           
            
            <li class="nav-item ">
                <a class="nav-link <?=$navtp?> h<?=$navp?>" href="tous_plat.php">Plats</a>
            </li>
            
            
            <li class="nav-item">
                <a class="nav-link <?=$navtco?> h<?=$navco?>" href="contact.php">Contact</a>
            </li>
            
            </ul>
        </div>
    
    </nav>
    
</div>
<?php
$bar='<div class="container-fluid p-5" style="background-image: url(../ASSETS/images_the_district/bg1.jpeg); background-size: cover;">
        <div class="d-none d-sm-block">
        </div>
    </div>
</div>
</header>';

$vid='
<div class="d-none d-sm-block">
<div class=" container justify-content-center">
    <video autoplay loop muted style=" width: 100% ;max-height: 15vw;">
        <source src="../ASSETS/video/mov_bbb.mp4">
    </video>
</div>
</div>

<div class="d-none d-sm-block">
    <div class="overlay">
        <form action="" method="post">
            <input class="rounded mx-auto d-block" type="text" placeholder="Recherche...">
        </form>
    </div>
</div>
</header>';
?>

