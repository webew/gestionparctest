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
        $id_utilisateur = $nom_utilisateur = $prenom_utilisateur = "";
        $form_action_script = "utilisateur_new.php";
        //connexion à la bdd
        $bdd = new PDO("mysql:host=localhost;dbname=gestionparc","root","");//$bdd de type PDO

        if(isset($_GET["id"])){//si on souhaite modifier l'utilisateur
            

            //requête à exécuter
            $sql = "SELECT * FROM `utilisateur` WHERE `id_utilisateur`=?";
            
            //exécution de la requête (appel de la méthode query sur l'objet $bdd)
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$_GET["id"]]);

            //utilisateur
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

            $id_utilisateur = $utilisateur["id_utilisateur"];
            $nom_utilisateur = $utilisateur["nom_utilisateur"];
            $prenom_utilisateur = $utilisateur["prenom_utilisateur"];
            $id_local = $utilisateur["id_local"];
            $form_action_script = "utilisateur_edit.php";

            
        }
        //liste des locaux
        $sql_locaux = "SELECT * FROM local";
        $stmt_locaux = $bdd->query($sql_locaux);
        $liste_locaux = $stmt_locaux->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h2>Modification d'un utilisateur</h2>
    <!--LE FORMULAIRE-->
    <form action="<?= $form_action_script ?>" method="post">
        <!--champ caché pour envoyer l'id-->
        <input type="hidden" name="id_utilisateur" value="<?= $id_utilisateur ?>">
        <!--champ nom_utilisateur-->
        <div class="form-group">
            <label for="nom_utilisateur">Nom</label>
            <input type="text"  class="form-control" name="nom_utilisateur" id="nom_utilisateur" value="<?= $nom_utilisateur ?>">
        </div>
        <!--champ prenom_utilisateur-->
        <div class="form-group">
            <label for="prenom_utilisateur">Prénom</label>
            <input type="text" class="form-control" name="prenom_utilisateur" id="prenom_utilisateur" value="<?= $prenom_utilisateur ?>">
        </div>
        <!--choix du local-->
        <div class="form-group">
            <label for="exampleFormControlSelect1">Local</label>
            <select name="local" class="form-control" id="select_local">
                <?php
                    foreach($liste_locaux as $local){
                        $selected = "";
                        if($local["id_local"]==$id_local){
                            $selected = "selected";
                        }
                ?>
                    <option value="<?= $local["id_local"] ?>" <?= $selected ?>><?= $local["nom_local"] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <!--bouton de validation-->
        <input type="submit" class="btn btn-primary" value="Valider">
    </form>
</body>
</html>

