<h2>Moniteurs</h2>
<?php
//effacement des données de la base avec réinitialisation (TRUNCATE) des auto_increment
$sql_truncate = "SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE moniteur;SET FOREIGN_KEY_CHECKS=1;";
$conn->prepare($sql_truncate)->execute();

//génération des données
for($i=1;$i<=5;$i++){
    $name = "IIYAMA";
    $mod = "XUB2492HSU";
    $taille = '21"';

    $sql = "INSERT INTO moniteur VALUES (NULL,?,?,?,NULL)";
    $conn->prepare($sql)->execute([$name,$mod,$taille]);
    echo $name."<br>";
}
?>