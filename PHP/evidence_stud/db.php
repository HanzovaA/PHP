<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "evidence_studentu";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}
?>