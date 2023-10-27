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
        width:50vw;
        
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
if (isset($_POST['disc_id'])) {
    $disc_id = $_POST['disc_id'];

    // Utilisez une requête préparée pour récupérer les détails de l'album en fonction de disc_id
    $query = "SELECT *
              FROM artist
              JOIN disc ON artist.artist_id = disc.artist_id
              WHERE disc.disc_id = :disc_id
              ORDER BY artist.artist_name;";
              $artist_query = "SELECT artist_id, artist_name FROM artist ORDER BY artist_name";
$artist_stmt = $db->query($artist_query);
    $stmt = $db->prepare($query);
    $stmt->bindParam(':disc_id', $disc_id, PDO::PARAM_INT);
    $stmt->execute();

    // Récupérez les détails de l'album
    $tableau = $stmt->fetch(PDO::FETCH_OBJ);
    $artists = $artist_stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();

    if ($tableau) {
        $disc_title = $tableau->disc_title;
        $disc_id = $tableau->disc_id;
        $disc_year = $tableau->disc_year;
        $disc_genre = $tableau->disc_genre;
        $disc_label = $tableau->disc_label;
        $disc_price = $tableau->disc_price;
        $disc_picture = $tableau->disc_picture;
        
        echo '<form action="update_script.php" method="POST">
        <input type="hidden" name="disc_id" value="'. $disc_id .'">
        <div class="container">
        <div class="row">
            
                <div class="col-md-12">
                    <label for="titre">Title</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="' . $disc_title . '" >
                </div>
                <div class="col-md-12">
                    <label for="artist">Artist</label>
                    <select name="artist" class="col-12">';
                    foreach ($artists as $artist) {
                        echo '<option value="' . $artist->artist_id . '">' . $artist->artist_name . '</option>';
                    }
                    echo'</select>
                </div>
                <div class="col-md-12">
                    <label for="years">Year</label>
                    <input type="text" name="years" id="years" class="form-control" value="' . $disc_year . '" >
                </div>
                <div class="col-md-12">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" class="form-control" value="' . $disc_genre . '" >
                </div>
                <div class="col-md-12">
                    <label for="label">Label</label>
                    <input type="text" name "label" id="label" class="form-control" value="' . $disc_label . '" >
                </div>
                <div class="col-md-12">
                    <label for="prix">Price</label>
                    <input type="text" name="prix" id="prix" class="form-control" value="' . $disc_price . '" >
                </div>
                <div class="col-md-12">
                <label for="picture">Picture</label>
                <br>
                <img src="pictures/' . $disc_picture . '" class="img-fluid" alt="Album Picture">
                <br>
                <input id="image" name="image" type="file" accept=".jpg,.png,.jpeg">
                </div>     
                <div class="container">
                <button class="btn btn-primary mt-2" type="submit" name="submit_button">Modifier</button>
    <button class="btn btn-primary mt-2"><a href="index.php" >Retour</a></button> 
          </div>  </form>
        <br>
    

     
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
