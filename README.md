| Nama                     | Kelas    | NIM       | Mata Kuliah           | Ujian |
|---------------------------|----------|------------|------------------------|--------|
| Friska Pebriana Lestari   | TI.24.A1 | 312410160  | Pemrograman Web 1      | UAS    |

## Deskripsi
Aplikasi Sederhana yang saya buat bertemakan thrifting store
Thrifting Store adalah platform manajemen katalog barang bekas (pre-loved) berkualitas yang dirancang untuk memudahkan pelaku bisnis thrifting mengelola inventaris mereka. Aplikasi ini mengusung konsep Sustainable Fashion, di mana pengguna dapat mencari barang-barang unik dengan harga terjangkau sekaligus mendukung gerakan ramah lingkungan.

Sistem ini dikembangkan menggunakan Native PHP dengan pendekatan OOP (Object-Oriented Programming) dan arsitektur MVC, memastikan kode program mudah dikelola, skalabel, dan memiliki performa yang optimal.

## Struktur Folder
```
TRIFTING/
├── app/
│   ├── Controllers/   
│   ├── Models/        
│   └── Views/         
├── assets/           
├── config/            
├── .htaccess         
└── index.php          
```

## Fitur Utama
- Sistem Login Multi-role: Membedakan hak akses antara Admin dan User.
- Manajemen Produk (CRUD): Admin dapat menambah, melihat, mengubah, dan menghapus data produk.
- Filter Pencarian: Memudahkan pengguna mencari produk berdasarkan nama atau kategori.
- Pagination: Pembatasan jumlah data per halaman untuk performa aplikasi yang lebih baik.
- Responsive Design: Antarmuka adaptif menggunakan Twitter Bootstrap (Mobile First).

## Add Product Picts
<img width="1919" height="994" alt="add_product" src="https://github.com/user-attachments/assets/ede84932-30b5-432b-8011-e7a963c6534f" />

## Edit Picts
<img width="1920" height="1128" alt="edit" src="https://github.com/user-attachments/assets/72e5ff62-08bc-4f5e-97f9-e8f6f4c51b2b" />

## Filter Searching
<img width="1920" height="1128" alt="filter_searching" src="https://github.com/user-attachments/assets/4ae2a420-dfbc-400b-ab98-0515b5844c05" />

## Sistem Login
<img width="1919" height="1000" alt="login" src="https://github.com/user-attachments/assets/4dd51a59-bf06-4b66-a837-9982ab634a48" />

## Pagination
<img width="428" height="75" alt="pagination(halaman)" src="https://github.com/user-attachments/assets/f8877d78-4ffa-4a34-9dbf-b2cf9578f216" />

## Notif Delete
<img width="929" height="466" alt="notif_delete" src="https://github.com/user-attachments/assets/062a162f-4c1b-4145-b72b-084773387565" />

------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Arsitektur & Teknologi
Aplikasi ini dirancang menggunakan prinsip modern web development:
1. MVC (Model-View-Controller):
   - Models: Mengelola logika database (sebagai contoh: Product.php, User.php).
   - Views: Mengelola tampilan antarmuka (sebagai contoh: folder products, layouts).
   - Controllers: Menghubungkan logika bisnis dengan tampilan (ProductController.php, AuthController.php).

2. OOP (Object-Oriented Programming): Penggunaan class dan method untuk modularitas kode yang tinggi.

3. Routing App & Clean URL: Implementasi custom routing melalui index.php dan konfigurasi .htaccess untuk URL yang lebih user-friendly.

4. Autoloading: Menggunakan spl_autoload_register untuk memuat class secara otomatis tanpa perlu require manual di banyak file.
