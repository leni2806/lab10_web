<?php
require_once __DIR__ . '/../../config/database.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$res = mysqli_query($conn, "SELECT gambar FROM data_barang WHERE id_barang = $id");
$row = mysqli_fetch_assoc($res);
if ($row && !empty($row['gambar']) && file_exists($row['gambar'])) {
    @unlink($row['gambar']);
}
mysqli_query($conn, "DELETE FROM data_barang WHERE id_barang = $id");
header("Location: ../../index.php?page=user/list");
exit;
?>