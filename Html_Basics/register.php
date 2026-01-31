<?php
$dbUsername = "root";
$dbServer = "localhost";
$dbPassword = "";
$dbName = "library";


$username = $_POST['username'];
$password = $_POST['password'];

if(strlen($password)<8){
    echo "<script>window.location.href='index.html?errcode=8'; </script>";
    die();
}

try {
    $pdo = new PDO("mysql:host=$dbServer; dbname=$dbName", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: ". $e->getMessage());
}

$checkQuerry = "SELECT username FROM users WHERE username = :checkUsername";
$checkStmt =$pdo-> prepare($checkQuerry);
$checkStmt->execute(['checkUsername'=>$username]);
if($row = $checkStmt ->fetch() != false){
    echo "<script>window.location.href='index.html?errcode=7'; </script>";
    die();    
};


$sql = "INSERT INTO users (id, username, password) VALUES (NULL, :username, :password);";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username'=> $username, 'password' => $password]);



