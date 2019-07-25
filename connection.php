<?php

try {
$sourch="mysql:dbhost=localhost;dbname=laravel";
$user="root";
$pass="";

$conn=new PDO($sourch,$user,$pass);

} catch (PDOException $e) {
	echo"connection Failed".$e->getMessage();
}


?>