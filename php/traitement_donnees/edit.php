<?php
// connexion à la base de données
require_once "../connect.php";


if($_FILES['image']['tmp_name'] != "") {	
	// Vérification de la taille maximum du fichier uploadé
	// Définition du dossier de destination
	$dossier = '../../img-content/';
	// Définition du nom du fichier uploadé dans la variable fichier
	$fichier = basename($_FILES['image']['name']);
	// Création de la variable pour la taille max en octets
	$taille_maxi = 100000;
	// Evaluation de la taille du fichier uploadé
	$taille_fichier = filesize($_FILES['avatar']['tmp_name']);
	// On définie les extensions autorisée par le système (images)
	$extensions_ok = array('.png', '.jpg', '.jpeg');
	// On va chercher l'extension du fichier uploadé dans edit-form.php
	$extension_fichier = strrchr($_FILES['image']['name'], '.');
	if($taille_fichier > $taille_maxi) 
	{
		// Variable erreur avec le message à afficher en cas d'erreur
		$erreur = "Le fichier est trop lourd";
	}
	// On vérie maintenant l'extension du fichier
	if(!in_array($extension_fichier, $extensions_ok))
	{
		// Créer une variable erreur qu'on va afficher plus loin si probleme
		$erreur = 'Extension non respectée';
	}
	// Vérification des erreurs, si il n'y a pas d'erreur, on continue 
	if (!isset($erreur)) 
	{
		// Vérifier et formater le nom du fichier
		$fichier = strtr($fichier, 
	          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
	          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
	     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		// On bouge l'image uploadée du dossier temporaire jusqu'au dossier img-content ou sont lues toutes les images uploadées du sites.
	    move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier);
	}
	else
	{
		echo $erreur;
	}
}
else
{
	$fichier = $_POST['img'];
}

// préparation de la requête SQL UPDATE pour l'id de l'élément édité précédemment dans le formulaire edit-form.php
$sql = "UPDATE `vetements` SET 
							`img_chemin` = :img_chemin,
							`titre` = :titre,
							`description` = :description,
							`taille` = :taille,
							`sexe` = :sexe,
							`style` = :style,
							`visible` = :visible
						WHERE id = :id";
// Préparation de la requête SQL
$stmt = $pdo->prepare($sql);
// Relier les valeurs récupérées du formulaire edit-form.php à travers la méthode post à la BDD
// récupérer la nouvelle image si une image a été uploadé
$stmt->bindValue(":img_chemin", $fichier);
// récupérer le nouveau titre
$stmt->bindValue(":titre", $_POST['titre']);
// récupérer la nouvelle description
$stmt->bindValue(":description", $_POST['description']);
// récupérer la nouvelle taille
$stmt->bindValue(":taille", $_POST['taille']);
// récupérer le sexe du vêtements édité
$stmt->bindValue(":sexe", $_POST['sexe']);
// récupérer le nouveau style
$stmt->bindValue(":style", $_POST['style']);
// récupérer la nouvelle valeur de la variable "visible"
$stmt->bindValue(":visible", $_POST['visible']);
// changer l'id
$stmt->bindValue(":id", $_POST['id']);
// exécuter la requête SQL UPDATE (édition de l'élément)
$stmt->execute();
// redirection vers la page backoffice.php
header("Location: ../backoffice_visible/backoffice.php");