# IMS Finance - Portal Perusahaan

Solusi terintegrasi untuk manajemen pembiayaan dan angsuran.

## Tentang Proyek

**IMS Finance Corporate Portal** adalah sebuah aplikasi web yang dirancang untuk memfasilitasi perusahaan pembiayaan dalam mengelola data dan simulasi angsuran nasabah. Aplikasi ini menyediakan antarmuka yang sederhana dan fungsional untuk melakukan perhitungan-perhitungan kunci yang sering dibutuhkan dalam operasional sehari-hari.

## Prasyarat

Pastikan Anda memiliki perangkat lunak berikut terinstal di sistem Anda:

*   **Web Server Stack:** XAMPP / WAMP / MAMP atau sejenisnya.
    *   PHP >= 7.4
    *   MySQL / MariaDB
    *   Apache

## Instalasi & Menjalankan

1.  **Clone atau Unduh Repositori**
    Jika menggunakan git, clone repositori ini. Jika tidak, unduh dan ekstrak file proyek.

2.  **Pindahkan ke Direktori Web Server**
    Pindahkan folder proyek ke dalam direktori `htdocs` (untuk XAMPP) atau `www` (untuk WAMP). Seharusnya terlihat seperti `C:\xampp\htdocs\IMS-Finance_dev`.

3.  **Setup Database**
    *   Buka phpMyAdmin atau klien database pilihan Anda.
    *   Buat database baru dengan nama `ims`.
    *   Pilih database `ims` yang baru dibuat, lalu impor skema dan data dari file `service/ims.sql`.

4.  **Konfigurasi Koneksi Database**
    *   Buka file `service/db.php` dengan editor teks.
    *   Pastikan konfigurasi koneksi sudah sesuai dengan pengaturan database Anda. Pengaturan defaultnya adalah:
    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ims";
    ```

5.  **Akses Aplikasi**
    Buka browser Anda dan kunjungi alamat `http://localhost/IMS-Finance_dev/`.

## Penggunaan

Aplikasi ini memiliki tiga modul utama yang dapat diakses dari halaman utama:

1.  **Menghitung Angsuran**: Untuk membuat simulasi angsuran bulanan.
2.  **Cek Angsuran Jatuh Tempo**: Untuk melihat daftar angsuran yang sudah jatuh tempo.
3.  **Perhitungan Denda**: Untuk menghitung denda keterlambatan pembayaran.