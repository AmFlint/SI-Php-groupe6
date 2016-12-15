<?php 
require_once  "../connect.php"; // établir connexion avec la BDD

// création de la variable pour la requête SQL
$sql = "SELECT `id`, `img_chemin`, `titre`, `description`, `taille`, `sexe`, `style`, `visible` FROM `vetements`";
// préparation de la requête SQL
$stmt = $pdo->prepare($sql);
// Exécution de la requête SQL
$stmt->execute();
// Insérer des liens get pour le tri :
?>
<form action="formulaire_add_backoffice.php" method="post" style="text-align: center; margin-bottom: 40px;">
	<input type="submit" value="Ajouter un article" style="background-color: pink; padding: 10px 20px; font-size: 20px;">
</form>
<table>
	<thead>
		<th>ID</th>
		<th>Image</th>
		<th>Titre</th>
		<th>Description</th>
		<th>Taille</th>
		<th>Sexe</th>
		<th>Style</th>
		<th>Visible</th>
		<th>Action</th>
	</thead>
	<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
		<?php 
		$id = $row['id'];
		?>
		<tr>
			<td style="background-color: lightgray;"><?=$row['id']?></td>
			<td>
				<img src="../../img-content/<?=$row['img_chemin']?>" alt="" width="50">
			</td>
			<td style="background-color: lightgray; text-align: center;">
				<?=$row['titre']?>
			</td>
			<td style="text-align: center;">
				<?=$row['description']?>
			</td>
			<td style="background-color:  lightgray; text-align: center;">
				<?=$row['taille']?>	
			</td>
			<td style="text-align: center;">
				<?=$row['sexe']?>	
			</td>
			<td style="background-color: lightgray;">
				<?=$row['style']?>	
			</td>
			<td style="text-align: center;">
				<?=$row['visible']?>
			</td>
			<td style="background-color: lightgray;">
				<form action="../traitement_donnees/supprimer.php" method="post" style="display: inline-block;">
					<input type="hidden" name="id" value="<?=$row['id']?>">
					<input type="submit" value="delete">
				</form>
				<form action="edit-form.php" method="post" style="display: inline-block;">
					<input type="hidden" name="id" value="<?=$row['id']?>">
					<input type="submit" value="edit">
				</form>
				<form action="../traitement_donnees/visible.php" method="post" style="display: inline-block;">
					<input type="hidden" name="id" value="<?=$row['id']?>">
					<input type="hidden" name="visible" value="<?=$row['visible']?>">
					<input type="submit" value="<?php 
					if ($row['visible'] == 1) { ?>
						Ne plus afficher
					<?php } 
					else { ?>
						Afficher
					<?php }?>">
				</form>
			</td>
		</tr>
	<?php endwhile;?>
</table>





