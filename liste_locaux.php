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
    
    <h2>Locaux</h2>
    <?php
    //connexion à la bdd
    $bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

    //requête à exécuter
    $sql = "SELECT * FROM local";

    //exécution de la requête (appel de la méthode query sur l'objet $bdd)
    $stmt = $bdd->query($sql);

    //liste des locals
    $liste_locaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <table class="table">
        <tr><th>Local</th><th></th><th></th></tr>
    <?php
        //affichage des données
        foreach($liste_locaux as $local){
    ?>
            <tr>
                <td>
                    <!--<a href="local.php?id=<?= $local["id_local"] ?>">-->
                        <?= $local["nom_local"] ?>
                    <!--</a>-->
                </td>
                <td>
                    <a href="form_local.php?id=<?= $local["id_local"] ?>"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <a href="local_delete.php?id=<?= $local["id_local"] ?>"><i class="fas fa-trash-alt"></i></a>
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
    <a href="form_local.php" class="btn btn-success">Nouveau</a>
</body>
</html>
