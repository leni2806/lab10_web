<?php
require_once __DIR__ . '/../../config/database.php';

$id = (int)($_POST['id'] ?? 0);
$nama = mysqli_real_escape_string($conn, $_POST['nama'] ?? '');
$kategori = mysqli_real_escape_string($conn, $_POST['kategori'] ?? '');
$harga_beli = (float)($_POST['harga_beli'] ?? 0);
$harga_jual = (float)($_POST['harga_jual'] ?? 0);
$stok = (int)($_POST['stok'] ?? 0);

$add_img_sql = '';
if (!empty($_FILES['file_gambar']['name']) && $_FILES['file_gambar']['error'] === 0) {
    $uploads_dir = __DIR__ . '/../../assets/uploads/';
    if (!is_dir($uploads_dir)) mkdir($uploads_dir,0755,true);
    $fn = preg_replace('/[^A-Za-z0-9\._-]/','_',basename($_FILES['file_gambar']['name']));
    $target = $uploads_dir . time() . '_' . $fn;
    if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $target)) {
        $gambar_path = 'assets/uploads/' . basename($target);
        $old = mysqli_fetch_assoc(mysqli_query($conn,"SELECT gambar FROM data_barang WHERE id_barang=$id"));
        if ($old && !empty($old['gambar']) && file_exists($old['gambar'])) {
            @unlink($old['gambar']);
        }
        $add_img_sql = ", gambar = '" . mysqli_real_escape_string($conn,$gambar_path) . "'";
    }
}

$sql = "UPDATE data_barang SET
            nama = '$nama',
            kategori = '$kategori',
            harga_beli = '$harga_beli',
            harga_jual = '$harga_jual',
            stok = '$stok'
            $add_img_sql
        WHERE id_barang = $id";
mysqli_query($conn, $sql);

header("Location: ../../index.php?page=user/list");
exit;
?>