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
				<form method="post" action="" class="clearfix">
					<div class="clearfix">
						<label for="nom">STYLE</label>
						<select name="" id="">
							<optgroup label="STYLE">
								<option value="">Casual</option>
								<option value="">Occasions</option>
								<option value="">Sport</option>
								<option value="">Accessoires</option>
							</optgroup>
						</select>
					</div>
					<div class="clearfix">
						<label for="nom">TAILLE</label>
						<select name="" id="">
							<optgroup label="TAILLE">
								<option value="">S</option>
								<option value="">M</option>
								<option value="">L</option>
							</optgroup>
						</select>
					</div>
					<div class="clearfix">
						<label for="prenom">SEXE</label>
						<select name="" id="">
							<optgroup label="SEXE">
								<option value="">Homme</option>
								<option value="">Femme</option>
							</optgroup>
						</select>
					</div>
				</form>	
			</section>
		</main>	
		<?php 
 		include_once "include/footer.php";
 		?>
	</body>	
</html>	