# QUICK START GUIDE - Aplikasi Pengaduan Sarana Sekolah

## 🚀 Memulai Aplikasi

### 1. Setup Awal
```bash
# Masuk ke folder project
cd c:\laragon\www\pengaduan_saranasekolah

# Install dependencies
composer install
npm install

# Copy env file
copy .env.example .env

# Generate APP_KEY (jika belum ada)
php artisan key:generate
```

### 2. Setup Database
```bash
# Jalankan migrations
php artisan migrate

# Setup seed data (opsional - untuk data demo)
php artisan db:seed
```

### 3. Jalankan Aplikasi
```bash
# Terminal 1: Jalankan Laravel server
php artisan serve

# Terminal 2: Jalankan npm dev (untuk asset monitoring)
npm run dev
```

Aplikasi akan berjalan di: **http://localhost:8000**

---

## 📝 Login Admin

**Email:** admin@sekolah.com  
**Password:** password

*Catatan: Data ini sesuai dengan database seeders jika Anda menjalankan `php artisan db:seed`*

---

## 📁 Struktur File yang Dibuat

### Controllers
- `app/Http/Controllers/AuthController.php` - Manajemen Login/Logout
- `app/Http/Controllers/DashboardController.php` - Dashboard Admin
- `app/Http/Controllers/AspirasiController.php` - CRUD Aspirasi
- `app/Http/Controllers/SiswaController.php` - CRUD Siswa
- `app/Http/Controllers/KategoriController.php` - CRUD Kategori

### Models
- `app/Models/Siswa.php` - Model Siswa
- `app/Models/Kategori.php` - Model Kategori
- `app/Models/Aspirasi.php` - Model Aspirasi

### Migrations
- `database/migrations/*_create_siswas_table.php`
- `database/migrations/*_create_kategoris_table.php`
- `database/migrations/*_create_aspirasis_table.php`

### Views
- `resources/views/layouts/app.blade.php` - Main layout
- `resources/views/auth/login.blade.php` - Login page
- `resources/views/dashboard.blade.php` - Dashboard
- `resources/views/aspirasi/` - Aspirasi views (index, create, edit, show)
- `resources/views/siswa/` - Siswa views (index, create, edit, show)
- `resources/views/kategori/` - Kategori views (index, create, edit)

### Routes
- `routes/web.php` - Semua routes aplikasi

---

## 🔑 Fitur Utama

### 1. Dashboard
- Menampilkan statistik total aspirasi
- Breakdown status: Menunggu, Proses, Selesai
- Total siswa terdaftar
- 5 aspirasi terbaru

### 2. Manajemen Aspirasi
**Create:** ID Pelaporan, Pilih Siswa, Pilih Kategori, Lokasi, Keterangan
**Read:** List tabel dengan pagination, filter status
**Update:** Edit semua field + ubah status
**Delete:** Hapus aspirasi

### 3. Manajemen Siswa
**Create:** NIS, Nama Siswa, Kelas, Email
**Read:** List dengan total aspirasi tiap siswa
**Update:** Edit semua data siswa
**Delete:** Hapus siswa (soft delete recommended)
**Detail:** Lihat semua aspirasi dari siswa

### 4. Manajemen Kategori
**Create:** Nama Kategori (Max 30 karakter)
**Read:** List dengan jumlah aspirasi
**Update:** Edit nama kategori
**Delete:** Hapus kategori

---

## 🗄️ Database Schema

### Tabel: siswas
| Field | Type | Constraint |
|-------|------|-----------|
| id | Bigint | PK, AI |
| nis | Integer | Unique |
| nama_siswa | String |  |
| kelas | String(10) |  |
| email | String | Nullable, Unique |
| created_at | Timestamp |  |
| updated_at | Timestamp |  |

### Tabel: kategoris
| Field | Type | Constraint |
|-------|------|-----------|
| id_kategori | Bigint | PK, AI |
| ket_kategori | String(30) | Unique |
| created_at | Timestamp |  |
| updated_at | Timestamp |  |

### Tabel: aspirasis
| Field | Type | Constraint |
|-------|------|-----------|
| id_aspirasi | Bigint | PK, AI |
| id_pelaporan | Integer | Unique |
| nis | Integer | FK → siswas.nis |
| id_kategori | Bigint | FK → kategoris.id_kategori |
| lokasi | String(50) |  |
| ket | String(50) |  |
| status | Enum | 'Menunggu', 'Proses', 'Selesai' |
| feedback | Integer | Nullable |
| created_at | Timestamp |  |
| updated_at | Timestamp |  |

---

## 🛣️ URL Routes

| Method | URL | Fungsi |
|--------|-----|--------|
| GET | / | Welcome page |
| GET | /login | Login form |
| POST | /login | Submit login |
| POST | /logout | Logout |
| GET | /dashboard | Dashboard |
| GET | /aspirasi | List aspirasi |
| GET | /aspirasi/create | Form tambah aspirasi |
| POST | /aspirasi | Submit aspirasi |
| GET | /aspirasi/{id} | Detail aspirasi |
| GET | /aspirasi/{id}/edit | Form edit aspirasi |
| PUT | /aspirasi/{id} | Update aspirasi |
| DELETE | /aspirasi/{id} | Hapus aspirasi |
| GET | /siswa | List siswa |
| GET | /siswa/create | Form tambah siswa |
| POST | /siswa | Submit siswa |
| GET | /siswa/{id} | Detail siswa |
| GET | /siswa/{id}/edit | Form edit siswa |
| PUT | /siswa/{id} | Update siswa |
| DELETE | /siswa/{id} | Hapus siswa |
| GET | /kategori | List kategori |
| GET | /kategori/create | Form tambah kategori |
| POST | /kategori | Submit kategori |
| GET | /kategori/{id}/edit | Form edit kategori |
| PUT | /kategori/{id} | Update kategori |
| DELETE | /kategori/{id} | Hapus kategori |

---

## 🐛 Troubleshooting

### Masalah: "Unknown database 'pengaduan_saranasekolah'"
```bash
# Periksa database di .env
php artisan migrate
```

### Masalah: "Whoops, looks like something went wrong"
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Setup ulang
php artisan migrate:refresh --seed
```

### Masalah: "Route not found"
```bash
# Clear route cache
php artisan route:clear
php artisan route:cache
```

### Masalah: Permission denied pada storage
```bash
# Windows - tidak perlu (skip)
# Linux/Mac
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

---

## 📦 Dependencies

### PHP Packages (Composer)
- laravel/framework ~11.0
- laravel/prompts ~0.1.0
- laravel/pint ~1.0
- laravel/tinker ~2.0
- PHP 8.2+

### JS/CSS Libraries
- Bootstrap 5.3.0 (CDN)
- Font Awesome 6.4.0 (CDN)
- jQuery (optional)

---

## 💡 Tips Pengembangan

1. **Validasi Data:** Pahami validation rules di controller
2. **Blade Templates:** Gunakan @if, @foreach, @include
3. **Eloquent Relationships:** Manfaatkan hasMany, belongsTo
4. **CSRF Protection:** Token otomatis di @csrf
5. **Authentication:** Middleware 'auth' untuk protect routes
6. **Pagination:** $paginate(10) untuk pagination otomatis

---

## 🔒 Fitur Keamanan

✅ CSRF Token di setiap form  
✅ Password hashing dengan bcrypt  
✅ SQL Injection prevention via Eloquent ORM  
✅ XSS prevention via Blade escaping  
✅ Input validation required  
✅ Authentication middleware  
✅ Authorization via middleware  

---

## 📞 Support

Untuk pertanyaan atau bantuan teknis, hubungi Tim IT Sekolah.

---

**Happy Coding! 🎉**
