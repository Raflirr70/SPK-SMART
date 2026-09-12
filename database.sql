CREATE DATABASE IF NOT EXISTS spk;
USE spk;

CREATE TABLE IF NOT EXISTS laptop (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS kriteria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_laptop INT NOT NULL,
    ram INT NOT NULL,
    core INT NOT NULL,
    pemakaian INT NOT NULL,
    bobot INT NOT NULL,
    harga INT NOT NULL,
    FOREIGN KEY (id_laptop) REFERENCES laptop(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS hasil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_laptop INT NOT NULL,
    nilai DOUBLE NOT NULL,
    FOREIGN KEY (id_laptop) REFERENCES laptop(id) ON DELETE CASCADE
);


INSERT INTO laptop (id, nama) VALUES
(1,  'Asus VivoBook 14'),
(2,  'Acer Aspire 5'),
(3,  'Lenovo IdeaPad Slim 3'),
(4,  'HP Pavilion 14'),
(5,  'Dell Inspiron 15'),
(6,  'Asus TUF Gaming F15'),
(7,  'Acer Swift 3'),
(8,  'Lenovo Legion 5'),
(9,  'MSI Katana GF66'),
(10, 'HP Envy 13'),
(11, 'MacBook Air M1'),
(12, 'MacBook Pro 14'),
(13, 'Asus ZenBook 14'),
(14, 'Acer Nitro 5'),
(15, 'Lenovo ThinkPad E14'),
(16, 'HP Victus 15'),
(17, 'Dell XPS 13'),
(18, 'Asus ROG Zephyrus G14'),
(19, 'MSI Modern 14'),
(20, 'Lenovo Yoga 9i'),
(21, 'Acer Predator Helios 16'),
(22, 'Samsung Galaxy Book4 Pro'),
(23, 'HP Spectre x360'),
(24, 'Dell Latitude 5430'),
(25, 'Asus ExpertBook B1500');

INSERT INTO kriteria (id_laptop, ram, core, pemakaian, bobot, harga) VALUES
(1,  8,  4, 8,  1400, 6500000),
(2,  8,  4, 7,  1650, 7200000),
(3,  8,  4, 8,  1620, 5900000),
(4,  8,  4, 8,  1370, 8400000),
(5,  8,  8, 6,  1970, 9300000),
(6,  16, 8, 5,  2500, 13500000),
(7,  16, 8, 9,  1120, 11900000),
(8,  16, 8, 5,  2410, 16500000),
(9,  16, 8, 4,  2170, 14200000),
(10, 8,  8, 9,  1320, 15500000),
(11, 8,  4, 15, 1290, 12500000),
(12, 16, 4, 14, 1470, 22900000),
(13, 16, 8, 10, 1390, 14400000),
(14, 16, 8, 5,  2500, 12500000),
(15, 16, 8, 7,  1680, 13200000),
(16, 16, 4, 6,  2230, 11200000),
(17, 16, 4, 9,  1200, 19800000),
(18, 32, 8, 7,  1660, 26900000),
(19, 8,  4, 7,  1240, 8500000),
(20, 16, 8, 11, 1340, 21900000),
(21, 32, 16, 4, 2620, 29500000),
(22, 16, 8, 9,  1180, 17800000),
(23, 16, 8, 8,  1430, 20500000),
(24, 16, 8, 8,  1390, 15100000),
(25, 8,  4, 8,  1690, 7800000);