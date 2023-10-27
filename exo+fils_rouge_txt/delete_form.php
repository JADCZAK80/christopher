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
        
        echo '<p>voulais vous supprimez ce disque</p>
        <form action="delete_script.php" method="POST">
        <input type="hidden" name="disc_id" value="'.$disc_id.'">
        <button class="btn btn-danger" type="submit" name="delete_button">Supprimer</button>
    </form>
    
  
   
    ';

    } else {
        echo "Aucun album trouvé pour disc_id : $disc_id.";
    }
} else {
    echo "Identifiant d'album non spécifié.";
}
?>

<button class="btn btn-primary mt-2"><a href="index.php" >Retour</a></button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
