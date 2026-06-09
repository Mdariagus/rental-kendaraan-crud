<?php
session_start();

if(!isset($_SESSION['id_customer'])){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Customer</title>
</head>
<body>

<h1>
    Halo, <?= $_SESSION['nama_customer']; ?> 👋
</h1>

<p>Selamat datang di dashboard customer.</p>

<a href="logout.php">Logout</a>

</body>
</html>