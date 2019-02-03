<h2>PCS</h2>
<?php
//effacement des données de la base avec réinitialisation (TRUNCATE) des auto_increment
$sql_truncate = "SET FOREIGN_KEY_CHECKS=0;TRUNCATE TABLE pc;SET FOREIGN_KEY_CHECKS=1;";
$conn->prepare($sql_truncate)->execute();

//génération des données
for($i=1;$i<=10;$i++){
    $name = $faker->colorName;
    $cap = "250 Go";
    $proc = "Intel i5";
    $mem = "8 Go";
    $sql = "INSERT INTO pc VALUES (NULL,?,?,?,?)";
    $conn->prepare($sql)->execute([$name,$cap,$proc,$mem]);
    echo $name."<br>";
}
?>