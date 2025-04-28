<?php
session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>E-shop - Hlavní stránka</title>
</head>
<body>
    <h2>Seznam produktů</h2>
    <nav>
        <a href="login.php">Přihlásit se</a> | <a href="products.php">Produkty</a> | <a href="add_product.php">Přidat produkt</a>
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
