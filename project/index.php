<?php
// index.php - routing
session_start();
require_once __DIR__ . '/config/database.php';

$page = $_GET['page'] ?? 'dashboard';

include __DIR__ . '/views/header.php';

// ========== HALAMAN DASHBOARD ==========
if ($page === 'dashboard') {
    include __DIR__ . '/views/dashboard.php';
    include __DIR__ . '/views/footer.php';
    exit;
}

// ========== HALAMAN MODUL (user, auth) ==========
$path = __DIR__ . '/modules/' . $page . '.php';

if (file_exists($path)) {
    include $path;
} else {
    echo "<div style='padding:30px'><h2>404 - Halaman tidak ditemukan</h2><p>Pastikan URL benar: index.php?page=module/file</p></div>";
}

include __DIR__ . '/views/footer.php';
?>

