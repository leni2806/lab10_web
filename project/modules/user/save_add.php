<?php
require_once __DIR__ . '/../../config/DatabaseClass.php';

$db = new Database();

// ambil data POST
$nama        = $_POST['nama'] ?? '';
$kategori    = $_POST['kategori'] ?? '';
$harga_beli  = $_POST['harga_beli'] ?? 0;
$harga_jual  = $_POST['harga_jual'] ?? 0;
$stok        = $_POST['stok'] ?? 0;

$gambar_path = "";

// upload file
if (!empty($_FILES['file_gambar']['name']) && $_FILES['file_gambar']['error'] === 0) {

    $uploads_dir = __DIR__ . '/../../assets/uploads/';

    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0755, true);
    }

    $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\._-]/', '_',
                 basename($_FILES['file_gambar']['name']));

    $path_target = $uploads_dir . $filename;

    if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $path_target)) {
        $gambar_path = 'assets/uploads/' . $filename;
    }
}

// data untuk insert
$data = [
    'nama'        => $nama,
    'kategori'    => $kategori,
    'harga_beli'  => $harga_beli,
    'harga_jual'  => $harga_jual,
    'stok'        => $stok,
    'gambar'      => $gambar_path
];

// simpan ke database pakai Class Database
$db->insert('data_barang', $data);

// redirect kembali ke list
header("Location: ../../index.php?page=user/list");
exit;
