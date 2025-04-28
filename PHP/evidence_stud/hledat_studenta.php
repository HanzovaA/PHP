<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hledat = $_POST['hledat'];

    $sql = "SELECT id_student, jmeno, prijmeni FROM student WHERE jmeno LIKE ? OR prijmeni LIKE ?";
    $stmt = $conn->prepare($sql);
    $param = "%$hledat%";
    $stmt->bind_param("ss", $param, $param);

    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id_student'] . " - " . htmlspecialchars($row['jmeno']) . " " . htmlspecialchars($row['prijmeni']) . "<br>";
    }
}
?>

<form method="post">
    Vyhledat studenta: <input type="text" name="hledat" required><br>
    <input type="submit" value="Hledat">
</form>
