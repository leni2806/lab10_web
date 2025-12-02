<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Sistem Barang</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="nav-wrap">
    <div class="nav-left">
        <div class="logo">💜 <span class="logo-text">Sistem Barang</span></div>
    </div>
    <nav class="nav-right">
        <a href="index.php?page=dashboard">Dashboard</a>
        <a href="index.php?page=user/list">Data Barang</a>
        <a href="index.php?page=user/add">Tambah</a>
        <?php if (!empty($_SESSION['user'])): ?>
            <a href="index.php?page=auth/logout">Logout</a>
        <?php else: ?>
            <a href="index.php?page=auth/login">Login</a>
        <?php endif; ?>
    </nav>
</header>

<main class="container">
