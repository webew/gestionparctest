<a href="index.php">Retour Menu</a>
<h2>Locaux</h2>
<?php

$bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

$sql = "SELECT * FROM local";

$stmt = $bdd->query($sql);

$liste_locaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

//affichage des données
var_dump($liste_locaux);


$bdd = null;

?>