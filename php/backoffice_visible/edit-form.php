<?php
// connexion à la BDD
require_once "../connect.php";
// création de la variable pour la requête SQL --> récupérer tous les champs
$sql = "SELECT `id`, `img_chemin`, `titre`, `description`, `taille`, `sexe`, `style`,  `visible` FROM `vetements` WHERE id = :id";
// préparation de la requête sql
$stmt = $pdo->prepare($sql);
// assigner la valeur id de la requête SQL à la variable id récupéré depuis le formulaire de backoffice.php
$stmt->bindValue(":id", $_POST["id"] ?? 0);
//
$stmt->execute();
// Si rien n'est récupéré dans la table de la BDD, renvoyer sur backoffice.php
if (false == $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	header("Location: backoffice.php");
}
?>
<!-- Formulaire -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Panel : Edit</title>
		<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	</head>
	<body class="clearfix">
		<div class="w50">
			<form action="../traitement_donnees/edit.php" method="post" enctype="multipart/form-data"> <!-- envoie les données à traiter à edit.php par la méthode post -->
				<input type="hidden" name="id" value="<?= $row['id']?>">
				<p>
					<label for="titre">Titre</label><br/>
					<input type="text" name="titre" id="titre" placeholder="titre" value="<?=$row['titre']?>">
				</p>
				<p>
	 				<label for="description">Description</label><br/>
	 				<textarea name="description" id="description" cols="30" rows="10" placeholder="Description"><?=$row['description']?></textarea>
				</p>
	 			<p>
	 				<label for="taille">Taille</label><br/>
					<select name="taille" id="taille">
						<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
					</select>
	 			</p>
	 			<p>
	 				<label for="sexe">Sexe</label><br/>
	 				<input type="radio" name="sexe" value="H">
	 				<label for="H">Homme</label>
	 				<input type="radio" name="sexe" value="F">
	 				<label for="H">Femme</label>
	 			</p>
	 			<p>
	 				<label for="style">Style</label><br/>
	 				<input type="radio" name="style" value="sport">
	 				<label for="sport">Sport</label>
	 				<input type="radio" name="style" value="casual">
	 				<label for="sport">Casual</label>
	 				<input type="radio" name="style" value="accessoires">
	 				<label for="sport">Accessoires</label>
	 				<input type="radio" name="style" value="occasion">
	 				<label for="sport">Occasion</label>
	 			</p>
	 			<p>
	 				<label for="visible">Visible ?</label>
	 				<select name="visible" id="visible">
	 					<option value="1">Oui</option>
	 					<option value="0">Non</option>
	 				</select>
	 			</p>
	 			<input type="hidden" name="img" value="<?=$row["img_chemin"]?>">
				<input type="file" name="image"><br/>
				<input type="hidden" name="MAX_FILE_SIZE" value="100000">
				<input type="submit" value="Modifier" class="modif_back">
			</form>
		</div>
		<div class="w50 recapitulatif">
			<h2>Résumé des données</h2>
		    <figure>
		        <img src="../../img-content/<?=$row["img_chemin"]?>">
		    </figure>
		    <h3>Titre : <?= $row["titre"]?></h3>
		    <p>Description : <?= $row["description"]?></p>
		    <p class="phpfloat">Taille : <?= $row["taille"]?></p>
		    <p class="phpfloat"> Sexe : <?= $row["sexe"]?></p>
		    <p>Style : <?= $row["style"]?></p>
		    <p>Visible = <?if($row['visible'] == 1) {
		    	echo "Oui";
		    } else {
		    	echo "Non";
		    }
		    ?></p>
		</div>
	</body>
</html>
