<?php

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
    <div class="mobile">

    <h3 class="d-flex justify-content-center">Catégories</h3>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($tableau as $categories): ?>
            
            <div class="col-md-4  d-none d-md-block ">
                    <?='<a href="plat.php?id_categorie='. $categories->id . '">'?>
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

                </a>
                </div>
        
        <?php endforeach; ?>
</div>
    </div>
</div>


<h3 class="d-flex justify-content-center">Plats</h3>
    <?php $nplat=1;?>
    <div class="card-deck  justify-content-around ">
        <?php foreach ($tableaua as $categoriea): ?>
            <?php if ($nplat <4) {
            echo '<a href="commande.php?id='.$categoriea->id_plat.'"><div class=" card mt-4 mb-4 ">
            
                        <div class="card-body">
                            
                            <h4 class="card-title">'.$categoriea->libelle.'</h4>
                            <div><img src="../ASSETS/images_the_district/food/'.$categoriea->image.'" alt="" class=" card-img-bottom"> 
 
                            </div>
                        </div>
                
                        </a>
                        </div>';
                   } elseif ($nplat <5){
                    echo '</div> 
                    <div class="card-deck  justify-content-around d-lg-none">
                    <a href="commande.php?id='.$categoriea->id_plat.'"><div class=" card mt-4 mb-4">
                        <div class="card-body">
                            
                            <h4 class="card-title">'.$categoriea->libelle.'</h4>
                            <div><img src="../ASSETS/images_the_district/food/'.$categoriea->image.'" alt="" class=" card-img-bottom"> 
 
                            </div>
                        </div>
                
                </a>
                    </div>';

                   } elseif ($nplat <6){
                    echo '<a href="commande.php?id='.$categoriea->id_plat.'"><div class=" card mt-4 mb-4">
                    <div class="card-body">
                        
                        <h4 class="card-title">'.$categoriea->libelle.'</h4>
                        <div><img src="../ASSETS/images_the_district/food/'.$categoriea->image.'" alt="" class=" card-img-bottom"> 

                        </div>
                    </div>
            </a>
            
                </div>
                </div>';
                   }
                   $nplat++;?>
    <?php endforeach; ?>
</div>
<?php
require 'footer.php';
?>
