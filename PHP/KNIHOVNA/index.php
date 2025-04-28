<?php
include 'db.php'; // připojení k DB

// Načtení knih z DB
$sql = "SELECT * FROM knihy ORDER BY id DESC";
$vysledek = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Seznam knih</title>
</head>
<body>
    <h1>Seznam knih</h1>
    <a href="pridat.php">➕ Přidat novou knihu</a>
    <ul>
        <?php while($radek = $vysledek->fetch_assoc()): ?>
            <li>
                <strong><?= htmlspecialchars($radek['nazev']) ?></strong> –
                <?= htmlspecialchars($radek['autor']) ?> (<?= $radek['rok'] ?>),
                žánr: <?= htmlspecialchars($radek['zanr']) ?>
                <a href="smazat.php?id=<?= $radek['id'] ?>" onclick="return confirm('Opravdu smazat?')">🗑️ Smazat</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
