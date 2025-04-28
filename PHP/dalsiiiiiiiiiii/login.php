<?php
session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení - Admin</title>
</head>
<body>
    <h2>Přihlášení</h2>
    <form action="login.php" method="POST">
        <label for="username">Uživatelské jméno:</label>
        <input type="text" name="username" required><br>
        <label for="password">Heslo:</label>
        <input type="password" name="password" required><br>
        <button type="submit" name="login">Přihlásit se</button>
    </form>

    <hr>
    <a href="index.php">Zpět na hlavní stránku</a>

    <?php
    if (isset($_POST['login'])) {
        // Zpracování přihlášení
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Provádění přihlášení, pokud je správné
        if ($username == "admin" && $password == "heslo") {
            $_SESSION['admin'] = true;
            header("Location: products.php");
        } else {
            echo "<p style='color: red;'>Špatné uživatelské jméno nebo heslo</p>";
        }
    }
    ?>
</body>
</html>
