<?php

//$database_name = 'C:\\Users\\filli\\Documents\\test.accdb';
$database_name = 'C:/Users/filli/Documents/test.accdb';
$db_username = 'fillion.bertrand@gmail.com'; //username
$db_password = 'BEBouse0&0(&9-9Aleva0"0-'; //password


if (!file_exists($database_name)) {
    die("Access database file not found !");
}

echo '<pre>';
print_r(PDO::getAvailableDrivers());
try {
    $database = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=D:\\test.mdb;Uid=; Pwd=;');
    //$database = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=C:\\Users\\filli\\Documents\\test.accdb;Uid=; Pwd=;');
	echo "Success"; 
}
catch(PDOException $e){
    var_dump($e);
	echo "Connection failed: " . $e->getMessage();
}
//$database = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$database_name;Uid=admin; Pwd=;");
//$db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBNAME=$database_name ; username=; password=;");
echo "ok";

?>