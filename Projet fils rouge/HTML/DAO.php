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
        where active ='Yes'
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