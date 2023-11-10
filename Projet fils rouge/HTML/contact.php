<?php
require 'DAO.php';
$navtco="active";
$nava="3";
$navca="3";
$navp="3";
$navco="2";
require 'header.php';


echo $bar;
?>
 <div class="container">
        <form action="formulaire.php" method="post" onSubmit="return Verification()">
            <div class="card-deck">
                <div class="card" style="border-color: white;">
                    <div class="card-body ">
                        <p class="card-title ml-1">Nom</p>

                        <label for="nom"></label>
                        <input type="text" class="form-control" id="nom" name="nom">
                        <span id="nom_manquant"></span>
                        <p class="alert-danger ml-1 mt-1">Ce champ est obligatoire</p>
                    </div>
                </div>


                <div class="card" style="border-color: white;">
                    <div class="card-body">
                        <p class="card-title ml-1">Prénom</p>

                        <label for="Prenom"></label>
                        <input type="text" class="form-control" id="Prenom" name="Prenom">

                        <p class="alert-danger ml-1 mt-1">Ce champ est obligatoire</p>
                    </div>
                </div>
            </div>


            <div class="card-deck">
                <div class="card" style="border-color: white;">
                    <div class="card-body ">
                        <p class="card-title ml-1">Email</p>

                        <label for="Email"></label>
                        <input type="text" class="form-control" id="Email" name="Email">


                    </div>
                </div>


                <div class="card" style="border-color: white;">
                    <div class="card-body">
                        <p class="card-title ml-1">Téléphone</p>

                        <label for="Telephone"></label>
                        <input type="text" class="form-control" id="Telephone" name="Telephone">

                        <p class="alert-danger ml-1 mt-1">Ce champ est obligatoire</p>
                    </div>
                </div>

            </div>
            <div class="card-deck">
                <div class="card" style="border-color: white;">
                    <div class="card-body ">
                        <p class="card-title ml-1">Votre demande</p>

                        <label for="demande"></label>
                        <textarea name="demande" class="form-control" id="demande" cols="30" rows="10"
                            class="w-100"></textarea>


                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end card-body">
                <button type="submit" name="submit_button" class="btn btn-dark ">Envoyer</button>
            </div>
        </form>
    </div>
    <script src="script1.js"></script>
<?php
require 'footer.php';

?>
