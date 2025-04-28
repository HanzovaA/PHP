<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jmeno = $_POST['jmeno'];
    $prijmeni = $_POST['prijmeni'];

    $sql = "INSERT INTO student (jmeno, prijmeni) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $jmeno, $prijmeni);

    if ($stmt->execute()) {
        echo "Student byl přidán.";
    } else {
        echo "Chyba: " . $conn->error;
    }
}
?>

<form method="post">
    Jméno: <input type="text" name="jmeno" required><br>
    Příjmení: <input type="text" name="prijmeni" required><br>
    <input type="submit" value="Přidat studenta">
</form>
