<?php
$nplat="1";
$navta="active";
$nava="2";
$navca="3";
$navp="3";
$navco="3";
require 'header.php';
require 'DAO.php';
$tableau = get_categorie($db);
$tableaua = get_plata($db);
 // Appel de la fonction et assignation du résultat à $tableau
 echo $vid;
?>
<div class="corp pt-2">
<div class="container-fluid mt-2 mb-2">
    <div class="row">
        <?php foreach ($tableau as $categories): ?>
            
                <div class="col-4 mobile">
                    <div class=" card mt-4 mb-4 hover">
                        <div class="card-body">
                            <?= "<p class='d-flex justify-content-center text'>".  $categories->libelle ."</p>"?>
                            <br>
                            <br>
                        </div>
                            
                                <div class="d-flex justify-content-center">
                                <?='<img src="../ASSETS/images_the_district/image_retoucher/catégorie/'.$categories->image.'" alt="" >'
                                ?> 
                                
                                
                                
                            </div>
                    
                    
                </div>
            </div>
        
        <?php endforeach; ?>

    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <?php foreach ($tableaua as $categoriea): ?>
            
            <div class="col-4 nombre<?=$nplat?>">
                <div class=" card ">
                    <div class="card-body">
                        <?= "<p class='d-flex justify-content-center text'>".  $categoriea->libelle ."</p>"?>
                    </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                            <?='<img src="../ASSETS/images_the_district/food/'.$categoriea->image.'" alt="" class="paccueil card-img-bottom">'
                            ?> 
                            </div>
                        </div>
                
                
            </div>
        </div>
    <?php $nplat++; ?>
    <?php endforeach; ?>


        </div>
<?php
require 'footer.php';
?>
