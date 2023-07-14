<?php 
$host="localhost";
$dbname="class1";
$dbuser="root";
$dbpassword="";


try{
    $pdo = new PDO("mysql:host={$host};dbname={$dbname}",$dbuser,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $ex){
    echo "Connection ERROR :".$ex->getMessage();
}

?>


