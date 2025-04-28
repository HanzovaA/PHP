<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_student = $_POST['id_student'];
    $predmet = $_POST['predmet'];
    $znamka = $_POST['znamka'];
    $datum = $_POST['datum'];

    $sql = "INSERT INTO znamka (id_student, predmet, znamka, datum) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isis", $id_student, $predmet, $znamka, $datum);

    if ($stmt->execute()) {
        echo "Známka byla přidána.";
    } else {
        echo "Chyba: " . $conn->error;
    }
}
?>

<form method="post">
    ID studenta: <input type="number" name="id_student" required><br>
    Předmět: <input type="text" name="predmet" required><br>
    Známka: <input type="number" name="znamka" min="1" max="5" required><br>
    Datum: <input type="date" name="datum" required><br>
    <input type="submit" value="Přidat známku">
</form>
