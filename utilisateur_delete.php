<?php
//connexion à la bdd
$bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

//requête à exécuter
$sql = "DELETE FROM utilisateur WHERE id_utilisateur=?";

//exécution de la requête (appel de la méthode query sur l'objet $bdd)
$stmt = $bdd->prepare($sql);
$stmt->execute([$_GET["id"]]);

$bdd = NULL;

header("Location:liste_utilisateurs.php");
?>