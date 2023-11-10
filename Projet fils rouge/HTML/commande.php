<?php
$nava="3";
$navca="3";
$navp="3";
$navco="3";
require 'header.php';


require 'DAO.php';
echo $bar;
?>
<div class="container">
        <form method="POST" id="Form" action="commande_script.php" onSubmit="return Verification()">


<?php
$tableau=get_commande($db);
?>
            <div class="card-deck">
                <div class="card" style="border-color: white;">
                    <div class="card-body ">
                        <p class="card-title">Nom et Prénom<span class="text-danger">*</span></p>

                        <label for="nom"></label>
                        <input type="text" class="form-control" id="nom" name="nom" class="w-100">
                        <span id="nom_manquant"></span>
                    </div>
                </div>



            </div>


            <div class="card-deck ">
                <div class="card " style="border-color: white;">
                    <div class="card-body ">
                        <p class="card-title">Email<span class="text-danger">*</span></p>

                        <label for="mail"></label>
                        <input type="text" id="mail" class="form-control" name="mail" class="w-50">
                        <span id="mail_manquant"></span>

                    </div>
                </div>


                <div class="card" style="border-color: white;">
                    <div class="card-body">
                        <p class="card-title">Téléphone<span class="text-danger">*</span></p>

                        <label for="Téléphone"></label>
                        <input type="text" id="Téléphone" class="form-control" name="Téléphone" class="w-50">
                        <span id="Téléphone_manquant"></span>
                    </div>
                </div>

            </div>


            <div class="card-deck">
                <div class="card" style="border-color: white;">
                    <div class="card-body ">
                        <p class="card-title ml-1">Votre adresse <span class="text-danger">*</span></p>

                        <label for="adresse"></label>
                        <textarea name="adresse" id="adresse" class="form-control" cols="0" rows="5"
                            class="w-100"></textarea>
                        <span id="adresse_manquant"></span>

                    </div>
                </div>
            </div>
            <button class="btn btn-dark " type="submit" name="submit_button" id="submit_button">Commander</button>
        </form>
    </div>




<?php
require 'footer.php';

?>
