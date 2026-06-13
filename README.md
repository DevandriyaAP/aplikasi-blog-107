 📰 Laravel Blog CMS

 👤 Informasi Pengembang
- Nama Lengkap: DEVANDRIYA ATHALLAH PUTRAYANA
- NIM: 240605110107

---

 📋 Deskripsi Aplikasi

Laravel Blog CMS adalah aplikasi web modern yang dibangun menggunakan framework Laravel untuk mengelola blog dengan fitur admin CMS lengkap. Aplikasi ini memungkinkan administrator untuk mengelola artikel, kategori, dan penulis, sementara pengunjung dapat membaca artikel dengan fitur filtering kategori dan rekomendasi artikel terkait.

 Fitur Utama:
- ✅ Admin Panel CMS - Kelola artikel, kategori, dan penulis
- ✅ CRUD Operations - Create, Read, Update, Delete untuk semua resource
- ✅ Authentication - Login/Register dengan email verification
- ✅ Public Blog Page - Tampilan artikel untuk pengunjung
- ✅ Category Filter - Saring artikel berdasarkan kategori
- ✅ Related Articles - Saran artikel dari kategori yang sama
- ✅ Responsive Design - Bootstrap 5 UI yang mobile-friendly
- ✅ Image Upload - Upload gambar untuk artikel dan profil penulis

---

 🛠️ Teknologi yang Digunakan

- Backend: Laravel 11, PHP 8.2
- Database: MySQL
- Frontend: Bootstrap 5, Blade Templating
- Authentication: Laravel Breeze
- Version Control: Git & GitHub

---

 📦 Requirements

Pastikan Anda sudah menginstall:
- PHP 8.2 atau lebih tinggi
- Composer
- MySQL Server
- Git
- XAMPP (untuk development lokal)

---

 🚀 Langkah-Langkah Menjalankan Aplikasi Secara Lokal

 1. Clone Repository
bash
git clone https://github.com/username/repo-name.git
cd "WEB PRO"

 2. Instalasi Dependencies
bash
composer install


 3. Setup Environment
bash
Copy file .env
cp .env.example .env

Generate APP_KEY
php artisan key:generate


 4. Konfigurasi Database
Edit file `.env` dan sesuaikan dengan konfigurasi MySQL Anda:
env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
```

 5. Jalankan Migration & Seeding
bash
 Buat tabel di database
php artisan migrate

Populate dengan sample data
php artisan db:seed

 6. Mulai Development Server
bash
php artisan serve


Server akan berjalan di: http://127.0.0.1:8000

---

 📝 Akun Demo

 Admin Account:
| Email | Password |
|-------|----------|
| test@example.com | password |

Atau gunakan akun lain yang tersedia di seeder.

---

 📂 Struktur Project

```
WEB PRO/
├── app/
│   ├── Http/Controllers/
│   │   ├── ArtikelController.php
│   │   ├── ArtikelPublicController.php
│   │   ├── KategoriArtikelController.php
│   │   └── PenulisController.php
│   └── Models/
│       ├── Artikel.php
│       ├── KategoriArtikel.php
│       ├── Penulis.php
│       └── User.php
├── resources/
│   ├── views/
│   │   ├── artikel/          # Admin views untuk artikel
│   │   ├── kategori_artikel/ # Admin views untuk kategori
│   │   ├── penulis/          # Admin views untuk penulis
│   │   ├── publik/           # Public views
│   │   └── auth/             # Login/Register views
│   └── css/
├── routes/
│   ├── web.php
│   └── auth.php
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── css/
│   ├── js/
│   └── uploads/              # Folder untuk upload gambar
├── .env.example
├── composer.json
└── README.md
```

---

 🔗 URL Penting

 Admin Panel:
- Dashboard: `http://127.0.0.1:8000/dashboard`
- Manajemen Artikel: `http://127.0.0.1:8000/artikel`
- Manajemen Kategori: `http://127.0.0.1:8000/kategori-artikel`
- Manajemen Penulis: `http://127.0.0.1:8000/penulis`

Public Page:
- Homepage: `http://127.0.0.1:8000`
- Lihat Artikel: `http://127.0.0.1:8000/artikel/{id}`
- Filter Kategori: `http://127.0.0.1:8000?kategori={kategori_id}`

 Authentication:
- Login: `http://127.0.0.1:8000/login`
- Register: `http://127.0.0.1:8000/register`

---

 🎯 Fitur yang Sudah Diimplementasikan

Admin Panel:
- [x] Authentication & Login
- [x] Dashboard dengan statistik
- [x] CRUD Penulis (Create, Read, Update, Delete)
- [x] CRUD Kategori Artikel
- [x] CRUD Artikel
- [x] Profile Management
- [x] Upload Gambar

Public Blog:
- [x] Tampilan Beranda dengan 5 artikel terbaru
- [x] Filter artikel berdasarkan kategori
- [x] Halaman detail artikel lengkap
- [x] Widget artikel terkait dari kategori sama
- [x] Navigasi breadcrumb
- [x] Responsive design untuk mobile

---

📊 Data Default (Seeder)

Saat menjalankan `php artisan db:seed`, data berikut akan ditambahkan:

Kategori:
- Teknologi (3 artikel)
- Desain (1 artikel)
- Bisnis (1 artikel)

Penulis:
- Siti Developer (siti.developer@example.com)
- Ahmed Desainer (ahmed.designer@example.com)
- Budi Strategist (budi.strategist@example.com)

Artikel:
- 5 artikel dengan konten lengkap

---

🐛 Troubleshooting

Error: `SQLSTATE[HY000]: General error`
Solusi: 
bash
php artisan config:cache
php artisan cache:clear


Error: File upload gagal
Solusi: 
- Pastikan folder `storage/` dan `public/uploads/` ada permission write
- Jalankan: `chmod -R 755 storage/public`

Error: Database tidak terhubung
Solusi:
- Pastikan MySQL sudah running
- Cek file `.env` sudah benar
- Jalankan: `php artisan migrate:fresh --seed`

---

📄 Lisensi

MIT License - Bebas digunakan untuk keperluan akademis dan komersial

---

📞 Kontak & Support

Untuk pertanyaan atau issues, silakan buat GitHub Issue atau hubungi:
- Email: devandriya@example.com
- GitHub: https://github.com/DevandriyaAP
- Youtube: https://youtu.be/0G9MnEv91aQ

---

Terakhir diupdate: 13 Juni 2026

