<?php
// modules/user/list.php
$query = "SELECT * FROM data_barang ORDER BY id_barang DESC";
$res = mysqli_query($conn, $query);
?>
<section>
    <div class="list-header">
        <h2>Daftar Barang</h2>
        <a class="btn" href="index.php?page=user/add">+ Tambah Data</a>
    </div>

    <div class="table-wrap">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($res && mysqli_num_rows($res) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($res)): ?>

                    <tr>
                        <td class="img-cell">
                            <?php 
                                
                                $imgPath = "/project_praktikum9/project/assets/img/" . $row['gambar'];
                            ?>

                            <?php if (!empty($row['gambar']) && file_exists(__DIR__ . "/../../assets/img/" . $row['gambar'])): ?>
                                <img src="<?= $imgPath ?>" alt="img" />
                            <?php else: ?>
                                <div class="no-img">No Image</div>
                            <?php endif; ?>
                        </td>

                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['kategori']) ?></td>
                        <td>Rp <?= number_format($row['harga_beli'],0,',','.') ?></td>
                        <td>Rp <?= number_format($row['harga_jual'],0,',','.') ?></td>
                        <td><?= (int)$row['stok'] ?></td>

                        <td>
                            <a class="btn small" href="index.php?page=user/edit&id=<?= $row['id_barang'] ?>">Edit</a>
                            <a class="btn small danger"
                               href="index.php?page=user/delete&id=<?= $row['id_barang'] ?>"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>

                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7" style="text-align:center;padding:18px;">Belum ada data</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
