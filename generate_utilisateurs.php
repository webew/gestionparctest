<h2>Utilisateurs</h2>
<?php
//effacement des données de la base avec réinitialisation (TRUNCATE) des auto_increment
$sql_truncate = "SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE utilisateur;SET FOREIGN_KEY_CHECKS=1;";
$conn->prepare($sql_truncate)->execute();

//génération des données
$sql = "INSERT INTO utilisateur VALUES (NULL,?,?)";
$stmt = $conn->prepare($sql);
for($i=1;$i<=10;$i++){
    $firstName = $faker->firstName;
    $lastName = $faker->lastName;
    $stmt->execute([$lastName,$firstName]);
    echo $firstName." ".$lastName."<br>";
}
?>