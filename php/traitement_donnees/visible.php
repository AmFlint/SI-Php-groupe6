<?php
// Connexion à la BDD
require_once "../connect.php";
// Ecriture de la requête SQL pour modifier l'état visible de l'élément sélectionné sur backoffice.php
$sql = "UPDATE `vetements` SET `visible` = :visible WHERE id = :id";
// Préparation de la requête SQL
$stmt = $pdo->prepare($sql);
// Si la valeur "visible" de l'élément est 1 alors passer à 0 sinon passer à 1
if ($_POST['visible'] == 1) {
	$visible = 0; // Variable qui va servir à update la table 
} else {
	$visible = 1; 
}
// Relier la nouvelle valeur de "visible" au "visible" de la BDD pour l'élément sélectionné dans backoffice.php
$stmt->bindValue(":visible", $visible);
// relier la valeur visible à l'élément de la valeur à son id
$stmt->bindValue(":id", $_POST["id"]);
// Exécuter la requête SQL
$stmt->execute();
// Redirection vers la page backoffice.php
header("Location: ../backoffice_visible/backoffice.php");