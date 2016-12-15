<?php 
// Etablir la connexion à la base de donnée
require_once "php/connect.php";
// écriture de la déclaration sql
$sql = "SELECT `id`, `img_chemin`, `titre`, `description`, `taille`, `sexe`, `style`,  `visible` FROM `vetements` WHERE id = :id";
//
$stmt = $pdo->prepare($sql);
//
$stmt->bindValue(":id", $_GET['id']);
//
$stmt->execute();
//

//
while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
	if ($row['visible'] != 1) {
		header('Location: page_annonces.php');
	} else { ?>
		<div class="wfull">
			<figure>
				<img src="img-content/<?=$row['img_chemin']?>" alt="">
			</figure>
			<h3><?= $row["titre"]?></h3>
		    <p><?= $row["description"]?></p>
		    <p class="phpfloat"><?= $row["taille"]?></p>
		    <p class="phpfloat"><?= $row["sexe"]?></p>
		    <p><?= $row["style"]?></p>	
		</div>
	<?php }
endwhile;?>