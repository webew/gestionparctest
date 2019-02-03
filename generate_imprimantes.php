<h2>Imprimantes</h2>
<?php
//effacement des données de la base avec réinitialisation (TRUNCATE) des auto_increment
$sql_truncate = "SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE imprimante;SET FOREIGN_KEY_CHECKS=1;";
$conn->prepare($sql_truncate)->execute();

//génération des données
for($i=1;$i<=5;$i++){
    $name = "HP650";
    $sql = "INSERT INTO imprimante VALUES (NULL,?)";
    $conn->prepare($sql)->execute([$name]);
    echo $name."<br>";
}
?>