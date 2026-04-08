# ✅ SETUP CHECKLIST - Aplikasi Pengaduan Sarana Sekolah

Gunakan checklist ini untuk memastikan semua komponen aplikasi sudah dikonfigurasi dengan benar.

---

## 📋 PRE-INSTALLATION

- [ ] PHP 8.2+ sudah terinstall
- [ ] Composer sudah terinstall
- [ ] Node.js & npm sudah terinstall
- [ ] MySQL/MariaDB sudah running (atau gunakan SQLite)
- [ ] Code editor (VS Code, PhpStorm, dll.) sudah siap
- [ ] Terminal/Command Prompt bisa diakses

---

## 🔧 PROJECT SETUP

- [ ] Clone/download project ke folder `c:\laragon\www\pengaduan_saranasekolah`
- [ ] Run `composer install` di folder project
- [ ] Run `npm install` di folder project
- [ ] Copy `.env.example` ke `.env`
- [ ] Update database config di `.env`:
  - `DB_HOST=127.0.0.1`
  - `DB_PORT=3306`
  - `DB_DATABASE=pengaduan_saranasekolah`
  - `DB_USERNAME=root`
  - `DB_PASSWORD=` (kosong atau sesuai config Laragon)
- [ ] Run `php artisan key:generate` jika APP_KEY kosong

---

## 🗄️ DATABASE SETUP

- [ ] Buat database baru dengan nama `pengaduan_saranasekolah`
  - Buka phpMyAdmin atau MySQL CLI
  - `CREATE DATABASE pengaduan_saranasekolah;`
- [ ] Run migrations: `php artisan migrate`
- [ ] Run seeders (optional): `php artisan db:seed`
- [ ] Verifikasi tables sudah ada di database:
  - [ ] `users`
  - [ ] `siswas`
  - [ ] `kategoris`
  - [ ] `aspirasis`

---

## 📁 FILE STRUCTURE VERIFICATION

**Controllers** (ada di `app/Http/Controllers/`):
- [ ] `AuthController.php`
- [ ] `DashboardController.php`
- [ ] `AspirasiController.php`
- [ ] `SiswaController.php`
- [ ] `KategoriController.php`

**Models** (ada di `app/Models/`):
- [ ] `User.php`
- [ ] `Siswa.php`
- [ ] `Kategori.php`
- [ ] `Aspirasi.php`

**Migrations** (ada di `database/migrations/`):
- [ ] `*_create_users_table.php`
- [ ] `*_create_cache_table.php`
- [ ] `*_create_jobs_table.php`
- [ ] `*_create_siswas_table.php`
- [ ] `*_create_kategoris_table.php`
- [ ] `*_create_aspirasis_table.php`

**Views** (ada di `resources/views/`):
- [ ] `layouts/app.blade.php`
- [ ] `auth/login.blade.php`
- [ ] `dashboard.blade.php`
- [ ] `aspirasi/index.blade.php`
- [ ] `aspirasi/create.blade.php`
- [ ] `aspirasi/edit.blade.php`
- [ ] `aspirasi/show.blade.php`
- [ ] `siswa/index.blade.php`
- [ ] `siswa/create.blade.php`
- [ ] `siswa/edit.blade.php`
- [ ] `siswa/show.blade.php`
- [ ] `kategori/index.blade.php`
- [ ] `kategori/create.blade.php`
- [ ] `kategori/edit.blade.php`

**Routes** (ada di `routes/`):
- [ ] `web.php` - sudah update dengan semua routes

**Documentation**:
- [ ] `DOKUMENTASI.md`
- [ ] `QUICK_START.md`
- [ ] `SETUP_CHECKLIST.md`

---

## 🚀 RUNNING APPLICATION

### Terminal 1 - Laravel Server
```bash
php artisan serve
```
- [ ] Server berjalan di `http://localhost:8000`
- [ ] Tidak ada error di console

### Terminal 2 - Asset Compilation (Optional)
```bash
npm run dev
```
- [ ] Asset watching jalan dengan baik

---

## 🔐 AUTHENTICATION TEST

- [ ] Akses `http://localhost:8000/login`
- [ ] Login dengan:
  - Email: `admin@sekolah.com`
  - Password: `password`
- [ ] Redirect ke dashboard berhasil
- [ ] Can see "Pengaduan Sarana Sekolah" title
- [ ] Sidebar menu terbuka dengan benar

---

## 📊 DASHBOARD TEST

- [ ] Dashboard page loading
- [ ] Statistik cards muncul:
  - [ ] Total Aspirasi
  - [ ] Menunggu count
  - [ ] Proses count
  - [ ] Selesai count
  - [ ] Total Siswa
- [ ] Tabel aspirasi terbaru muncul
- [ ] Tidak ada JavaScript error di browser console

---

## 👥 SISWA MODULE TEST

- [ ] Buka `/siswa` page
- [ ] List siswa ditampilkan dengan pagination
- [ ] Kolom: NIS, Nama, Kelas, Email, Total Aspirasi, Aksi
- [ ] Tombol "Tambah Siswa" tersedia
- [ ] Click "Tambah Siswa" → form muncul
- [ ] Fill form & save → siswa baru terdata
- [ ] View detail siswa → aspirasi siswa ditampilkan
- [ ] Edit siswa → update berhasil
- [ ] Delete siswa → konfirmasi & delete berhasil

---

## 📂 KATEGORI MODULE TEST

- [ ] Buka `/kategori` page
- [ ] List kategori ditampilkan dengan pagination
- [ ] Kolom: ID, Nama Kategori, Total Aspirasi, Aksi
- [ ] Tombol "Tambah Kategori" tersedia
- [ ] Click "Tambah Kategori" → form muncul
- [ ] Fill form & save → kategori baru terdata
- [ ] Edit kategori → update berhasil
- [ ] Delete kategori → konfirmasi & delete berhasil

---

## 💬 ASPIRASI MODULE TEST

- [ ] Buka `/aspirasi` page
- [ ] List aspirasi ditampilkan dengan pagination
- [ ] Kolom: ID Pelaporan, Nama Siswa, Kategori, Lokasi, Status, Tanggal, Aksi
- [ ] Status badge: 3 warna berbeda (menunggu, proses, selesai)
- [ ] Tombol "Tambah Aspirasi" tersedia
- [ ] Click "Tambah Aspirasi" → form muncul dengan:
  - [ ] Dropdown siswa
  - [ ] Dropdown kategori
  - [ ] Input lokasi
  - [ ] Input keterangan
- [ ] Save aspirasi baru → redirect ke list
- [ ] View detail aspirasi → info lengkap & siswa info
- [ ] Edit aspirasi → update semua field + status
- [ ] Delete aspirasi → konfirmasi & delete berhasil

---

## 🔄 NAVIGATION TEST

- [ ] Home link di navbar → welcome page
- [ ] Dashboard link → dashboard page
- [ ] Sidebar menu links → correct pages
- [ ] Pagination links → correct pages
- [ ] Breadcrumb (jika ada) → correct path
- [ ] Logout → redirect ke login page

---

## 🎨 UI/UX TEST

- [ ] Layout responsive (test di mobile/tablet view)
- [ ] Sidebar collapse di mobile
- [ ] Forms valid styling (success/error messages)
- [ ] Tables scrollable di mobile
- [ ] Buttons clickable & hover effects work
- [ ] Colors consistent (blue theme)
- [ ] Icons from Font Awesome load correctly
- [ ] Bootstrap classes applied correctly

---

## ⚠️ ERROR HANDLING TEST

- [ ] Non-existent route → 404 page
- [ ] Invalid form data → validation errors shown
- [ ] Duplicate ID → validation error shown
- [ ] Missing required field → validation error shown
- [ ] Database error → graceful error handling
- [ ] Check error logs: `storage/logs/laravel.log`

---

## 🔒 SECURITY TEST

- [ ] CSRF token in forms (view source, check `_token`)
- [ ] Password encrypted in database
- [ ] Can't access protected routes without login
- [ ] Logout invalidates session
- [ ] Protected routes redirect to login
- [ ] Input sanitization working
- [ ] SQL injection prevention (use Eloquent)

---

## 📝 DATA VALIDATION TEST

### Siswa Module
- [ ] NIS required & integer
- [ ] Nama Siswa required & string
- [ ] Kelas required & max 10 char
- [ ] Email optional & valid email format
- [ ] NIS unique check working

### Kategori Module
- [ ] Nama Kategori required & string
- [ ] Max 30 characters enforced
- [ ] Unique category names enforced

### Aspirasi Module
- [ ] ID Pelaporan required & unique
- [ ] Siswa selection required
- [ ] Kategori selection required
- [ ] Lokasi required & max 50 char
- [ ] Keterangan required & max 50 char
- [ ] Status enum validation
- [ ] Feedback optional & integer

---

## 🎯 FINAL TESTS

- [ ] Clear browser cache & cookies
- [ ] Fresh login → all works
- [ ] Create test data → complete CRUD cycle
- [ ] Logout → session cleared
- [ ] Login again → can access
- [ ] No console errors or warnings
- [ ] No duplicate/orphaned databases
- [ ] Backup database (optional)

---

## 📋 DEPLOYMENT CHECKLIST (Future)

- [ ] Production `.env` configured
- [ ] Database backups setup
- [ ] Error logging configured
- [ ] Email notifications setup
- [ ] Session storage configured
- [ ] Cache driver configured
- [ ] Security headers added
- [ ] SSL certificate setup
- [ ] Rate limiting configured
- [ ] Database indexing optimized

---

## 🚨 TROUBLESHOOTING REFERENCE

Jika ada error, cek:

1. **Database Connection Error**
   - Verify `.env` database config
   - Check MySQL is running
   - Run `php artisan migrate`

2. **Route Not Found**
   - Run `php artisan route:clear`
   - Check `routes/web.php`

3. **Class Not Found**
   - Run `composer dump-autoload`
   - Check namespace in file

4. **View Not Found**
   - Check blade file exists in `resources/views/`
   - Check return statement in controller

5. **CSRF Token Mismatch**
   - Clear browser cookies
   - Check `@csrf` in form
   - Verify session middleware

6. **Permission Issues**
   - Check file ownership
   - Verify read/write permissions

---

## ✨ SETUP COMPLETE!

Jika semua checkbox sudah ✅, aplikasi Anda siap digunakan! 🎉

**Selamat menggunakan Aplikasi Pengaduan Sarana Sekolah!**

---

**Last Updated:** 8 April 2026  
**Version:** 1.0.0
