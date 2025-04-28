<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Načtení dat z formuláře
    $nazev = $_POST['nazev'];
    $autor = $_POST['autor'];
    $rok = $_POST['rok'];
    $zanr = $_POST['zanr'];

    // Vložení do DB
    $stmt = $conn->prepare("INSERT INTO knihy (nazev, autor, rok, zanr) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nazev, $autor, $rok, $zanr);
    $stmt->execute();

    // Přesměrování zpět na index
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Přidat knihu</title>
</head>
<body>
    <h1>Přidat knihu</h1>
    <form method="post">
        Název: <input type="text" name="nazev" required><br>
        Autor: <input type="text" name="autor" required><br>
        Rok vydání: <input type="number" name="rok"><br>
        Žánr: <input type="text" name="zanr"><br>
        <button type="submit">Uložit</button>
    </form>
    <a href="index.php">← Zpět na seznam</a>
</body>
</html>
