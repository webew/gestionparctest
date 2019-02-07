<?php
//connexion à la bdd
$bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

//requête à exécuter
$sql = "UPDATE utilisateur SET nom_utilisateur=?, prenom_utilisateur=?, id_local=? WHERE id_utilisateur='".$_POST["id_utilisateur"]."'";

//exécution de la requête (appel de la méthode query sur l'objet $bdd)
$stmt = $bdd->prepare($sql);
$stmt->execute([$_POST["nom_utilisateur"],$_POST["prenom_utilisateur"],$_POST["local"]]);

$bdd = NULL;

header("Location:liste_utilisateurs.php");
?>