<?php
$server = "localhost";
$username = "root";
$password ="";
$db = "newdb";
$datetime=date("Y-m-d H-i-s");

$m = $_POST["mail"];
$ad = $_POST["adi"];
$pass = $_POST["parola"];



try{
    $conn =new PDO("mysql:host=$server;dbname=$db",$username,$password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo"basarılı";
}
catch(PDOException $e){
    echo "hata".$e->getMessage();
}

$pdoResult =$conn->prepare("INSERT INTO `users` ( `username`, `password`, `date`, `mail`) VALUES (:username,:pasword,:rdate,:email)");
$pdoExuc =$pdoResult ->execute(array(
    ":username"=>$ad,
    ":pasword"=>$pass,
    ":rdate"=>$datetime,
    ":email"=>$m 
));
if($pdoExuc)
echo"ok";
echo$ad," ",$pass," ",$datetime," ",$m;
?>