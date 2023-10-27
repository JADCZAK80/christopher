<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Test PDO</title>
    <style>img {
        width:100%;
        
    }
    a {
        color:white;
    }
    a:active {
  color: white;
}
a:hover {
  color: white;
}
    </style>
</head>

<body>
    <?php
if (isset($_GET['disc_id'])) {
    $disc_id = $_GET['disc_id'];

    // Utilisez une requête préparée pour récupérer les détails de l'album en fonction de disc_id
    $query = "SELECT *
              FROM artist
              JOIN disc ON artist.artist_id = disc.artist_id
              WHERE disc.disc_id = :disc_id
              ORDER BY artist.artist_name;";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':disc_id', $disc_id, PDO::PARAM_INT);
    $stmt->execute();

    // Récupérez les détails de l'album
    $tableau = $stmt->fetch(PDO::FETCH_OBJ);
    $stmt->closeCursor();

    if ($tableau) {
        $disc_id = $tableau->disc_id;
        $disc_title = $tableau->disc_title;
        $artist_name = $tableau->artist_name;
        $disc_year = $tableau->disc_year;
        $disc_genre = $tableau->disc_genre;
        $disc_label = $tableau->disc_label;
        $disc_price = $tableau->disc_price;
        $disc_picture = $tableau->disc_picture;
        
        echo '<form id="detailsForm" action="update_form.php" method="POST">
        <input type="hidden" name="disc_id" value="'. $disc_id .'">
        <div class="container">
        <div class="row">
            
                <div class="col-md-6">
                    <label for="titre">Title</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="' . $disc_title . '" readonly>
                </div>
                <div class="col-md-6">
                    <label for="artist">Artist</label>
                    <input type="text" name="artist" id="artist" class="form-control" value="' . $artist_name . '" readonly>
                </div>
                <div class="col-md-6">
                    <label for="year">Year</label>
                    <input type="text" name="year" id="year" class="form-control" value="' . $disc_year . '" readonly>
                </div>
                <div class="col-md-6">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" class="form-control" value="' . $disc_genre . '" readonly>
                </div>
                <div class="col-md-6">
                    <label for="label">Label</label>
                    <input type="text" name "label" id="label" class="form-control" value="' . $disc_label . '" readonly>
                </div>
                <div class="col-md-6">
                    <label for="prix">Price</label>
                    <input type="text" name="prix" id="prix" class="form-control" value="' . $disc_price . '" readonly>
                </div>
                <div class="col-6">
                <label for="picture">Picture</label>
                <br>
                <img src="pictures/' . $disc_picture . '" class="img-fluid" alt="Album Picture">
            </div> 
            </form>
       </div>
    </div>
    ';

    } else {
        echo "Aucun album trouvé pour disc_id : $disc_id.";
    }
} else {
    echo "Identifiant d'album non spécifié.";
}
?>


  <div class="container">
  <button class="btn btn-primary mt-2" onclick="submitDetailsForm()">Modifier</button>

  
  <form action="delete_form.php" method="POST">
    <input type="hidden" name="disc_id" value="<?= $disc_id ?>">
    <button class="btn btn-primary mt-2" type="submit" name="delete_button">Supprimer</button>
</form>
  <button class="btn btn-primary mt-2"><a href="index.php" >Retour</a></button>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <script>
function submitDetailsForm() {
    document.getElementById("detailsForm").submit();
}
</script>
</body>
</html>