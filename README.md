# ✍️ Article Web App

[![Status: Selesai Uji Coba](https://img.shields.io/badge/Status-Selesai%20Uji%20Coba-blue.svg)]()
[![Dibuat Untuk](https://img.shields.io/badge/Dibuat%20Untuk-Kreasi%20Asa%20Indonesia-red.svg)]()
Aplikasi web ini dikembangkan sebagai bagian dari **tes seleksi untuk melamar di Kreasi Asa Indonesia**.

**Article Web App** dirancang sebagai platform dasar untuk menampilkan, membuat, mengedit, dan mengelola konten artikel. Proyek ini bertujuan untuk menunjukkan kemampuan dalam membangun aplikasi web fungsional yang memenuhi kebutuhan manajemen konten.

*Semoga aplikasi ini dapat memenuhi kriteria penilaian dan membantu saya diterima dalam proses seleksi.*

---
## 📑 Daftar Isi

* [1. Tentang Proyek](#1-tentang-proyek)
* [2. Memulai (Getting Started)](#2-memulai-getting-started)
    * [2.1 Prasyarat](#21-prasyarat)
    * [2.2 Instalasi](#22-instalasi)
* [3. Penggunaan](#3-penggunaan)
* [4. Teknologi yang Digunakan](#4-teknologi-yang-digunakan)
* [5. Lisensi](#5-lisensi)
* [6. Kontak](#6-kontak)

---

## 2. Memulai (Getting Started)

Ikuti langkah-langkah ini untuk mendapatkan salinan lokal proyek dan menjalankannya untuk tujuan pengembangan dan pengujian.

### 2.1 Prasyarat

Pastikan Anda telah menginstal *software* berikut di mesin Anda:

* **[Contoh: Node.js]** (Versi $v18.x$ atau lebih tinggi)
* **[Contoh: PHP]** (Versi $8.1$ atau lebih tinggi)
* **[Contoh: Composer]** (Untuk mengelola dependensi PHP)
* **[Contoh: MySQL/PostgreSQL]** (Database)

### 2.2 Instalasi

1.  **Kloning Repositori:**
    ```bash
    git clone [https://github.com/user-anda/article-web-app.git](https://github.com/user-anda/article-web-app.git)
    cd article-web-app
    ```

2.  **Instal Dependensi:**
    *Untuk Frontend:*
    ```bash
    npm install
    # atau yarn install
    ```
    *Untuk Backend:*
    ```bash
    composer install
    ```

3.  **Konfigurasi Lingkungan:**
    * Buat file `.env` dengan menduplikasi `.env.example`:
        ```bash
        cp .env.example .env
        ```
    * Edit file `.env` dan atur kredensial database Anda.
    * *Jika menggunakan framework seperti Laravel/CodeIgniter/dll, tambahkan perintah:*
        ```bash
        php artisan key:generate
        ```

4.  **Migrasi Database:**
    * Jalankan migrasi database untuk membuat tabel:
        ```bash
        php artisan migrate
        ```

5.  **Jalankan Aplikasi:**
    ```bash
    composer run dev
    ```

Aplikasi sekarang akan berjalan pada `http://localhost:[PORT_NUMBER]` (biasanya 8000).

---
## 3. Penggunaan (Usage)

Article Web App dirancang untuk menyediakan alur kerja manajemen artikel yang sederhana.

### 3.1 Alur Kerja Dasar

Setelah aplikasi berhasil dijalankan, ikuti alur ini untuk memulai:

1.  **Akses Aplikasi:** Buka peramban Anda dan kunjungi alamat `http://127.0.0.1:8000`.
2.  **Login/Register:**
    * Jika belum memiliki akun, daftar sebagai pengguna baru.
    * *Anda tidak dapat mengakses list artikel jika belum login (Sesuai requirement test)*
3.  **Halaman Utama (List Artikel):** Anda akan melihat daftar semua artikel yang telah dipublikasikan. Jika tidak ada maka akan ada pemberitahuan terkait pembuatan artikel
4.  **Membuat Artikel Baru:**
    * klik Tombol "Create Article".
    * Isi Judul, Image, dan Deksripsi.
    * Lalu klik tombol "Create Artikel".
5.  **Mengelola Artikel:**
    * Pengguna yang terautentikasi dapat Mengedit atau Menghapus artikel mereka.
    * Mereka dapat mengubah dan mengahpus melalui tombol yang ada, untuk hapus tekan "edit" terlebih dahulu.


## 4. Teknologi yang Digunakan

Article Web App dibangun menggunakan teknologi inti berikut:

* **Backend Framework:** [Laravel v12] - Framework PHP untuk arsitektur backend yang kuat.
* **Database:** [MySQL] - Sistem manajemen database.
* **Frontend:** [Blade] - Layout HTML bawaan Laravel.
* **Styling:** [Tailwind CSS] - Untuk desain responsif dan tata letak.
* **Package Manager:** [Composer] dan [NPM/Yarn].

---
## 6. Lisensi

Proyek ini berada di bawah Lisensi MIT (Massachusetts Institute of Technology).

Anda bebas menggunakan, memodifikasi, dan mendistribusikan kode ini, dengan syarat menyertakan pemberitahuan hak cipta dan izin.

## 7. Kontak / Penulis

Proyek ini dikembangkan oleh:

**Muhammad Naafi'ul Razzaq Witjaksono**
* **Email:** naafiulrazzaq@gmail.com
* **LinkedIn:** www.linkedin.com/in/muhammad-naafi-ul-razzaq-witjaksono-12771729b
* **GitHub:** [@NaafiulRazzaqW]([https://github.com/UsernameGitHubAnda](https://github.com/NaafiulRazzaqW))

---
