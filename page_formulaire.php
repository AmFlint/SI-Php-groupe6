<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>What'Sape</title>
	<link rel="stylesheet" href="styles/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|Raleway" rel="stylesheet">
</head>
<body>
	<?php 
	include_once "include/header.php";
	?>
	<h1 class="formtitre">Je prête !</h1>
<div class="merci">
	<div class="photogauche">
		<img src="img-content/top.png" alt="Top">
		<img src="img-content/robe-soiree.png" alt="Robe de soirée">
	</div>

	<div class="formulaire">
		<form action="php/traitement_donnees/add_article.php" method="post" enctype="multipart/form-data">
			<p>Mon article</p>
			<p class="clearfix"><label for="titre">TITRE <span style="color:red">*</span></label>
			<input type="text" name="titre" required><br></p>
			<p class="clearfix">
		 	<label for="convienta">CONVIENT A...</label>
				<select name="style" id="convienta" required>
					<option value="casual">Casual</option>
					<option value="Occasions">Occasions</option>
					<option value="Sport">Sport</option>
					<option value="Accessoires">Accessoires</option>
				</select>
		 	</p>
			<p class="clearfix">
		 	<label for="sexe">POUR...</label>
				<select name="sexe" id="sexe" required>
					<option value="H">homme</option>
					<option value="F">femme</option>
				</select>
		 	</p>
			<p class="clearfix">
		 	<label for="taille">Taille</label>
				<select name="taille" id="taille">
					<option value="S">S</option>
					<option value="M">M</option>
					<option value="L">L</option>
				</select>
		 	</p>
		 	<p class="clearfix">
		 		<label for="image">IMAGE</label><input type="file" name="image" id="image" accept="image/*" required></br>
		 	</p>
		 	<p class="clearfix">
		 		<label for="description">DESCRIPTION</label> <textarea name="description" id="description" cols="30" rows="5"></textarea><br>
		 	</p>
		 	<p class="clearfix">
		 		<label for="condition">J'accepte les conditions d'utilisation <span style="color:red">*</span></label>
		 		<input type="checkbox" name="condition" id="condition" required>
		 	</p>
		 	<p class="clearfix">
				<input type="submit" id="boutonvalider" value="Envoyer !">
				<input type="hidden" name="visible" value="0">
		 	</p>
		</form>
	</div>

	<div class="photodroite">
		<img src="img-content/sweat.png" alt="sweat">
		<img src="img-content/short.png" alt="short">
	</div>
</div>
	<?php 
	include_once "include/footer.php";
	?>
</body>
</html>





