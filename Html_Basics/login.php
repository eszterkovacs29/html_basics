<?php
$dbUsername = "root";
$dbServer = "localhost";
$dbPassword = "";
$dbName = "library";


$username = $_POST['username'];
$password = $_POST['password'];



try {
    $pdo = new PDO("mysql:host=$dbServer; dbname=$dbName", $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: ". $e->getMessage());
}

$sql = "SELECT username, password FROM users WHERE ID = :id;";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=> 1]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if(!$user){
    echo "Error, contact the developer";
}

if($user['username'] == $username && $user['password'] == $password){
    echo "<script>alert('You logged in successfully!');
    window.location.href = 'mainPage.html'; </script>";
} 
else{
    echo "<script>alert('You entered the wrong username or password!');
    window.location.href = 'loginPage.html'; </script>";
}
