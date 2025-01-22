# Panduan Setup Proyek Laravel

Panduan ini akan membantu Anda untuk menyiapkan proyek Laravel setelah mengkloningnya dari GitHub. Ikuti langkah-langkah berikut untuk memastikan semuanya terkonfigurasi dengan benar.

## Prasyarat

Pastikan hal-hal berikut sudah terinstal di sistem Anda:

- **PHP** (versi yang dibutuhkan oleh proyek, misalnya PHP 8.1 atau lebih baru)
- **Composer**
- **Git**
- **MySQL**

## Langkah-langkah untuk Mengkloning dan Menyiapkan Proyek

### 1. Kloning Repository

Kloning proyek Laravel dari GitHub menggunakan perintah berikut:

```bash
git clone https://github.com/MuhamadPerdi/Simulasi_Ukk.git
```

Masuk ke direktori proyek:

```bash
cd Simulasi_Ukk
```

### 2. Instal Dependensi

Jalankan Composer untuk menginstal dependensi PHP:

```bash
composer install
```

### 3. Konfigurasi Lingkungan

Salin file `.env.example` untuk membuat file `.env` baru:

```bash
cp .env.example .env
```

Hasilkan kunci aplikasi:

```bash
php artisan key:generate
```

### 4. Konfigurasi Basis Data

Perbarui file `.env` dengan kredensial basis data Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_anda
DB_PASSWORD=password_anda
```

### 5. Jalankan Migrasi

Jalankan perintah berikut untuk membuat tabel basis data:

```bash
php artisan migrate
```

jalankan juga perintah berikut untuk mengisi data awal:

```bash
php artisan db:seed --class=UserSeeder
```

### 6. Jalankan Server Pengembangan

Jalankan server pengembangan Laravel:

```bash
php artisan serve
```

Akses proyek di browser Anda di `http://127.0.0.1:8000`.

---

Jika Anda menghadapi masalah, jangan ragu untuk membuka **issue** di repository GitHub atau hubungi pengembang proyek. Selamat mencoba!

