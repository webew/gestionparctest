<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'menu.php' ?>
    
    <h2>Utilisateurs</h2>
    <?php
    //connexion à la bdd
    $bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

    //requête à exécuter
    $sql = "SELECT * FROM utilisateur";

    //exécution de la requête (appel de la méthode query sur l'objet $bdd)
    $stmt = $bdd->query($sql);

    //liste des utilisateurs
    $liste_utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    
    <table class="table">
        <tr><th>Utilisateur</th><th></th><th></th></tr>
    <?php
        //affichage des données
        foreach($liste_utilisateurs as $utilisateur){
    ?>
        <tr>
            <td>
                <a href="utilisateur.php?id=<?= $utilisateur["id_utilisateur"] ?>">
                    <?= $utilisateur["prenom_utilisateur"]." ".$utilisateur["nom_utilisateur"] ?>
                </a>
            </td>
            <td>

                <a href="form_utilisateur.php?id=<?= $utilisateur["id_utilisateur"] ?>"><i class="fas fa-edit"></i></a>
                </td>
            <td>
                <a href="utilisateur_delete.php?id=<?= $utilisateur["id_utilisateur"] ?>"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>

    <?php

    //destruction de l'objet de connexion (libération de la mémoire)
    $bdd = null;

    ?>
    <br>
    <a href="form_utilisateur.php" class="btn btn-success">Nouveau</a>
</body>
</html>
