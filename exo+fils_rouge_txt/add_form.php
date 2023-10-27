<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    try 
    {        
        $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }       
    $requete = $db->query("SELECT *
FROM artist
JOIN disc ON artist.artist_id = disc.artist_id
group by artist.artist_name
ORDER BY artist.artist_name;");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ajouter</title>
    <style>img {
        width:250px;
        height:250px;
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
    <div class="container">
<form action="add_script.php" method="POST">


<label for="titre">Title</label>
<br>
<input type="text" name="titre" id="titre" class="col-12" placeholder="Enter title">
<br>


<label for="artist">Artist</label>
<br>
<select name="artist" class="col-12">
    <?php foreach ($tableau as $artist): ?>
        <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
    <?php endforeach; ?>
</select>
<br>

<label for="years">Year</label>
<br>
<input type="text" name="years" id="years" class="col-12" placeholder="Enter year">
<br>


<label for="genre">Genre</label>
<br>
<input type="text" name="genre" id="genre" class="col-12" placeholder="Enter genre (Rock, Pop, Prog ...)">
<br>


<label for="label">Label</label>
<br>
<input type="text" name="label" id="label" class="col-12" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale ...)">
<label for="prix">Price</label>
<br>
<input type="text" name="prix" id="prix" class="col-12">
<br>
<label for="image">Picture</label>
<br>
  <input id="image" name="image" type="file" accept=".jpg,.png,.jpeg">
  <br>
  <button class="btn btn-primary mt-2" type="submit" name="submit_button">Ajouter</button>
  <button class="btn btn-primary mt-2"><a href="index.php" >Retour</a></button>

</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>















