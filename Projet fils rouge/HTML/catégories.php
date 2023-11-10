<?php
$navtca="active";
$nava="3";
$navca="2";
$navp="3";
$navco="3";
require 'header.php';

require 'DAO.php';
$tableau = get_categorie($db);
echo $bar;


?>


<div class="container-fluid mt-2 mb-2">
    <div class="mobile">

    <h3 class="d-flex justify-content-center">Catégories</h3>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($tableau as $categories): ?>
            <div class="pl-5 col-12 col-sm-4">
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

<?php
require 'footer.php';
?>