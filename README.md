<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

# 📱 L-Store Manager — Sistem Manajemen Inventaris Konter HP

Aplikasi web berbasis **Laravel 11** yang dirancang untuk digitalisasi manajemen stok dan aset pada toko retail smartphone (Konter HP). Aplikasi ini mengintegrasikan sistem autentikasi keamanan, manajemen data (CRUD), dan antarmuka responsif.

---

## 👤 Identitas Mahasiswa

- **NAMA :** Latief Prayoga Yudhi Putra
- **NIM :** 220103180
- **KELAS:** 22TIA6
- **INSTANSI:** Universitas Duta Bangsa Surakarta

---

## 🗂️ Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Struktur Proyek](#struktur-proyek)
- [Struktur Database](#struktur-database)
- [Instalasi & Konfigurasi](#instalasi--konfigurasi)
- [Keamanan & Alur Data](#keamanan--alur-data)
- [Rute Aplikasi](#rute-aplikasi)

---

## Tentang Proyek

**L-Store Manager** adalah solusi digital untuk menggantikan pencatatan inventaris manual. Fokus utama aplikasi ini adalah mengelola barang-barang _fast-moving_ (seperti aksesoris) dan aset bernilai tinggi (unit smartphone) dengan pencatatan harga beli, harga jual, dan sisa stok secara akurat.

---

## Fitur Utama

- **Autentikasi Keamanan** — Login & Logout menggunakan session Laravel yang diproteksi dengan **Bcrypt Hashing** dan perlindungan terhadap serangan CSRF.
- **Dashboard Statistik** — Menampilkan ringkasan total item, total stok tersedia, dan kategori barang secara real-time.
- **Manajemen Inventaris (CRUD)** — Fitur lengkap untuk Menambah, Melihat Detail, Mengedit, dan Menghapus data barang.
- **Middleware Protection** — Memastikan halaman manajemen hanya dapat diakses oleh pengguna yang sudah terverifikasi (login).
- **UI Responsif** — Antarmuka modern menggunakan **Tailwind CSS** yang optimal diakses melalui PC maupun Smartphone.
- **Notifikasi Sistem** — Integrasi **SweetAlert2** untuk memberikan pesan konfirmasi dan status sukses/gagal pada setiap aksi pengguna.

---

## Teknologi yang Digunakan

| Komponen       | Detail                           |
| :------------- | :------------------------------- |
| **Framework**  | Laravel 11 (PHP)                 |
| **Database**   | MySQL                            |
| **Frontend**   | Tailwind CSS & Blade Templating  |
| **Library UI** | SweetAlert2 & FontAwesome 6      |
| **Security**   | Bcrypt Hashing & CSRF Protection |
| **Build Tool** | Vite                             |

---

## Struktur Proyek

```
L_Store_Manager/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php          # Logika Login & Logout
│   │       └── ItemController.php          # Logika CRUD Inventaris
│   └── Models/
│       ├── User.php                        # Model Pengguna & Auth
│       └── Item.php                        # Model Stok Barang
├── database/
│   ├── migrations/                         # Cetak biru tabel database
│   └── seeders/                            # Data contoh (User Admin)
├── resources/
│   └── views/
│       ├── auth/                           # View Halaman Login
│       ├── layouts/                        # Template Utama (Navbar/Footer)
│       └── items/                          # View CRUD (Index, Create, Edit)
├── routes/
│   └── web.php                             # Definisi URL & Middleware
└── .env                                    # Konfigurasi Environment
```

---

## Struktur Database

### Tabel `items` (Manajemen Stok)

| Kolom         | Tipe        | Keterangan                         |
| :------------ | :---------- | :--------------------------------- |
| `id`          | bigint (PK) | Auto Increment                     |
| `nama_barang` | string      | Nama produk/aksesoris              |
| `kategori`    | string      | Contoh: Smartphone, Charger, Audio |
| `harga_beli`  | decimal     | Harga modal barang                 |
| `harga_jual`  | decimal     | Harga jual ke konsumen             |
| `stok`        | integer     | Jumlah unit tersedia               |
| `keterangan`  | text        | Deskripsi tambahan barang          |

### Tabel `users` (Otentikasi)

| Kolom      | Tipe        | Keterangan                 |
| :--------- | :---------- | :------------------------- |
| `id`       | bigint (PK) | Auto Increment             |
| `name`     | string      | Nama lengkap Admin         |
| `email`    | string      | Email untuk login (Unique) |
| `password` | string      | **Bcrypt Hash**            |

---

## Instalasi & Konfigurasi

1. **Clone Repository**

    ```bash
    git clone https://github.com/prayoga-web/UJK.git
    cd UJK
    ```

2. **Install Dependensi**

    ```bash
    composer install
    npm install && npm run build
    ```

3. **Konfigurasi Database**
   Salin `.env.example` ke `.env` dan atur koneksi database MySQL.

4. **Migrasi & Key Generate**

    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

5. **Jalankan Aplikasi**
    ```bash
    php artisan serve
    ```

---

## Keamanan & Alur Data

Sistem ini menerapkan dua lapisan keamanan utama:

1. **Bcrypt Hashing** — Diimplementasikan pada AuthController. Saat pengguna login atau mendaftar, password diproses menggunakan fungsi `Hash::make` yang menghasilkan string acak aman.

2. **Middleware** — Seluruh rute manajemen stok di dalam `web.php` dibungkus dengan `Route::middleware(['auth'])`. Ini bertugas memvalidasi session user sebelum mengizinkan akses ke database.

---

## Rute Aplikasi

| Method | URL             | Controller               | Fungsi                |
| :----- | :-------------- | :----------------------- | :-------------------- |
| GET    | `/login`        | AuthController@showLogin | Form Login            |
| POST   | `/login`        | AuthController@login     | Proses Verifikasi     |
| GET    | `/dashboard`    | ItemController@index     | Tampilan Utama (Auth) |
| GET    | `/items/create` | ItemController@create    | Form Tambah Stok      |
| POST   | `/items`        | ItemController@store     | Simpan Data ke DB     |
| DELETE | `/items/{id}`   | ItemController@destroy   | Hapus Data            |
