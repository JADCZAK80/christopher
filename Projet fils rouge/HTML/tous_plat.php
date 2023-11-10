<?php
require 'DAO.php';
$navtp="active";
$nava="3";
$navca="3";
$navp="2";
$navco="3";
require 'header.php';

$tableaup = get_plat($db);
echo $bar;



?>

<div class="container-fluid mt-2 mb-2">

    <h3 class="d-flex justify-content-center">Plats</h3>
<div class="container">
    <div class="row">
        <?php foreach ($tableaup as $categories): ?>
            
            <div class="card d-flex col-md-5 m-3">

<div class="card-body">
    <h4 class="card-title"><?=$categories->libelle?> </h4>
    <div class="media">

        <div class="media-body ">
            <div class="d-flex align-items-start">
                <?='<img src="../ASSETS/images_the_district/image_retoucher/plat/'.$categories->image .'"
                    alt="cheesburger" class="plat">'?>
                <div class="ml-2"><?=$categories->description?>
                <b><br><br><?=$categories->prix?>€</b>
                <a href="commande.php?id=<?=$categories->id_plat?>"><button class="btn btn-outline-danger float-right">commander</button></a>
            </div>
                

            </div>

        </div>
    </div>
</div>
</div>
        <?php endforeach; ?>
</div>
    </div>
        </div>



<?php
require 'footer.php';
?>

                                