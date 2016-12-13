<?php
// connexion base de données
require_once "connect.php";
// création requête sql
$sql = "SELECT `id`,`img_chemin`, `titre`, `description`, `taille`, `sexe`, `style` FROM `vetements`";
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
<div class="w33">
    <figure>
        <img src="../img-content/<?=$row["img_chemin"]?>"
    </figure>
    <h3><?= $row["titre"]?></h3>
    <p><?= $row["description"]?></p>
    <p class="phpfloat"><?= $row["taille"]?></p>
    <p class="phpfloat"><?= $row["sexe"]?></p>
    <p><?= $row["style"]?></p>
</div>
<?php endwhile;?>
