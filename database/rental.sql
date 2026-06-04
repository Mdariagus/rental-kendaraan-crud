CREATE DATABASE IF NOT EXISTS db_rental;
USE db_rental;

-- =========================
-- TABEL ADMIN
-- =========================
CREATE TABLE admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- =========================
-- TABEL CUSTOMER
-- =========================
CREATE TABLE customer (
    id_customer INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    alamat TEXT,
    no_hp VARCHAR(15)
);

-- =========================
-- TABEL KENDARAAN
-- =========================
CREATE TABLE kendaraan (
    id_kendaraan INT AUTO_INCREMENT PRIMARY KEY,
    nama_kendaraan VARCHAR(100) NOT NULL,
    merk VARCHAR(50) NOT NULL,
    plat_nomor VARCHAR(20) NOT NULL UNIQUE,
    tahun YEAR,
    harga_sewa DECIMAL(10,2) NOT NULL,
    status ENUM('Tersedia','Disewa') DEFAULT 'Tersedia'
);

-- =========================
-- TABEL TRANSAKSI
-- =========================
CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,

    id_customer INT NOT NULL,
    id_kendaraan INT NOT NULL,

    tanggal_sewa DATE NOT NULL,
    tanggal_kembali DATE NOT NULL,

    lama_sewa INT NOT NULL,

    total_bayar DECIMAL(12,2) NOT NULL,

    status ENUM(
        'Menunggu',
        'Disetujui',
        'Selesai',
        'Dibatalkan'
    ) DEFAULT 'Menunggu',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_customer
        FOREIGN KEY (id_customer)
        REFERENCES customer(id_customer)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_kendaraan
        FOREIGN KEY (id_kendaraan)
        REFERENCES kendaraan(id_kendaraan)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- =========================
-- DATA ADMIN
-- =========================
INSERT INTO admin (
    nama,
    username,
    password
) VALUES (
    'Administrator',
    'admin',
    'admin123'
);

-- =========================
-- DATA CUSTOMER
-- =========================
INSERT INTO customer (
    nama,
    email,
    password,
    alamat,
    no_hp
) VALUES
(
    'Made',
    'made@gmail.com',
    '123456',
    'Denpasar',
    '081234567890'
),
(
    'Putra',
    'putra@gmail.com',
    '123456',
    'Badung',
    '081298765432'
);

-- =========================
-- DATA KENDARAAN
-- =========================
INSERT INTO kendaraan (
    nama_kendaraan,
    merk,
    plat_nomor,
    tahun,
    harga_sewa,
    status
) VALUES
(
    'Avanza',
    'Toyota',
    'DK1234AA',
    2023,
    350000,
    'Tersedia'
),
(
    'Xenia',
    'Daihatsu',
    'DK5678BB',
    2022,
    320000,
    'Tersedia'
),
(
    'Innova',
    'Toyota',
    'DK9012CC',
    2024,
    550000,
    'Tersedia'
);

-- =========================
-- DATA TRANSAKSI
-- =========================
INSERT INTO transaksi (
    id_customer,
    id_kendaraan,
    tanggal_sewa,
    tanggal_kembali,
    lama_sewa,
    total_bayar,
    status
) VALUES (
    1,
    1,
    '2026-06-10',
    '2026-06-12',
    3,
    1050000,
    'Menunggu'
);