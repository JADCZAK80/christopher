<?php
try 
{        
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=the_district', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}

function get_categorie($db) {
    $requete = $db->query("SELECT *
        FROM categorie
        where active ='Yes' and id!=11
        ORDER BY libelle ASC
        limit 6;");
    
    if ($requete) {
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableau;
    } else {
        // En cas d'erreur, affichez un message d'erreur pour le débogage
        echo "Erreur lors de la requête SQL : " . print_r($db->errorInfo(), true);
        return array(); // Retourne un tableau vide en cas d'erreur
    }
}


function get_plata($db) {
    $requetea = $db->query("SELECT *
        FROM plat
        INNER JOIN commande on commande.id_plat = plat.id
        where active='yes' and etat != 'Annulée'
        GROUP BY commande.id_plat
        ORDER BY commande.quantite DESC
        limit 5;");
    
    if ($requetea) {
        $tableaua = $requetea->fetchAll(PDO::FETCH_OBJ);
        $requetea->closeCursor();
        return $tableaua;
    } else {
        // En cas d'erreur, affichez un message d'erreur pour le débogage
        echo "Erreur lors de la requête SQL : " . print_r($db->errorInfo(), true);
        return array(); // Retourne un tableau vide en cas d'erreur
    }
}

function get_plat($db) {
    $requetep = $db->query("SELECT DISTINCT * FROM commande
    join plat on plat.id=commande.id_plat
    GROUP BY plat.id
    ORDER BY commande.quantite DESC
    LIMIT 6;");
    
    if ($requetep) {
        $tableaup = $requetep->fetchAll(PDO::FETCH_OBJ);
        $requetep->closeCursor();
        return $tableaup;
    } else {
        // En cas d'erreur, affichez un message d'erreur pour le débogage
        echo "Erreur lors de la requête SQL : " . print_r($db->errorInfo(), true);
        return array(); // Retourne un tableau vide en cas d'erreur
    }
}


function get_detailplat($db) {
    if (isset($_GET['id_categorie'])) {
        $id_categorie = $_GET['id_categorie']; // Correction ici
    
        // Utilisez une requête préparée pour récupérer les détails du plat en fonction de id
        $query = "SELECT *
                  FROM plat
                  WHERE id_categorie = :id_categorie
                  ORDER BY id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
        $stmt->execute();
    
        // Récupérez des plats
        $tableau = $stmt->fetchAll(PDO::FETCH_OBJ); // Utilisez fetchAll pour obtenir plusieurs résultats
        $stmt->closeCursor();
    
        if ($tableau) {
            echo '<div class="container-fluid mt-2 mb-2">
                    <h3 class="d-flex justify-content-center">Plats</h3>
                    <div class="container">
                        <div class="row">';
            foreach ($tableau as $categories) {
                echo '<div class="card d-flex col-md-5 m-3">
                        <div class="card-body">
                            <h4 class="card-title">'. $categories->libelle .' </h4>
                            <div class="media">
                                <div class="media-body ">
                                    <div class="d-flex align-items-start">
                                        <img src="../ASSETS/images_the_district/image_retoucher/plat/'.$categories->image .'" alt="cheesburger" class="plat">
                                        <div class="ml-2">'.$categories->description.'
                                            <b><br><br>'.$categories->prix.'€</b>
                                            <a href="commande.php?id='.$categories->id.'" ><button class="btn btn-outline-danger float-right">commander</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            echo '</div></div></div>';
        } else {
            echo "Aucun plat trouvé pour id_categorie : $id_categorie.";
        }
    } else {
        echo "Identifiant plat non spécifié.";
    }
}
function get_commande($db) {
    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
    
        // Utilisez une requête préparée pour récupérer les détails du plat en fonction de id
        $query = "SELECT *
                  FROM plat
                  WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        // Récupérez des plats
        $tableau = $stmt->fetchall(PDO::FETCH_OBJ);
        $stmt->closeCursor();
    
        if ($tableau) {
            foreach ($tableau as $categories){
            echo '<div class="container-fluid mt-2 mb-2">
            <input type="hidden" name="id_plat" id="id_plat" value="'.$categories->id.'">
            <input type="hidden" name="prix" id="prix" value="'.$categories->prix.'">
            <input type="hidden" name="libelle" id="libelle" value="'.$categories->libelle.'">
                    <div class="container">
                        <div class="row">
                        <div class="card d-flex col-12">
                        <div class="card-body">
                            <h4 class="card-title">'. $categories->libelle .' </h4>
                            <div class="media">
                                <div class="media-body ">
                                    <div class="d-flex align-items-start">
                                        <img src="../ASSETS/images_the_district/image_retoucher/plat/'.$categories->image .'" alt="'.$categories->image .'" class="plat">
                                        <div class="ml-2">'.$categories->description.'
                                            <b><br><br>'.$categories->prix.'€</b>
                                            <br>
                                            <input type="text" id="nombre" name="nombre" value="1">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div></div></div>';}
        } else {
            echo "Aucun plat trouvé pour id : $id.";
        }
    } else {
        echo "Identifiant plat non spécifié.";
    }
}
