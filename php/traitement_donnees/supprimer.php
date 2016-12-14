<?php
// Connection à la base de données
require_once "../connect.php"; 
//création de la variable pour la requête SQL
// Suppression d'un seul élément dans la table vetements en récupérant l'id de l'élément dans backoffice.php (méthode post)
$sql = "DELETE FROM `vetements` WHERE id = :id LIMIT 1";
// préparation de la requête sql
$stmt = $pdo->prepare($sql);
// on lie la valeur id (requete sql) à l'id récupéré dans backoffice.php (méthode post)
$stmt->bindValue(":id", $_POST['id']);
//exécution --> Suppression du row dans BDD
$stmt->execute();
//retour au backoffice
header("Location: ../backoffice_visible/backoffice.php");