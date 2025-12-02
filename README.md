# 🌸 **Praktikum 9 – PHP Modular, Routing & Authentication (Enhanced CRUD)**

# **UNIVERSITAS PELITA BANGSA**

## **LAPORAN PRAKTIKUM 9 – PEMROGRAMAN WEB**

### **Topik: Modular PHP, Routing, Login, dan CRUD Data Barang**

**Nama**: LENI  
**NIM**: 312410442  
**Kelas**: TI.24.A5  
**Program Studi**: Teknik Informatika  
**Mata Kuliah**: Pemrograman Web  

---

## 📋 **Deskripsi Project**

Praktikum 9 ini melanjutkan Praktikum 8 (CRUD Data Barang) dengan melakukan **refactoring struktur folder**, menambahkan **routing**, **pemisahan module**, **template header/footer**, dan **autentikasi login sederhana**.

Proyek ini dibangun menggunakan:

* **PHP (Modular + Routing)**  
* **MySQL**  
* **HTML & CSS Theme Soft Pastel Cute**  
* **Session (login/logout)**  

Aplikasi mencakup:

* Dashboard  
* Modul Data Barang (list, tambah, edit, hapus)  
* Sistem Login & Logout  
* Upload & tampilan gambar barang  

---

## 🎯 **Tujuan Praktikum**

* Memisahkan file PHP ke struktur folder terorganisir  
* Memahami konsep **routing dinamis menggunakan index.php?page=...**  
* Menerapkan **session login**  
* Mengembangkan middleware sederhana: halaman hanya dapat dibuka jika login  
* Menggunakan template **header.php** dan **footer.php**  
* Menyempurnakan CRUD Data Barang dari Praktikum 8  
* Menambahkan tampilan menarik menggunakan CSS pastel yang modern  

---

## 🏗️ **Struktur Project**

project_praktikum9/
│ index.php                      # Router utama
│
├── config/
│     └── database.php           # Koneksi database
│
├── views/
│     ├── header.php             # Template header
│     ├── footer.php             # Template footer
│     └── dashboard.php          # Dashboard
│
├── modules/
│     ├── user/
│     │     ├── list.php         # List data barang
│     │     ├── add.php          # Tambah barang
│     │     ├── edit.php         # Edit barang
│     │     └── delete.php       # Hapus barang
│     │
│     └── auth/
│           ├── login.php        # Halaman login
│           └── logout.php       # Proses logout
│
└── assets/
      ├── css/style.css          
      ├── js/main.js             # Interaksi JS
      └── img/                   # Folder gambar (hp_oppo, hp_samsung, hp_xiomi, dll)
```

---

## 🛠️ **Fitur Utama**

### 🌸 1. Login & Logout (Authentication)

* Login menggunakan session  
* Redirect otomatis ke dashboard  
* Protect halaman: hanya user login yang bisa akses data barang  
* Tombol Logout tersedia di navbar  

### 🌸 2. Dashboard

* Tampilan modern pastel  
* Menampilkan shortcut module  
* UI clean & estetik sesuai tema soft pastel cute  

### 🌸 3. CRUD Data Barang

* Menampilkan tabel barang lengkap  
* Fitur upload gambar barang (hp_oppo, hp_samsung, hp_xiomi)  
* Jika data tidak punya gambar → tampil **No Image**  
* Jika ada gambar → ditampilkan dengan style rounded  

---
### 🌸 4. Routing Dinamis 

Struktur akses:

```php
index.php?page=dashboard
index.php?page=auth/login
index.php?page=user/list
index.php?page=user/add
index.php?page=user/edit&id=1
index.php?page=user/delete&id=1
```


---

## 🔧 **Instalasi & Cara Menjalankan**

### 1. Buat Database

```sql
CREATE DATABASE praktikum9;
USE praktikum9;

CREATE TABLE data_barang (
    id_barang INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga_beli DECIMAL(10,2) NOT NULL,
    harga_jual DECIMAL(10,2) NOT NULL,
    stok INT NOT NULL,
    gambar VARCHAR(255)
);


### 2. pastikan database.php sudah benar

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "praktikum9";

$conn = new mysqli($host, $user, $pass, $db);
```

### 3. Jalankan di Browser
Buka di browser:

http://localhost/project_praktikum9/project/index.php?page=auth/login


### 📸 Tangkapan Layar (Screenshot)
✨ Login Page 

<img src="/login.png">

✨ Dashboard

<img src="/dashboard.png">

✨ List Data Barang

<img src="/data.png">

✨ Form Tambah Barang

<img src="/tambah.png">

✨ Form Edit Barang

<img src="/edit.png">

✨ Form Hapus Barang

<img src="/hapus.png">


### 💻 Penjelasan Routing (index.php)

```php
$page = $_GET['page'] ?? 'dashboard';
$path = __DIR__ . '/modules/' . $page . '.php';

if (file_exists($path)) {
    include $path;
} else {
    echo "404 - Halaman tidak ditemukan";
}
```


Routing otomatis membuka file sesuai nama module.
Contoh: page=user/list → /modules/user/list.php

💗 Penjelasan Login

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user'] = 'admin';
    header("Location: /project_praktikum9/project/index.php?page=dashboard");
}
```
Session untuk autentikasi dasar.

---


📦 Penjelasan Upload Gambar

Pada tambah & edit:

```php
$nama_file = time() . '_' . $_FILES['gambar']['name'];
move_uploaded_file($_FILES['gambar']['tmp_name'], 'assets/img/' . $nama_file);
```

Disimpan ke database:

assets/img/hp_oppo.png


Ditampilkan dengan:

<img src="assets/img/<?= $row['gambar'] ?>">

📝 Kesimpulan

Praktikum 9 melatih pembuatan aplikasi PHP modular dengan menggunakan:

👉🏻 routing

👉🏻 modularisasi file

👉🏻 session login

👉🏻 CRUD lanjutan prak 8

👉🏻 upload gambar

👉🏻 tampilan menggunakan style css


