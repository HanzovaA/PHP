<?php
include 'conn.php';
//registrace
if(isset($_POST['register'])) {
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $Role = $_POST['Role'];


    $sql = "INSERT INTO  User (email,password) VALUES ( '$Email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "User inserted successfully";
    } else {
        echo "Error1: " . $sql . "<br>" . $conn->error;
    }
    }
    else{
        echo "funguj ";
    }

    $sql = "INSERT INTO Role (name) VALUES (  '$Role' )";
    // Uzavření spojení s databází
    $conn->close(); 
 

 

?>