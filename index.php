<?php

$database_host = getenv("DATABASE_HOST") ;
$database_user = getenv("DATABASE_USER") ;
$database_pass = getenv("DATABASE_PASS") ;
$database_name = getenv("DATABASE_NAME") ;

$db = new mysqli($database_host, $database_user, $database_pass, $database_name) ;

$sql = "CREATE TABLE IF NOT EXISTS hits (id INT PRIMARY KEY AUTO_INCREMENT, time DATETIME)" ;

$db->query($sql) ;

$sql = "INSERT INTO hits (time) VALUES (NOW())" ;

$db->query($sql) ;

$sql = "SELECT COUNT(0) AS count FROM hits" ;

$result = $db->query($sql) ;
$row = $result->fetch_assoc() ;

echo "The database says that you have hit it ${row['count']} times" . chr(10) ;
echo "The contents of the exmaple config secrets file:" . chr(10) ;
echo file_get_contents('config_secret') . chr(10) ;
