# 🌸 Praktikum 10 — Implementasi Modularisasi dengan Class Library (Form & Database)

**Nama**: LENI  
**NIM**: 312410442  
**Kelas**: TI.24.A5  
**Program Studi**: Teknik Informatika  
**Mata Kuliah**: Pemrograman Web  

---

# 🎯 1. Tujuan Praktikum

Praktikum 10 bertujuan untuk menerapkan **konsep modularisasi** pada project PHP sebelumnya (Praktikum 9) dengan cara:

### 🌸 Membuat Class Library untuk Form

Supaya pembuatan form tidak lagi ditulis secara manual (HTML), tetapi menggunakan class OOP.

### 🌸 Membuat Class Library untuk Database (Koneksi & CRUD)

Supaya koneksi database tidak lagi procedural (`mysqli_*`), tetapi OOP menggunakan class Database.

### 🌸 Mengintegrasikan kedua class tersebut dalam project Praktikum 9

Minimal diterapkan pada fitur **Tambah Data**.

---

# 🗂️🌸 2. Struktur Folder Project Setelah Modularisasi

Struktur folder setelah menambahkan **Form.php** dan **DatabaseClass.php**:

```
project_praktikum9-10/
├── index.php
├── config/
│   ├── database.php             # koneksi lama (procedural)
│   └── DatabaseClass.php        # koneksi baru (OOP) — praktikum 10
├── modules/
│   ├── Form.php                 # class Form — praktikum 10
│   ├── auth/                    # login, logout
│   ├── user/
│   │   ├── add.php              # pakai class Form
│   │   ├── save_add.php         # pakai class Database
│   │   ├── list.php             # daftar barang
│   │   ├── edit.php
│   │   ├── delete.php
├── views/
│   ├── header.php
│   ├── footer.php
│   └── dashboard.php
└── assets/
    ├── css/
    ├── js/
    ├── img/
    └── uploads/                 # upload gambar
```

---

# 🧱 3. Class Form (modules/Form.php)

Class Form dibuat untuk menggantikan HTML form manual menjadi lebih modular.

### Fitur yang mendukung:

* Text input
* Number input
* Textarea
* Select (dropdown)
* File upload
* Tombol submit otomatis

Class Form digunakan di file `modules/user/add.php`.

---

# 🧱 4. Class Database (config/DatabaseClass.php)

Class Database dibuat untuk melakukan:

* koneksi database secara OOP
* insert()
* get() / select
* update()
* delete()
* escape string otomatis

Dipakai di `modules/user/save_add.php`.

Class ini menggantikan koneksi lama:

```php
include 'config/database.php';
$conn = mysqli_connect(...);
```

---

# 🌸 5. Implementasi Modularisasi Pada Project

Pada praktikum 10, minimal dua file berikut menggunakan class OOP:

## ✔🌸 add.php → memakai class Form

Contoh:

```php
$form = new Form('save_add.php', 'Simpan');
$form->addField('nama','Nama');
$form->addField('kategori','Kategori','select',[...]);
$form->render();
```

## ✔🌸 save_add.php → memakai class Database

Contoh:

```php
$db = new Database();
$db->insert('data_barang', $data);
```
---

# 📷 6. Daftar Screenshot 

### 1 Struktur folder project
<img src="/struktur.png">

### 2🌸 first
<img src="/2.png">

### 3🌸 index
<img src="/1.png">

### 4🌸 tambah
<img src="/3.png">




---

# 🧠🌸 7. Kesimpulan Praktikum

Dengan menambahkan **class Form** dan **class Database**, project Praktikum 9 kini menjadi lebih modular:

* Kode lebih rapi dan terstruktur
* Tidak lagi menulis HTML form berulang
* Koneksi database lebih aman & mudah digunakan
* Setiap fitur dapat dipanggil cukup dengan memanggil class
