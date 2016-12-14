<?php 
//connection à la base de donnée
require_once "../connect.php";
//
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
    // On déplace l'image uploadée du dossier temporaire vers le dossier img-content à la racine du site
    move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier);
} else {
    echo $erreur;
}


// Création de la variable pour la requête SQL, insérer dans la table vetements de la bdd les informations récupérés à partir des champs du formulaire de page_formulaire.php
$sql = "INSERT INTO `vetements` (`img_chemin`, `titre`, `description`, `taille`, `sexe`, `style`, `visible`) VALUES (:img_chemin, :titre, :description, :taille, :sexe, :style, :visible)";
//
$stmt = $pdo->prepare($sql);
//
$stmt->bindValue(":img_chemin", $fichier);
// Créer la condition pour effectuer le bindValue correct par rapport à la valeur renvoyée (title si l'ajout se fait en back office et titre si l'ajout se fait en front office
if (isset($_POST['titre'])) {
    // redirection vers la page page_merci.php
    $stmt->bindValue(":titre", $_POST['titre']);
} else {
    // redirection vers la page backoffice.php
    $stmt->bindValue(":titre", $_POST['title']);
}
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
// exécuter la requête SQL UPDATE (édition de l'élément)
$stmt->execute();
$insertId =$pdo->lastInsertId();
// Condition afin de faire une redirection correct après le traitement du formulaire et l'ajout
if (isset($_POST['titre'])) {
    // redirection vers la page page_merci.php
    header("Location: ../../page_merci.php");
} else {
    // redirection vers la page backoffice.php
    header("Location: ../backoffice_visible/backoffice.php");
}
