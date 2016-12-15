<?php
// connexion base de données
require_once "php/connect.php";
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
						<input type="submit" value="Filtrer !">
				</form>	
			</section>
			<section class="en-ce-moment">
				<div class="content-annonces">
					<?php
					// création requête sql
					$sql = "SELECT `id`,`img_chemin`, `titre`, `description`, `taille`, `sexe`, `style`, `visible` FROM `vetements` WHERE 1\n";
					$taillesOK = [
						"S", "M", "L"
					];
					$sexeOK = [
						"F", "H"
					];
					$styleOK = [
						"casual", "occasion", "sport", "accessoires"
					];
					if (!in_array($_GET['taille'], $taillesOK)) {
						$sql .= "AND `taille` IN ('S', 'M', 'L')\n";
					} else {
						$sql .= "AND `taille` = :taille\n";
					}
					if (!in_array($_GET['sexe'], $sexeOK)) {
						$sql .= "AND `sexe` IN ('H', 'F')\n";
					} else {
						$sql .= "AND `sexe` = :sexe\n";
					}
					if (!in_array($_GET['style'], $styleOK)) {
						$sql .= "AND `style` IN ('occasion', 'sport', 'accessoires', 'casual')\n";
					} else {
						$sql .= "AND `style` = :style\n";
					}
					$sql .= " AND `visible` = 1";
					$stmt = $pdo->prepare($sql);
					if (in_array($_GET['taille'], $taillesOK)) {
						$stmt->bindValue(":taille", $_GET['taille']);
					}
					if (in_array($_GET['sexe'], $sexeOK)){
					$stmt->bindValue(":sexe", $_GET['sexe']);
					}
					if (in_array($_GET['style'], $styleOK)){
					$stmt->bindValue(":style", $_GET['style']);
					}
					$stmt->execute();
					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
						<div class="w33">
						    <figure>
						    	<a href="page_annonce_traite.php?id=<?=$row['id']?>">
						        	<img src="img-content/<?=$row["img_chemin"]?>">
						    	</a>
						    </figure>
						    <h3><?= $row["titre"]?></h3>
						    <p><?= $row["description"]?></p>
						    <p class="phpfloat"><?= $row["taille"]?></p>
						    <p class="phpfloat"><?= $row["sexe"]?></p>
						    <p><?= $row["style"]?></p>
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