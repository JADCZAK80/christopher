<?php
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
    <title>Test PDO</title>
    <style>img {
        width:200px;
        height:200px;
    }
a{
    color:white;
}

    </style>
</head>

<body>
    
    <div class="container" >
        <h2><b>Liste de disque (<?=count($tableau)?>)</b>
        <div class="d-flex justify-content-end"><button class="btn btn-primary "><a href="add_form.php">ajouter</a></button></div></h2>
        
        <div class=" row">
<?php foreach ($tableau as $artist): ?>
        
            <div class="col-6">
                <div class=" media">
                    <div class="media-body">
            <div class="d-flex align-items-start">
            <?='<img src="./pictures/'.$artist->disc_picture.'" alt="" >'.
            "<p class='pl-4 pt-2' ><b>". $artist->disc_title ."<br>". 
            $artist->artist_name."</b><br><b>Label</b> : " .$artist->disc_label."<br><b>Year : </b>".
            $artist->disc_year."<br>"."<b>Genre : </b>".
            $artist->disc_genre ?> 
            <br>
</div>
            </div>
                
            <button class="btn btn-primary d-flex align-self-end"><a href="details.php?disc_id=<?= $artist->disc_id ?>">Details</a></button>
        </div>
</p>
        </div>
    <?php endforeach; ?>
</div>
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