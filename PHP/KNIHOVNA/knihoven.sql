-- Vytvoření databáze
CREATE DATABASE knihovna CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci;

USE knihovna;

-- Tabulka knih
CREATE TABLE knihy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazev VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    rok INT,
    zanr VARCHAR(100)
);
