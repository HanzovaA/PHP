<?php
session_start(); // Začátek session pro správu přihlášení

// Připojení k databázi
$host = "localhost";
$dbname = "eshop";
$username = "root";
$password = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Připojení k databázi selhalo: " . $e->getMessage();
}

// Funkce pro přihlášení administrátora
function login($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    $admin = $stmt->fetch();
    if ($admin) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        return true;
    }
    return false;
}

// Funkce pro přidání produktu
function addProduct($name, $description, $price, $image) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image) VALUES (:name, :description, :price, :image)");
    $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'image' => $image]);
}

// Funkce pro zobrazení všech produktů
function getProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll();
}

// Funkce pro úpravu produktu
function updateProduct($id, $name, $description, $price, $image) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE products SET name = :name, description = :description, price = :price, image = :image WHERE id = :id");
    $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price, 'image' => $image, 'id' => $id]);
}

// Funkce pro smazání produktu
function deleteProduct($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

// Zpracování přihlášení
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (login($username, $password)) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Špatné uživatelské jméno nebo heslo!";
    }
}

// Zpracování přidání produktu
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    addProduct($name, $description, $price, $target_file);
    header("Location: admin.php");
}

// Zpracování úpravy produktu
if (isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    if ($image) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        $target_file = $_POST['old_image']; // Použití starého obrázku
    }

    updateProduct($id, $name, $description, $price, $target_file);
    header("Location: admin.php");
}

// Zpracování smazání produktu
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteProduct($id);
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>E-shop - Admin</title>
</head>
<body>
    <?php if (!isset($_SESSION['admin_id'])): ?>
        <h2>Administrátorské přihlášení</h2>
        <form method="POST">
            <label for="username">Uživatelské jméno:</label>
            <input type="text" name="username" required><br>
            <label for="password">Heslo:</label>
            <input type="password" name="password" required><br>
            <button type="submit" name="login">Přihlásit se</button>
        </form>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    <?php else: ?>
        <h2>Správa produktů</h2>
        <a href="logout.php">Odhlásit se</a>

        <h3>Přidat nový produkt</h3>
        <form method="POST" enctype="multipart/form-data">
            <label for="name">Název:</label>
            <input type="text" name="name" required><br>
            <label for="description">Popis:</label>
            <textarea name="description" required></textarea><br>
            <label for="price">Cena:</label>
            <input type="number" name="price" required><br>
            <label for="image">Obrázek:</label>
            <input type="file" name="image" required><br>
            <button type="submit" name="add_product">Přidat produkt</button>
        </form>

        <h3>Seznam produktů</h3>
        <table border="1">
            <tr>
                <th>Název</th>
                <th>Popis</th>
                <th>Cena</th>
                <th>Obrázek</th>
                <th>Úpravy</th>
                <th>Smazat</th>
            </tr>
            <?php
            $products = getProducts();
            foreach ($products as $product):
            ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><img src="<?php echo $product['image']; ?>" width="100"></td>
                    <td><a href="edit_product.php?id=<?php echo $product['id']; ?>">Upravit</a></td>
                    <td><a href="?delete=<?php echo $product['id']; ?>">Smazat</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
