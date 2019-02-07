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
    <?php
    $id_local = $nom_local = "";
    $form_action_script = "local_new.php";

    if(isset($_GET["id"])){//si on souhaite modifier l'local
        //connexion à la bdd
        $bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

        //requête à exécuter
        $sql = "SELECT * FROM `local` WHERE `id_local`=?";
        
        //exécution de la requête (appel de la méthode query sur l'objet $bdd)
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$_GET["id"]]);

        //liste des locals
        $local = $stmt->fetch(PDO::FETCH_ASSOC);

        $id_local = $local["id_local"];
        $nom_local = $local["nom_local"];
        $form_action_script = "local_edit.php";
    }
    ?>
    <h2>Modification d'un local</h2>
    <form action="<?= $form_action_script ?>" method="post">
        <input type="hidden" name="id_local" value="<?= $id_local ?>">
        <!--champ nom_utilisateur-->
        <div class="form-group">
            <label for="nom_local">Nom</label>
            <input type="text" class="form-control" name="nom_local" id="nom_local" value="<?= $nom_local ?>">
        </div>
        <input type="submit" class="btn btn-primary" value="Valider">
    </form>

</body>
</html>
