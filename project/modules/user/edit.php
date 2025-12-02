<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$res = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang = $id");
$data = mysqli_fetch_assoc($res);
if (!$data) {
    echo "<div style='padding:20px'>Data tidak ditemukan.</div>";
    return;
}
?>
<section>
    <h2>Edit Barang</h2>

    <form class="card-form" method="post" action="modules/user/save_edit.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id_barang'] ?>">
        <label>Nama Barang</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="Komputer" <?= ($data['kategori']=='Komputer') ? 'selected' : '' ?>>Komputer</option>
            <option value="Elektronik" <?= ($data['kategori']=='Elektronik') ? 'selected' : '' ?>>Elektronik</option>
            <option value="Hand Phone" <?= ($data['kategori']=='Hand Phone') ? 'selected' : '' ?>>Hand Phone</option>
        </select>

        <label>Harga Beli</label>
        <input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>" required step="0.01">

        <label>Harga Jual</label>
        <input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>" required step="0.01">

        <label>Stok</label>
        <input type="number" name="stok" value="<?= $data['stok'] ?>" required>

        <label>Gambar Baru (biarkan kosong jika tidak ingin mengganti)</label>
        <input type="file" name="file_gambar" accept="image/*">

        <?php if (!empty($data['gambar']) && file_exists($data['gambar'])): ?>
            <div style="margin-top:8px;">
                <img src="<?= htmlspecialchars($data['gambar']) ?>" alt="current" style="width:120px;border-radius:8px;">
            </div>
        <?php endif; ?>

        <button class="btn" type="submit">Update</button>
    </form>
</section>
