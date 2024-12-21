Panduan Menjalankan Aplikasi Laravel dari Git ke Lokal

Panduan ini akan membantu Anda untuk menjalankan aplikasi Laravel yang diambil dari GitHub ke lingkungan lokal Anda. Langkah-langkah berikut ini menjelaskan cara meng-clone repository, mengonfigurasi aplikasi, dan menjalankannya dengan MySQL sebagai database.
Prasyarat

Pastikan Anda sudah menginstal perangkat lunak berikut di komputer lokal Anda:

    -PHP (Versi 8.1 atau lebih tinggi)
    -Composer (Manajer dependensi PHP)
    -MySQL atau MariaDB
    -Git (Untuk meng-clone repository)
    -Web Server (Nginx/Apache, atau menggunakan server built-in Laravel)

Langkah-langkah Menjalankan Aplikasi
1. Clone Repository dari Git

Pertama-tama, Anda harus meng-clone repository Laravel yang ada di GitHub ke komputer lokal Anda. Buka terminal dan jalankan perintah berikut (gantilah username/repository-name dengan URL repository Anda):

git@github.com:arbirudiansah/logistik-arbi.git

Setelah repository berhasil di-clone, masuk ke direktori aplikasi:

cd repository-name

2. Install Dependensi Laravel

Laravel menggunakan Composer untuk mengelola dependensi. Setelah meng-clone repository, jalankan perintah berikut untuk menginstal semua dependensi yang dibutuhkan oleh aplikasi:

composer install

Perintah ini akan membaca file composer.json dan mengunduh package yang dibutuhkan.
3. Konfigurasi File .env

Laravel menggunakan file .env untuk menyimpan konfigurasi lingkungan, seperti pengaturan database. Anda perlu menyalin file .env.example menjadi .env dan mengonfigurasi pengaturan database MySQL di dalamnya:

cp .env.example .env

Buka file .env menggunakan editor teks dan sesuaikan pengaturan database MySQL Anda. Berikut adalah contoh pengaturan database:

    -DB_CONNECTION=mysql
    -DB_HOST=127.0.0.1
    -DB_PORT=3306
    -DB_DATABASE=db_logistik_arbi
    -DB_USERNAME=root
    -DB_PASSWORD=

Gantilah nama_database, nama_pengguna, dan password_anda dengan kredensial MySQL yang sesuai.
4. Generate Application Key

Laravel memerlukan application key untuk enkripsi dan perlindungan data. Anda dapat menghasilkan key ini dengan menjalankan perintah berikut:

php artisan key:generate

Perintah ini akan menghasilkan key dan menambahkannya secara otomatis ke file .env.
5. Migrasi Database

Setelah mengonfigurasi database, Anda perlu menjalankan migrasi untuk membuat tabel yang diperlukan di dalam database. Jalankan perintah berikut:

php artisan migrate

Jika aplikasi menggunakan seeding untuk memasukkan data awal, Anda juga dapat menjalankan perintah berikut setelah migrasi:

php artisan db:seed

6. Jalankan Aplikasi Laravel

Setelah semua pengaturan selesai, Anda dapat menjalankan aplikasi Laravel menggunakan server built-in yang disediakan oleh Laravel:

php artisan serve

Secara default, aplikasi akan berjalan di http://127.0.0.1:8000.

Jika Anda menggunakan server web seperti Apache atau Nginx, pastikan untuk mengonfigurasi server tersebut untuk mengarahkan ke folder public/ di dalam aplikasi Laravel.
Masalah Umum dan Solusi
1. Gagal Koneksi ke Database

    Pastikan MySQL berjalan di komputer lokal Anda.
    Periksa kembali pengaturan DB_HOST, DB_USERNAME, DB_PASSWORD, dan DB_DATABASE di file .env.
    Jika menggunakan Docker atau kontainer, pastikan aplikasi dan database berada dalam jaringan yang sama.

2. Migrasi Gagal

    Jika migrasi gagal, pastikan database sudah ada dan konfigurasi MySQL benar.
    Coba reset migrasi dan jalankan kembali:

    php artisan migrate:reset
    php artisan migrate

3. Masalah Autoload Composer

    Jika ada masalah terkait autoloading, jalankan perintah berikut untuk memperbarui autoload Composer:

    composer dump-autoload

Langkah Selanjutnya

    Setelah aplikasi berjalan, Anda dapat mulai mengonfigurasi fitur lain seperti queue, schedule, atau middleware sesuai kebutuhan.
    Jika Anda bekerja dengan tim, pastikan file .env sudah dikonfigurasi dengan benar atau menggunakan file .env.example untuk berbagi pengaturan environment.
