# Tugas Akhir Widya - Data Indikator Kinerja Utama

## Instalasi
1. Buka Terminal. (ex: git bash, cmd, dll)
2. Clone repository ini menggunakan perintah `git clone https://github.com/widyasw/Data-IKU.git`
3. Change direktory menggunakan perintah `cd fwrk-category-iku`
4. Masukkan perintah `composer install` untuk menginstall data vendor
5. Masukkan perintah `cp .env.example .env` untuk menyalin file `.env`
6. Masukkan perintah `php artisan key:generate` untuk mengenerate APP_KEY
7. Masukkan perintah `php artisan migrate` untuk melakukan migrasi database
8. Jika terdapat inputan di terminal tulis `yes` kemudian enter
9. Masukkan perintah `php artisan db:seed` agar DatabaseSeeder dijalankan dan membuat data di database
10. Masukkan perintah `php artisan serve` untuk menjalankan server local agar aplikasi dapat diakses
