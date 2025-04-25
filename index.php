
<?php
$conn = new mysqli("localhost", "root", "", "ukolnicek");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ukol = $_POST["ukol"];
    $conn->query("INSERT INTO ukoly (nazev) VALUES ('$ukol')");
}
$result = $conn->query("SELECT * FROM ukoly");
?>
<form method="post">
    <input name="ukol">
    <button type="submit">Přidat</button>
</form>
<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li><?= $row['nazev'] ?></li>
<?php endwhile; ?>
</ul>
