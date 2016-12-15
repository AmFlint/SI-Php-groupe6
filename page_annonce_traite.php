<?php 
// Etablir la connexion à la base de donnée
require_once "php/connect.php";
// écriture de la déclaration SQL 
// Prendre les valeurs de tous les champs dans la table vetements à l'emplacement de l'id récupéré sur page_annonces.php ou page_index.php
$sql = "SELECT `id`, `img_chemin`, `titre`, `description`, `taille`, `sexe`, `style`,  `visible` FROM `vetements` WHERE id = :id";
// préparation de la requête SQL
$stmt = $pdo->prepare($sql);
// on assigne la valeur du champ id de la table à la variable qu'on récupère dans l'URL
$stmt->bindValue(":id", $_GET['id']);
// On exécute la requête SQL
$stmt->execute();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Annonce</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|Raleway" rel="stylesheet">
	</head>
	<body>
		<?php 
		include_once "include/header.php";
		?>
		<h2 class="h2">Toutes les annonces</h2>
		<?php
		// Stocker les informations de la table pour l'élément dans un tableau associatif $row
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
			// Si on bidouille la valeur de visible, on nous retourne vers la page annonces (évite aux visiteurs d'accéder à des articles non visibles)
			if ($row['visible'] != 1) {
				header('Location: page_annonces.php');
			// Si l'élément cliqué est bien "visible = 1" dans la BDD, afficher les informations de l'éléments
			} else { ?>
				<div class="wfull clearfix">
					<figure>
						<img src="img-content/<?=$row['img_chemin']?>" alt="">
					</figure>
					<div class="text">
						<h3><?= $row["titre"]?></h3>
					    <p><?= $row["description"]?></p>
					    <p class="phpfloat">Taille : <?= $row["taille"]?></p>
					    <p class="phpfloat">Sexe : <?= $row["sexe"]?></p>
					    <p>Style : <?= $row["style"]?></p>	
					    <a href="#" id="boutonvalider">Je veux !</a>
					</div>
				</div>
			<?php }
		endwhile;
		include_once "include/footer.php";
		?>
	</body>
</html>
