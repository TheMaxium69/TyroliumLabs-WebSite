<?php

$host = "";
$userDB = "";
$passDB = "";
$Database = "";

//MySQLi
$ConnectDB = mysqli_connect($host, $userDB, $passDB, $Database);

//PDO
try{
    $db = new PDO("mysql:host=" . $host . ";dbname=" . $Database, $userDB, $passDB);
    $db->setAttribute(PDO::ERRMODE_EXCEPTION, 'ATTR_ERRMODE');
}catch(PDOException $e){
    echo $e;
}


?>


