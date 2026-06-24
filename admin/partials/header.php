<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Rental Kendaraan</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Heroicons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">