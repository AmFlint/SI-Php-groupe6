<!DOCTYPE html>
<html>
	<head>
		<title>Panel Admin : Ajouter un article</title>
	</head>
	<body style="text-align: center;">
		<form action="../traitement_donnees/add_article.php" method="post" enctype="multipart/form-data">
			<p>Mon article</p>
			<p class="clearfix">
				<label for="titre">Titre</label><br/>
				<input type="text" name="title" required><br>
			</p>
			<p class="clearfix">
				<label for="style">Style</label><br/>
				<select name="style" id="convienta" required>
					<option value="casual">Casual</option>
					<option value="Occasions">Occasions</option>
					<option value="Sport">Sport</option>
					<option value="Accessoires">Accessoires</option>
				</select>
			</p>
			<p class="clearfix">
				<label for="sexe">Sexe</label><br/>
				<select name="sexe" id="sexe" required>
					<option value="H">homme</option>
					<option value="F">femme</option>
				</select>
			</p>
			<p class="clearfix">
				<label for="taille">Taille</label><br/>
				<select name="taille" id="taille">
					<option value="S">S</option>
					<option value="M">M</option>
					<option value="L">L</option>
				</select>
			</p>
			<p class="clearfix">
				<label for="image">Image</label><br/>
				<input type="file" name="image" id="image" accept="image/*" required></br>
			</p>
			<p class="clearfix">
				<label for="description">Description</label><br/>
				<textarea name="description" id="description" cols="30" rows="5"></textarea><br>
			</p>
			<p>
			 	<label for="visible">Visible ?</label><br/>
			 	<select name="visible" id="visible">
			 		<option value="1">Oui</option>
			 		<option value="0">Non</option>
			 	</select>
			</p>
			<p class="clearfix">
				<input type="submit" id="boutonvalider" value="Envoyer !">
			</p>
		</form>
	</body>
</html>