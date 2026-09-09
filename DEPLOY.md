# Panduan Deployment DESTINARA (destinara.id)

Panduan lengkap untuk melakukan deployment proyek **DESTINARA Company Profile** (Laravel 12 + Vite + Tailwind CSS + MySQL) ke **Hostinger hPanel** maupun **cPanel Shared Hosting**.

---

## 📋 Daftar Isi
1. [Persiapan Pra-Deploy (Build Assets)](#1-persiapan-pra-deploy)
2. [Deployment ke Hostinger hPanel](#2-deployment-ke-hostinger-hpanel)
   - [Metode 1: Menggunakan Git Deployment (Direkomendasikan)](#metode-1-git-deployment-hpanel)
   - [Metode 2: Upload File Manager / ZIP](#metode-2-upload-file-manager--zip)
   - [Pengaturan Document Root di Hostinger](#pengaturan-document-root-di-hostinger)
   - [Setup Database MySQL di Hostinger](#setup-database-mysql-di-hostinger)
   - [Setup Storage & Permission](#setup-storage--permission)
   - [Optimasi & Cache](#optimasi--cache)
3. [Deployment ke cPanel (Shared Hosting)](#3-deployment-ke-cpanel-shared-hosting)
   - [Menggunakan cPanel Git Version Control & `.cpanel.yml`](#cpanel-git-version-control)
   - [Setup Database di cPanel](#setup-database-di-cpanel)
4. [Manajemen Multi-Environment (.env)](#4-manajemen-multi-environment)
5. [Akun Default Admin Destinara](#5-akun-default-admin-destinara)

---

## 1. Persiapan Pra-Deploy

Sebelum mengunggah ke server hosting (terutama jika server shared hosting tidak memiliki Node.js):
Jalankan perintah build asset di komputer lokal:

```bash
npm run build
```
Folder `public/build/` yang berisi compiled CSS & JS harus disertakan/di-push ke Git repo atau di-upload.

---

## 2. Deployment ke Hostinger hPanel

### Rekomendasi Versi PHP
- Buka hPanel -> **PHP Configuration**.
- Pastikan versi PHP diset ke **PHP 8.2** atau **PHP 8.3**.
- Pastikan ekstensi berikut aktif: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `curl`, `fileinfo`, `gd`.

---

### Metode 1: Git Deployment hPanel
1. Buka hPanel -> pilih domain **destinara.id**.
2. Masuk ke menu **Git** (di bawah menu *Advanced*).
3. Buat repositori baru:
   - **Repository URL**: Masukkan URL Git (GitHub / GitLab repo Anda).
   - **Branch**: `main` atau `master` (atau `feat-beckend-laravel`).
   - **Install Path**: Biarkan default atau arahkan ke root folder hosting Anda (misal: `/public_html` atau subfolder `/destinara-app`).
4. Klik **Create** dan jalankan **Deploy**.

---

### Metode 2: Upload File Manager / ZIP
Jika tidak menggunakan Git:
1. Di komputer lokal, compress semua folder proyek ke file `.zip` **KECUALI**:
   - `node_modules/`
   - `.git/`
   - `.env`, `.env.development`, `.env.staging` (Gunakan `.env.production` sebagai acuan `.env` di server)
2. Buka hPanel -> **File Manager**.
3. Upload file ZIP ke direktori hosting dan ekstrak.

---

### Pengaturan Document Root di Hostinger
Aplikasi Laravel menggunakan folder `public/` sebagai entry point (`index.php`).

#### Opsi A: Mengubah Document Root Domain (Terbaik)
1. Di hPanel Hostinger, buka menu **Websites** -> pilih **destinara.id** -> **Website Details**.
2. Cari konfigurasi **Directory / Document Root**.
3. Ubah target document root menjadi:
   ```
   public_html/public
   ```
4. Simpan perubahan. Website akan langsung membuka `public/index.php`.

#### Opsi B: Memindahkan Isi `public/` ke `public_html` (Jika Root Tidak Bisa Diubah)
Jika struktur hosting berada di subfolder luar `public_html`:
1. Simpan folder kode Laravel di luar root: misal `/home/u12345678/destinara_repo/`.
2. Pindahkan seluruh isi folder `public/*` ke dalam folder `/home/u12345678/public_html/`.
3. Buka file `/home/u12345678/public_html/index.php` dan ubah 2 baris path:
   ```php
   // Dari:
   require __DIR__.'/../vendor/autoload.php';
   $app = require_once __DIR__.'/../bootstrap/app.php';

   // Menjadi:
   require __DIR__.'/../destinara_repo/vendor/autoload.php';
   $app = require_once __DIR__.'/../destinara_repo/bootstrap/app.php';
   ```

---

### Setup Database MySQL di Hostinger
1. Buka hPanel -> **Databases** -> **MySQL Databases**.
2. Buat database baru:
   - **MySQL Database Name**: misal `u12345678_destinara`
   - **MySQL Username**: misal `u12345678_destinara`
   - **Password**: Buat password yang kuat.
3. Edit file `.env` di File Manager hPanel dengan kredensial tersebut:
   ```env
   APP_NAME="Destinara"
   APP_ENV=production
   APP_KEY=base64:YOUR_APP_KEY_HERE
   APP_DEBUG=false
   APP_URL=https://destinara.id

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=u12345678_destinara
   DB_USERNAME=u12345678_destinara
   DB_PASSWORD=PasswordDatabaseAnda
   ```
4. Buka **SSH Access** di hPanel (atau via phpMyAdmin):
   Jalankan migrasi & seeder data awal:
   ```bash
   php artisan migrate --force --seed
   ```

---

### Setup Storage & Permission
Agar upload gambar destinasi/cerita berfungsi dengan baik:
1. Buat symlink storage publik via SSH:
   ```bash
   php artisan storage:link
   ```
   *(Atau buat shortcut/sinkronisasi dari `storage/app/public` ke folder `public/storage`)*.
2. Berikan izin tulis (write permission):
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

---

### Optimasi & Cache
Setelah aplikasi terpasang di production, jalankan perintah optimasi:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
Untuk mengosongkan cache jika ada perubahan:
```bash
php artisan optimize:clear
```

---

## 3. Deployment ke cPanel (Shared Hosting)

### cPanel Git Version Control
Proyek ini sudah dilengkapi file `.cpanel.yml` otomatis.

1. Login ke **cPanel**.
2. Masuk ke menu **Git™ Version Control**.
3. Klik **Create Repository**:
   - Clone URL: Masukkan link GitHub/GitLab repo Destinara.
   - Repository Path: `/home/username/repositories/destinara`
   - Repository Name: `destinara`
4. Klik **Create**.
5. Masuk ke tab **Manage** -> klik **Deploy HEAD Commit**. File `.cpanel.yml` akan otomatis:
   - Menyalin folder `public/*` ke `public_html`.
   - Mengarahkan `index.php` ke repository Laravel.
   - Menyinkronkan folder `storage` fisik (mencegah symlink diblokir Apache).
   - Menjalankan `php artisan optimize:clear` dan cache optimasi.

---

### Setup Database di cPanel
1. Buka cPanel -> **MySQL Database Wizard**.
2. Buat database, username, dan password.
3. Hubungkan user ke database dengan checklist **ALL PRIVILEGES**.
4. Di file `.env` repositori:
   - Isi `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
5. Buka **Terminal** di cPanel dan jalankan:
   ```bash
   cd /home/username/repositories/destinara
   php artisan migrate --force --seed
   ```

---

## 4. Manajemen Multi-Environment

Proyek ini telah dikonfigurasi dengan beberapa template `.env` sesuai peruntukannya (semuanya telah diamankan di `.gitignore`):

| File | Kegunaan | APP_URL | APP_DEBUG |
|------|----------|---------|-----------|
| `.env.development` | Lingkungan dev lokal (Port 8030) | `http://127.0.0.1:8030` | `true` |
| `.env.staging` | Server UAT / Pengetesan Staging | `https://staging.destinara.id` | `false` |
| `.env.production` | Server Live Hosting | `https://destinara.id` | `false` |
| `.env.example` | Template publik untuk repositori Git | `http://127.0.0.1:8030` | `true` |

Untuk berganti environment secara manual:
```bash
cp .env.development .env   # untuk local
cp .env.staging .env       # untuk staging
cp .env.production .env    # untuk production
```

---

## 5. Akun Default Admin Destinara

Setelah menjalankan `php artisan migrate --seed`:

- **URL Dashboard Admin**: `https://destinara.id/admin` (atau `http://127.0.0.1:8030/admin`)
- **Email**: `admin@destinara.id`
- **Password**: `admin123`

> ⚠️ **PENTING**: Segera ganti password dan email admin di menu pengaturan setelah website live di production!
