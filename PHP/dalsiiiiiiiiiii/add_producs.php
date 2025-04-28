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
    <title>Přidat produkt - Admin</title>
</head>
<body>
    <h2>Přidat nový produkt</h2>
    <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <label for="name">Název produktu:</label>
        <input type="text" name="name" required><br>
        <label for="description">Popis:</label>
        <textarea name="description" required></textarea><br>
        <label for="price">Cena:</label>
        <input type="number" name="price" required><br>
        <label for="image">Obrázek:</label>
        <input type="file" name="image" required><br>
        <button type="submit" name="submit">Přidat produkt</button>
    </form>
    <hr>
    <a href="products.php">Zpět na produkty</a>

    <?php
    if (isset($_POST['submit'])) {
        // Zpracování přidání produktu
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];

        // Uložení obrázku do složky "uploads"
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Logika pro přidání produktu do databáze (PDO)
        echo "<p>Produkt byl přidán!</p>";
    }
    ?>
</body>
</html>
