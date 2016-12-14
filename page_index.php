<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>What'Sape</title>
	<link rel="stylesheet" href="styles/styles.css">
	<!--Polices-->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700|Raleway" rel="stylesheet">
</head>
<body>
<?php 
 include_once "include/header.php";
 ?>
	<main>
		<section class="entete">
			<div class="titre">
				<ul class="clearfix">
					<li><img src="img-content/sweat.png" alt="sweat"></li>
					<li><img src="img-content/robe-soiree.png" alt="robe-soiree"></li>
					<li><img src="img-content/top.png" alt=""></li>
					<li><img src="img-content/short.png" alt="short"></li>
					<li><img src="img-content/pantalon.png" alt="pantalon"></li>
				</ul>		
				<h2>Le site d'échange de vêtements entre particuliers</h2>
			</div>
			<a href="" class="clearfix"><div class="button">TOUTES LES ANNONCES<img src="img-layout/polygon.png" alt="flèche"></div></a>
			<img src="img-layout/poly.png" alt="flèche" class="scroll">
		</section>
		<section class="def">
			<div class="containerDef clearfix">
				<h3>Qu'est-ce que<br/><strong>What'Sape</strong><span>?</span></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi veniam quia magnam esse eius ex laborum possimus vel aliquam ducimus beatae distinctio, accusamus, dolore dignissimos explicabo, provident temporibus amet non. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				<br><a href="">> En savoir plus</a></p>
			</div>
		</section>	
		<section class="categories">	
			<h3>CATéGORIES</h3>
			<ul class="clearfix">
				<li><a href=""><img src="img-content/soleil.png" alt="Casual"><h4>CASUAL</h4></a></li>
				<li><a href=""><img src="img-content/noeud.png" alt="occasions"><h4>OCCASIONS</h4></a></li>
				<li><a href=""><img src="img-content/running.png" alt="Sport"><h4>SPORT</h4></a></li>
				<li><a href=""><img src="img-content/sac.png" alt="Accessoires"><h4>ACCESSOIRES</h4></a></li>
			</ul>
		</section>
		<section class="en-ce-moment">	
			<h3>DISPONIBLES EN CE MOMENT...</h3>
		</section>
		<section class="avis clearfix">	
			<h3>Ils ont essayé What'sape</h3>
			<article>
				<figure class="clearfix">
					<img src="img-content/persona-isabelle.png" alt="photo">
					<figcaption>
					Céline
					</figcaption>
				</figure>
				<blockquote>
					<p>J’ai emprunté à Kaouthar la plus belle des robes pour le mariage de ma soeur, Merci !</p>
				</blockquote>
			</article>
			<article>
				<figure class="clearfix">
					<img src="img-content/persona-souleimane.png" alt="photo">
					<figcaption>
					Souleimane
					</figcaption>
				</figure>
				<blockquote>
					<p>Je n’avais pas du tout de chemise pour ma soutenance. Benchaa m’a sauvé la vie !</p>
				</blockquote>
			</article>
		</section>
	</main>
<?php 
 include_once "include/footer.php";
 ?>
</body>
</html>