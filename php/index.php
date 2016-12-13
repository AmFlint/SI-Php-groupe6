<?php
// on demande le fichier connect qui est lié à la base de données
require_once "connect.php";
// on selectionne 6 images
$sql = "SELECT `img_chemin` FROM `vetements` ORDER BY ID DESC LIMIT 0,6";
// $stmt recupere les données demandées dans la requête sql dans la table de la base de données
$stmt = $pdo->query($sql);
// on execute le while pour toutes les $row récupérées
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
<div class="w33">
    <img src="../img-content/<?= $row["img_chemin"]?>" alt="">
</div>
<?php endwhile;?>