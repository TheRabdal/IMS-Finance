
<div align="center">
  <a href="#">
    <img src="https://via.placeholder.com/200x150.png?text=Logo+Proyek" alt="Logo" width="200" height="150">
  </a>

  <h3 align="center">IMS Finance - Portal Perusahaan</h3>

  <p align="center">
    Solusi terintegrasi untuk manajemen pembiayaan dan angsuran.
    <br />
    <a href="#"><strong>Jelajahi Dokumentasi »</strong></a>
    <br />
    <br />
    <a href="#">Laporkan Bug</a>
    ·
    <a href="#">Minta Fitur Baru</a>
  </p>
</div>

<!-- SHIELDS -->
<div align="center">
  <a href="#"><img src="https://img.shields.io/badge/build-passing-brightgreen.svg" alt="Build Status"></a>
  <a href="#"><img src="https://img.shields.io/badge/coverage-85%25-yellow.svg" alt="Coverage"></a>
  <a href="#"><img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License"></a>
  <a href="#"><img src="https://img.shields.io/badge/php-%3E%3D7.4-blueviolet.svg" alt="PHP Version"></a>
</div>
<hr>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Daftar Isi</summary>
  <ol>
    <li>
      <a href="#tentang-proyek">Tentang Proyek</a>
      <ul>
        <li><a href="#dibangun-dengan">Dibangun Dengan</a></li>
      </ul>
    </li>
    <li>
      <a href="#memulai">Memulai</a>
      <ul>
        <li><a href="#prasyarat">Prasyarat</a></li>
        <li><a href="#instalasi">Instalasi</a></li>
      </ul>
    </li>
    <li><a href="#penggunaan">Penggunaan</a></li>
    <li><a href="#peta-jalan">Peta Jalan</a></li>
    <li><a href="#berkontribusi">Berkontribusi</a></li>
    <li><a href="#lisensi">Lisensi</a></li>
    <li><a href="#kontak">Kontak</a></li>
    <li><a href="#ucapan-terima-kasih">Ucapan Terima Kasih</a></li>
  </ol>
</details>

---

## Tentang Proyek

**IMS Finance Corporate Portal** adalah sebuah aplikasi web yang dirancang untuk memfasilitasi perusahaan pembiayaan dalam mengelola data dan simulasi angsuran nasabah. Aplikasi ini menyediakan antarmuka yang sederhana dan fungsional untuk melakukan perhitungan-perhitungan kunci yang sering dibutuhkan dalam operasional sehari-hari.

**Tujuan Utama:**
*   Memberikan alat bantu simulasi pembiayaan yang cepat dan akurat.
*   Memudahkan pemantauan angsuran yang akan atau telah jatuh tempo.
*   Menyediakan mekanisme perhitungan denda keterlambatan yang transparan.

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

### Dibangun Dengan

Proyek ini dibangun menggunakan teknologi-teknologi berikut:

*   **Backend:**
    *   [![PHP][PHP.shield]][PHP.url]
*   **Frontend:**
    *   [![HTML5][HTML5.shield]][HTML5.url]
    *   [![CSS3][CSS3.shield]][CSS3.url]
*   **Database:**
    *   [![MySQL][MySQL.shield]][MySQL.url]

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

## Memulai

Untuk menjalankan salinan lokal dari proyek ini, ikuti langkah-langkah sederhana di bawah ini.

### Prasyarat

Pastikan Anda memiliki perangkat lunak berikut terinstal di sistem Anda:

*   **Web Server Stack:** XAMPP / WAMP / MAMP atau sejenisnya.
    *   PHP >= 7.4
    *   MySQL / MariaDB
    *   Apache

### Instalasi

1.  **Clone Repositori**
    ```sh
    git clone https://github.com/username/IMS-Finance_dev.git
    ```
2.  **Pindahkan ke Direktori Web Server**
    Pindahkan folder `IMS-Finance_dev` ke dalam direktori `htdocs` (untuk XAMPP) atau `www` (untuk WAMP).

3.  **Setup Database**
    *   Buka phpMyAdmin atau klien database pilihan Anda.
    *   Buat database baru dengan nama `ims`.
    *   Pilih database `ims`, lalu impor skema dan data dari file `service/ims.sql`.

4.  **Konfigurasi Koneksi**
    *   Buka file `service/db.php` dengan editor teks.
    *   Sesuaikan nilai variabel `$servername`, `$username`, `$password`, dan `$dbname` agar sesuai dengan konfigurasi server database Anda.
    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ims";
    ```

5.  **Akses Aplikasi**
    Buka browser Anda dan kunjungi `http://localhost/IMS-Finance_dev/`.

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

## Penggunaan

Aplikasi ini memiliki tiga modul utama yang dapat diakses dari halaman dasbor:

1.  **Menghitung Angsuran**
    *   Masukkan harga OTR kendaraan, persentase DP, dan jangka waktu pinjaman (dalam tahun).
    *   Klik "Hitung" untuk melihat simulasi detail angsuran bulanan.

2.  **Cek Angsuran Jatuh Tempo**
    *   Modul ini akan menampilkan daftar nasabah beserta total angsuran yang telah melewati tanggal jatuh tempo pembayaran.

3.  **Perhitungan Denda**
    *   Pilih nasabah dan tanggal pembayaran untuk menghitung total denda yang harus dibayarkan akibat keterlambatan.

_Untuk contoh lebih lanjut, silakan merujuk ke <a href="#">Dokumentasi</a>._

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

## Peta Jalan

- [ ] Implementasi sistem login untuk admin dan staf.
- [ ] Penambahan fitur CRUD (Create, Read, Update, Delete) untuk data nasabah.
- [ ] Pengembangan fitur laporan yang lebih dinamis (misal: laporan bulanan, tahunan).
- [ ] Integrasi dengan API pihak ketiga (misal: untuk pengecekan data nasabah).
- [ ] Refaktorisasi kode ke arsitektur MVC (Model-View-Controller).

Lihat <a href="#">isu yang terbuka</a> untuk daftar lengkap fitur yang diusulkan (dan isu yang diketahui).

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

## Berkontribusi

Kontribusi adalah hal yang membuat komunitas sumber terbuka menjadi tempat yang luar biasa untuk belajar, menginspirasi, dan berkreasi. Setiap kontribusi yang Anda berikan sangat **kami hargai**.

Jika Anda memiliki saran untuk membuat proyek ini lebih baik, silakan fork repositori ini dan buat *pull request*. Anda juga bisa membuka isu dengan tag "enhancement".
Jangan lupa untuk memberikan bintang pada proyek ini! Terima kasih lagi!

1.  Fork Proyek ini
2.  Buat Branch Fitur Anda (`git checkout -b fitur/FiturLuarBiasa`)
3.  Commit Perubahan Anda (`git commit -m 'Menambahkan beberapa FiturLuarBiasa'`)
4.  Push ke Branch (`git push origin fitur/FiturLuarBiasa`)
5.  Buka sebuah Pull Request

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

## Lisensi

Didistribusikan di bawah Lisensi MIT. Lihat `LICENSE.txt` untuk informasi lebih lanjut.

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

## Kontak

Nama Anda - [@twitter_anda](https://twitter.com/twitter_anda) - email@contoh.com

Tautan Proyek: [https://github.com/username/IMS-Finance_dev](https://github.com/username/IMS-Finance_dev)

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

## Ucapan Terima Kasih

*   [Choose an Open Source License](https://choosealicense.com)
*   [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
*   [Img Shields](https://shields.io)
*   [GitHub Pages](https://pages.github.com)

<p align="right">(<a href="#top">kembali ke atas</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
[PHP.shield]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[PHP.url]: https://www.php.net/
[HTML5.shield]: https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white
[HTML5.url]: https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5
[CSS3.shield]: https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white
[CSS3.url]: https://developer.mozilla.org/en-US/docs/Web/CSS
[MySQL.shield]: https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white
[MySQL.url]: https://www.mysql.com/
