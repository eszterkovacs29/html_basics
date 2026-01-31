<?php
const DB_SERVER = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_NAME = "library";

$title = $_POST['Title'];
$author = $_POST['Author'];
$isbn = $_POST['ISBN'];
$tags = $_POST['tag'];


try {
    $pdo = new PDO("mysql:host=".DB_SERVER."; dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Connection error: ". $ex->getMessage());
}

$sql = "INSERT INTO books (ID, Title, Author, ISBN, Tags) VALUES (NULL, :title, :author, :isbn, :tags)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'title'=>$title,
    'author'=>$author,
    'isbn'=>$isbn,
    'tags'=> implode(",", $tags)
]);





?>