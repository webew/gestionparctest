<?php
//connexion à la bdd
$bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

//requête à exécuter
$sql = "UPDATE local SET nom_local=? WHERE id_local='".$_POST["id_local"]."'";

//exécution de la requête (appel de la méthode query sur l'objet $bdd)
$stmt = $bdd->prepare($sql);
$stmt->execute([$_POST["nom_local"]]);

$bdd = NULL;

header("Location:liste_locaux.php");
?>