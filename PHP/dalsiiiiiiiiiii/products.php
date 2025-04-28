<?php
session_start();

// Jen pro přihlášené administrátory
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Produkty - Admin</title>
</head>
<body>
    <h2>Seznam produktů</h2>
    <nav>
        <a href="index.php">Hlavní stránka</a> | <a href="add_product.php">Přidat produkt</a>
    </nav>
    <hr>

    <h3>Seznam produktů</h3>
    <table border="1">
        <tr>
            <th>Název</th>
            <th>Popis</th>
            <th>Cena</th>
            <th>Obrázek</th>
        </tr>
        <?php
        // Zde bude logika pro zobrazení produktů
        ?>
    </table>
</body>
</html>
