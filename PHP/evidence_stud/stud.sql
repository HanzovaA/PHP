-- Vytvoření databáze
CREATE DATABASE IF NOT EXISTS evidence_studentu;
USE evidence_studentu;

-- Tabulka student
CREATE TABLE IF NOT EXISTS student (
    id_student INT AUTO_INCREMENT PRIMARY KEY,
    jmeno VARCHAR(50) NOT NULL,
    prijmeni VARCHAR(50) NOT NULL
);

-- Tabulka znamka
CREATE TABLE IF NOT EXISTS znamka (
    id_znamka INT AUTO_INCREMENT PRIMARY KEY,
    id_student INT NOT NULL,
    predmet VARCHAR(50) NOT NULL,
    znamka INT NOT NULL,
    datum DATE NOT NULL,
    FOREIGN KEY (id_student) REFERENCES student(id_student)
);
