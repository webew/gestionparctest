<h2>Locaux</h2>
<?php
//effacement des données de la base avec réinitialisation (TRUNCATE) des auto_increment
$sql_truncate = "SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE local;SET FOREIGN_KEY_CHECKS=1;";
$conn->prepare($sql_truncate)->execute();

//génération des données
for($i=1;$i<=10;$i++){
    $name = $faker->state;
    $sql = "INSERT INTO local VALUES (NULL,?)";
    $conn->prepare($sql)->execute([$name]);
    echo $name."<br>";
}
?>