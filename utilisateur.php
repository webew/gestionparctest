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
    <?php include 'menu.php'; ?>
    <?php
        //connexion à la bdd
        $pdo = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

        //requête pour retrouver l'utilisateur
        $sql = "SELECT * FROM utilisateur WHERE id_utilisateur=?";

        //exécution de la requête (appel de la méthode query sur l'objet $bdd)
        $stmt = $pdo->prepare($sql);//préparation de la requête
        $stmt->execute([$_GET['id']]);//exécution de la requête

        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);//$utilisateur dont l'id_utilisateur correspond à la valeur de $_GET["id"]

        //requête pour retrouver l'ordinateur de l'utilisateur
        $sql_ordi_utilisateur = "SELECT * FROM affecter JOIN ordinateur ON affecter.id_ordinateur=ordinateur.id_ordinateur WHERE id_utilisateur=? ORDER BY date_affectation DESC LIMIT 1";
        $stmt_ordi_utilisateur = $pdo->prepare($sql_ordi_utilisateur);//préparation de la requête
        $stmt_ordi_utilisateur->execute([$_GET['id']]);//exécution de la requête

        $ordinateur = $stmt_ordi_utilisateur->fetch(PDO::FETCH_ASSOC);//l'ordinateur de l'utilisateur

        //requête pour retrouver le moniteur de l'utilisateur
        $sql_moniteur_utilisateur = "SELECT * FROM attribuer JOIN moniteur ON attribuer.id_moniteur=moniteur.id_moniteur WHERE id_utilisateur=? ORDER BY date_attribution DESC LIMIT 1";
        $stmt_moniteur_utilisateur = $pdo->prepare($sql_moniteur_utilisateur);//préparation de la requête
        $stmt_moniteur_utilisateur->execute([$_GET['id']]);//exécution de la requête

        $moniteur = $stmt_moniteur_utilisateur->fetch(PDO::FETCH_ASSOC);//le moniteur de l'utilisateur

    ?>

    <!--AFFICHAGE DES DONNEES-->
    <h2><?= $utilisateur["prenom_utilisateur"]." ".$utilisateur["nom_utilisateur"] ?></h2>
    <hr>
    <h3>Ordinateur</h3>
    <table class="table">
        <tr><th>Modèle</th><th>Date affectation</th></tr>
        <tr>
            <td>
                <a href="ordinateur.php?id=<?= $ordinateur["id_ordinateur"] ?>">
                    <?= $ordinateur["modele_ordinateur"] ?>
                </a>
            </td>
            <td>
                <?= $ordinateur["date_affectation"] ?>
            </td>
        </tr>
    </table>

    <hr>
    <h3>Moniteur</h3>
    <table class="table">
        <tr><th>Modèle</th><th>Date affectation</th></tr>
        <tr>
            <td>
                <a href="moniteur.php?id=<?= $moniteur["id_moniteur"] ?>">
                    <?= $moniteur["modele_moniteur"] ?>
                </a>
            </td>
            <td>
                <?= $moniteur["date_attribution"] ?>
            </td>
        </tr>
    </table>


    <?php
    //destruction de l'objet de connexion (libération de la mémoire)
    $bdd = null;

    ?>
    
</body>
</html>


