<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE cupractical";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    $conn->exec("USE cupractical");

    $sql = "CREATE TABLE albums (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(512),
  photos INT(6)
  )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table albums created successfully";

    $sql = "CREATE TABLE photos (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(512),
  url VARCHAR(2048),
  album_id INT(6)
  )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table photos created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
