| Nama                     | Kelas    | NIM       | Mata Kuliah           | Ujian |
|---------------------------|----------|------------|------------------------|--------|
| Friska Pebriana Lestari   | TI.24.A1 | 312410160  | Pemrograman Web 1      | UAS    |

## Struktur Folder
```
TRIFTING/
├── app/
│   ├── Controllers/   # Logika navigasi & aksi (Login, CRUD, dll)
│   ├── Models/        # Interaksi langsung dengan Database
│   └── Views/         # File template HTML/PHP (Bootstrap)
├── assets/            # Gambar produk, CSS, dan JS
├── config/            # Koneksi database.php
├── .htaccess          # Konfigurasi Routing App
└── index.php          # Front Controller (Main Entry Point)
```

## Fitur Utama
- Sistem Login Multi-role: Membedakan hak akses antara Admin dan User.
- Manajemen Produk (CRUD): Admin dapat menambah, melihat, mengubah, dan menghapus data produk.
- Filter Pencarian: Memudahkan pengguna mencari produk berdasarkan nama atau kategori.
- Pagination: Pembatasan jumlah data per halaman untuk performa aplikasi yang lebih baik.
- Responsive Design: Antarmuka adaptif menggunakan Twitter Bootstrap (Mobile First).




## Arsitektur & Teknologi
Aplikasi ini dirancang menggunakan prinsip modern web development:
1. MVC (Model-View-Controller):
   - Models: Mengelola logika database (sebagai contoh: Product.php, User.php).
   - Views: Mengelola tampilan antarmuka (sebagai contoh: folder products, layouts).
   - Controllers: Menghubungkan logika bisnis dengan tampilan (ProductController.php, AuthController.php).

2. OOP (Object-Oriented Programming): Penggunaan class dan method untuk modularitas kode yang tinggi.

3. Routing App & Clean URL: Implementasi custom routing melalui index.php dan konfigurasi .htaccess untuk URL yang lebih user-friendly.

4. Autoloading: Menggunakan spl_autoload_register untuk memuat class secara otomatis tanpa perlu require manual di banyak file.
