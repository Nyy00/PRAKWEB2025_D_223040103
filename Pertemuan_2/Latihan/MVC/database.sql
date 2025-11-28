CREATE DATABASE IF NOT EXISTS `phpmvc` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `phpmvc`;

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(100) NOT NULL,
    `nrp` VARCHAR(20) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `jurusan` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uniq_nrp` (`nrp`),
    UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `mahasiswa` (`nama`, `nrp`, `email`, `jurusan`) VALUES
('Dony Laksmana', '223040103', 'dony@example.com', 'Teknik Informatika'),
('Siti Aminah', '223040201', 'siti@example.com', 'Sistem Informasi'),
('Budi Santoso', '223040305', 'budi@example.com', 'Teknik Informatika');

