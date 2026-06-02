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
    status ENUM('Tersedia', 'Disewa') DEFAULT 'Tersedia'
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

    status ENUM('Aktif', 'Selesai') DEFAULT 'Aktif',

    FOREIGN KEY (id_customer)
        REFERENCES customer(id_customer),

    FOREIGN KEY (id_kendaraan)
        REFERENCES kendaraan(id_kendaraan)
);

-- =========================
-- DATA AWAL ADMIN
-- =========================
INSERT INTO admin (
    nama,
    username,
    password
)
VALUES (
    'Administrator',
    'admin',
    'admin123'
);