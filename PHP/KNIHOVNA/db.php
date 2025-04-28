<?php
// Deklarace php promÄ›nnÃ½ch
$servername = "localhost";
$username = "root";
$password = "" ;
$database = "knihovna";


//MYSQLI - MYSQL Improved
$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
   
}


?>