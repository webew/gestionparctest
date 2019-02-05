<a href="index.php">Retour Menu</a>
<h2>Moniteurs</h2>
<?php
//connexion à la bdd
$bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

//requête à exécuter
$sql = "SELECT * FROM moniteur";

//exécution de la requête (appel de la méthode query sur l'objet $bdd)
$stmt = $bdd->query($sql);

$liste_moniteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

//affichage des données
var_dump($liste_moniteurs);


//destruction de l'objet de connexion (libération de la mémoire)
$bdd = null;

?>