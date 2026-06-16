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
    email VARCHAR(100) NOT NULL,
    password VARCHAR (100) NOT NULL,
    alamat TEXT,
    no_hp VARCHAR(15)
);

-- =========================
-- TABEL KENDARAAN
-- =========================
CREATE TABLE kendaraan (
    id_kendaraan VARCHAR(10) PRIMARY KEY,
    nama_kendaraan VARCHAR(100) NOT NULL,
    merk VARCHAR(50) NOT NULL,
    plat_nomor VARCHAR(20) NOT NULL UNIQUE,
    tahun YEAR,
    gambar VARCHAR(255),
    harga_sewa DECIMAL(10,2) NOT NULL,
    status ENUM('Tersedia','Disewa', 'Service') DEFAULT 'Tersedia'
);

-- =========================
-- TABEL TRANSAKSI
-- =========================
CREATE TABLE transaksi (
    id_transaksi INT PRIMARY KEY,

    id_customer INT NOT NULL,
    id_kendaraan VARCHAR(10) NOT NULL,

    tanggal_sewa DATE NOT NULL,
    tanggal_kembali DATE NOT NULL,

    lama_sewa INT NOT NULL,
    jaminan VARCHAR(10) NOT NULL,

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
-- DATA KENDARAAN
-- =========================
INSERT INTO kendaraan (
    id_kendaraan,
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