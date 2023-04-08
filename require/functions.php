<?php
require_once 'connect.php';
$DS = DIRECTORY_SEPARATOR;
$BR = "</br>";

// Etablis la liste des film en BDD pour afficher les cards de la Homepage. //
function videothequeList (){
$query = "SELECT * FROM film ORDER BY titre_film";
$pdo = new \PDO(DSN, USER, PASS);
$statement = $pdo->query($query);
$videotheque = $statement->fetchAll(PDO::FETCH_ASSOC);
return $videotheque;
}

// Recupère l'ID du film à modifier pour pré-remplir les champs du formulaire d'édition. //
function filmEditor ($filmID){
$query = "SELECT * FROM film WHERE id=".$filmID;
$pdo = new \PDO(DSN, USER, PASS);
$statement = $pdo->query($query);
$movie = $statement->fetchAll(PDO::FETCH_ASSOC);
return $movie[0];
}

// Créer un élément dans la table film //
function create (array $createdFilm, string $affiche = NULL){
    $titre_film = trim($createdFilm['titre_film']);
    $date_sortis = $createdFilm['date_sortis'];
    $genre = trim($createdFilm['genre']);
    $duree = $createdFilm['duree'];
    if(!$affiche){
        $affiche = $createdFilm['affiche'];
    };
    $query = 
    "INSERT INTO film
        (titre_film,date_sortis,genre,duree,affiche)
    VALUES
        (:titre_film,:date_sortis,:genre,:duree,:affiche)";

    $pdo = new \PDO(DSN, USER, PASS);
    $statement = $pdo->prepare($query);
    $statement->bindValue(':titre_film', $titre_film, \PDO::PARAM_STR);
    $statement->bindValue(':date_sortis', $date_sortis, \PDO::PARAM_STR);
    $statement->bindValue(':genre', $genre, \PDO::PARAM_STR);
    $statement->bindValue(':duree', $duree, \PDO::PARAM_STR);
    $statement->bindValue(':affiche', $affiche, \PDO::PARAM_STR);
    $statement->execute();
}

// Met à jour un element de la table film. //
function update (array $updatedFilm, string $affiche = NULL){
    $id = intval($updatedFilm['id']);
    $titre_film = trim($updatedFilm['titre_film']);
    $date_sortis = $updatedFilm['date_sortis'];
    $genre = trim($updatedFilm['genre']);
    $duree = $updatedFilm['duree'];
    if(!$affiche){
        $affiche = $updatedFilm['affiche'];
    }
    $query = "UPDATE film SET titre_film=:titre_film, date_sortis=:date_sortis, genre=:genre, duree=:duree, affiche=:affiche WHERE id=:id";
    $pdo = new \PDO(DSN, USER, PASS);
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $id, \PDO::PARAM_INT);
    $statement->bindValue(':titre_film', $titre_film, \PDO::PARAM_STR);
    $statement->bindValue(':date_sortis', $date_sortis, \PDO::PARAM_STR);
    $statement->bindValue(':genre', $genre, \PDO::PARAM_STR);
    $statement->bindValue(':duree', $duree, \PDO::PARAM_STR);
    $statement->bindValue(':affiche', $affiche, \PDO::PARAM_STR);
    $statement->execute();
    return $statement->rowCount();
}
// Déplace un fichier //

// Supprime un element de la table film. //
function supprime (string $doomedFilm){
    $doomedFilm = intval($doomedFilm);
    $query = "DELETE FROM film WHERE id=$doomedFilm";
    $pdo = new \PDO(DSN, USER, PASS);
    $pdo->exec($query);
}