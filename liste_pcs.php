<a href="index.php">Retour Menu</a>
<h2>PCS</h2>
<?php
//connexion à la bdd
$bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

//requête à exécuter
$sql = "SELECT * FROM pc";

//exécution de la requête (appel de la méthode query sur l'objet $bdd)
$stmt = $bdd->query($sql);
$liste_pcs = $stmt->fetchAll(PDO::FETCH_ASSOC);

//affichage des données
var_dump($liste_pcs);

//destruction de l'objet de connexion (libération de la mémoire)
$bdd = null;

?>