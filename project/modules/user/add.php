<?php
include_once __DIR__ . '/../Form.php';
?>

<section>
    <h2>Tambah Barang</h2>

    <?php
    $form = new Form('save_add.php', 'Simpan');

    $form->addField('nama', 'Nama Barang', 'text');

    // Kategori → harus select
    // Kita gunakan type 'select' (tambahkan di Form.php)
    $form->addField('kategori', 'Kategori', 'select', [
        'Komputer',
        'Elektronik',
        'Hand Phone'
    ]);

    $form->addField('harga_beli', 'Harga Beli', 'number');
    $form->addField('harga_jual', 'Harga Jual', 'number');
    $form->addField('stok', 'Stok', 'number');
    $form->addField('file_gambar', 'File Gambar', 'file');

    $form->render();
    ?>
</section>
