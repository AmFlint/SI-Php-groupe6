<?php
// connexion base de données
require_once "php/connect.php";
// création requête sql
// Prendre les informations dans tous les champs de la table vetements (on va chercher des éléments différents en fonction de la valeur récupérée par la méthode get)
$sql = "SELECT `id`,`img_chemin`, `titre`, `description`, `taille`, `sexe`, `style`, `visible` FROM `vetements` WHERE 1\n";
// On crée une variable sous forme de tableau associatif avec les tailles acceptées
$taillesOK = [
	"S", "M", "L"
];
// On crée une variable sous forme de tableau associatif avec les valeurs du champ "sexe" acceptées
$sexeOK = [
	"F", "H"
];
// On crée une variable sous forme de tableau associatif avec les valeurs du champ "style" acceptées
$styleOK = [
	"casual", "occasion", "sport", "accessoires"
];
// On vérifie si la taille fournie par la variable $_GET['taille'] fait partie des tailles acceptées
if (!in_array($_GET['taille'], $taillesOK)) {
// Si $_GET['taille'] est différent des tailles autorisées, on prends les éléments de toutes les tailels S, M et L dans la table
	$sql .= "AND `taille` IN ('S', 'M', 'L')\n";
} else {
	// sinon si $_GET['taille'] est validée, on bindera plus tard la variable à :taille pour la requête SQL
	$sql .= "AND `taille` = :taille\n";
}
if (!in_array($_GET['sexe'], $sexeOK)) {
	// Si la variable sexe récupérée ne fait pas partie du tableau de vérification, on prends les éléments dont les valeurs pour le champ "sexe" sont "H" et "F"
	$sql .= "AND `sexe` IN ('H', 'F')\n";
} else {
	// Sinon, on ajoute une variable :sexe à la requête sql (bindValue plus loin) 
	$sql .= "AND `sexe` = :sexe\n";
}
if (!in_array($_GET['style'], $styleOK)) {
	// Si la variable style récupérée ne fait pas partie du tableau de vérification, on prend les éléments "occasion", "sport", "casual" et "accessoires" pour le champ "style"
	$sql .= "AND `style` IN ('occasion', 'sport', 'accessoires', 'casual')\n";
} else {
	// sinon on ajoute une variable :sexe à la requête SQL (bindValue plus loin) 
	$sql .= "AND `style` = :style\n";
}
// On précise à la fin de la requête SQL que les éléments récupérées doivent avoir pour valeur "1" sous le champ "visible"
$sql .= " AND `visible` = 1";
// préparation de la requête SQL
$stmt = $pdo->prepare($sql);
// On reprend la vérification d'au dessus pour faire le bindvalue si la valeur de $_GET['taille'] est validée précédemment (évite de faire planter le traitement si la valeur n'est pas bonne et que :taille ou :sexe ou :style est assigné sans existait dans la requête SQL)
if (in_array($_GET['taille'], $taillesOK)) {
	$stmt->bindValue(":taille", $_GET['taille']);
}
// On reprend la vérification d'au dessus pour faire le bindvalue si la valeur de $_GET['sexe'] est validée précédemment
if (in_array($_GET['sexe'], $sexeOK)){
	$stmt->bindValue(":sexe", $_GET['sexe']);
}
// On reprend la vérification d'au dessus pour faire le bindvalue si la valeur de $_GET['style'] est validée précédemment
if (in_array($_GET['style'], $styleOK)){
	$stmt->bindValue(":style", $_GET['style']);
}
// Exécution de la requête SQL --> récupération des données
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>What'Sape - Toutes les nnonces</title>
		<link rel="stylesheet" href="styles/styles.css">
		<!--Polices-->
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|Raleway" rel="stylesheet">
	</head>
	<body>
		<?php 
 		include_once "include/header.php";
 		?>
		<main>
			<section class="annonces clearfix">
				<h2>Toutes les annonces</h2>
				<h3 class="clearfix">Filtre<img src="img-layout/poly-rose.png" alt="fleche"></h3>
				<form method="get" action="page_annonces.php" class="clearfix form_annonces">
					<div class="clearfix">
						<label for="nom">STYLE</label>
						<select name="style">
							<optgroup label="STYLE">
								<option value=""></option>
								<option value="casual">Casual</option>
								<option value="occasion">Occasions</option>
								<option value="sport">Sport</option>
								<option value="accessoires">Accessoires</option>
							</optgroup>
						</select>
					</div>
					<div class="clearfix">
						<label for="nom">TAILLE</label>
						<select name="taille" id="">
							<optgroup label="TAILLE">
								<option value=""></option>
								<option value="S">S</option>
								<option value="M">M</option>
								<option value="L">L</option>
							</optgroup>
						</select>
					</div>
					<div class="clearfix">
						<label for="prenom">SEXE</label>
						<select name="sexe" id="">
							<optgroup label="SEXE">
								<option value=""></option>
								<option value="H">Homme</option>
								<option value="F">Femme</option>
							</optgroup>
						</select>
					</div>
						<input type="submit" value="Filtrer !" id="filtrer">
				</form>	
			</section>
			<section class="les_annonces">
				<div class="content-annonces">
					<?php
					// Affichage/disposition des données
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
					?>
						<div class="w33">
						    <figure>
						    	<a href="page_annonce_traite.php?id=<?=$row['id']?>">
						        	<img src="img-content/<?=$row["img_chemin"]?>">
						    	</a>
						    </figure>
						    <h3><?= $row["titre"]?></h3>
						    <p><?= $row["description"]?></p>
						    <p class="phpfloat">Taille : <?= $row["taille"]?></p>
						    <p class="phpfloat">Sexe : <?= $row["sexe"]?></p>
						    <p>Style : <?= $row["style"]?></p>
						</div>
					<?php endwhile;?>
				</div>
			</section>
		</main>	
		<?php 
 		include_once "include/footer.php";
 		?>
	</body>	
</html>	