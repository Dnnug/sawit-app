# 🌿 SawitManager - Sistem Informasi Manajemen Perkebunan

SawitManager adalah aplikasi berbasis web yang dirancang untuk membantu pemilik atau pengelola perkebunan sawit dalam mencatat operasional harian, memantau produksi, dan menganalisis kesehatan finansial kebun secara real-time.

## 🚀 Fitur Utama

- **Dashboard Dinamis**: Ringkasan produksi (Tonase), Estimasi Omzet, Total Biaya, dan Laba Bersih.
- **Manajemen Blok**: Pengelolaan data lahan/blok kebun beserta luas areanya.
- **Log Panen**: Pencatatan hasil panen harian per blok (Berat TBS & Jumlah Pekerja).
- **Manajemen Keuangan**: Pencatatan pengeluaran operasional (Pupuk, Gaji, Pestisida, dll).
- **Harga TBS Harian**: Input harga pasar harian untuk kalkulasi pendapatan otomatis.
- **Kalkulasi Revenue Otomatis**: Sistem menjodohkan tanggal panen dengan harga harian untuk menghitung omzet secara akurat.

## 🛠️ Tech Stack

- **Framework**: [Laravel 11](https://laravel.com)
- **Frontend**: [Tailwind CSS](https://tailwindcss.com) & [Blade Templating](https://laravel.com/docs/11.x/blade)
- **Authentication**: [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)
- **Database**: MySQL / MariaDB

## 📦 Cara Instalasi

1. **Clone Repository**
    ```bash
    git clone [https://github.com/username/sawit-manager.git](https://github.com/username/sawit-manager.git)
    cd sawit-manager
    ```
2. **Instal Dependency**
   composer install
   npm install && npm run build
3. **Lakukan Konfigurasi .env**
   copy paste(cp) .env.example .env
   php artisan key:generate
4. **Lakukan Migrasi**
   php artisan migrate
5. **Run Aplikasi**
   php artisan serve

    atau laragon
    -arahkan kursor ke bawah kanan -> jika ada logo, klik kanan lalu arahkan ke www -> pilih nama foldernya |
    -> jika tidak ada, klik tanda panah, klik kanan pada logo , arahkan ke www -> pilih nama foldernya

## Kontribusi

Project ini dibangun hanya untuk proses pembelajaran dalam melakukan development menggunakan framework Laravel. Jika ada saran yang harus disampaikan silahkan berikan melalui Pull Request

## Author

Daniswara
