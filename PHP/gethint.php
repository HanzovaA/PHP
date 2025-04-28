<?php
$servername = "avrio.cz";
$username = "krizik";
$password = "Heslo123.";
$database = "krizik";



$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    
}
$sql="SELECT iduzivatel, jmeno FROM uzivatel WHERE jmneno LIKE "

?>