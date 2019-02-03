<a href="index.php">Retour Menu</a>
<br>
<?php

require_once "vendor/fzaninotto/faker/src/autoload.php";

$conn = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

//initialisation de Faker
$faker = Faker\Factory::create();//instance permettant de créer des données
$faker->seed(1234);//identifiant permettant de générer toujours les mêmes données

//génération des utilisateurs
include 'generate_utilisateurs.php';
include 'generate_locaux.php';
include 'generate_pcs.php';
include 'generate_imprimantes.php';
include 'generate_moniteurs.php';


//destruction de l'instance de connexion
$conn = null;

//redirection vers accueil
//header('location:index.php');

?>