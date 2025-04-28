<?php
require 'db.php';

$sql = "SELECT student.id_student, jmeno, prijmeni, predmet, znamka, datum 
        FROM student 
        LEFT JOIN znamka ON student.id_student = znamka.id_student
        ORDER BY prijmeni, jmeno, predmet";

$result = $conn->query($sql);

$last_student = null;
while($row = $result->fetch_assoc()) {
    if ($last_student != $row['id_student']) {
        echo "<h3>" . htmlspecialchars($row['jmeno']) . " " . htmlspecialchars($row['prijmeni']) . "</h3>";
        $last_student = $row['id_student'];
    }
    if ($row['predmet']) {
        echo "Předmět: " . htmlspecialchars($row['predmet']) . " - Známka: " . htmlspecialchars($row['znamka']) . " (" . $row['datum'] . ")<br>";
    }
}
?>
