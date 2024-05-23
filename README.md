# Fullstack Challenge

## Deskripsi

Project ini adalah tantangan fullstack menggunakan Laravel dan Vue JS untuk membuat 3 challenge dari yang tersedia. untuk challenge terakhir yaitu Realtime Chat ada tambahan untuk Frontend menggunakan Vue JS. Server dijalankan di XAMPP versi 8.2.12.

## Prasyarat

-   XAMPP 8.2.12
-   Node.js (versi v20.13.1)
-   Composer

## Langkah-langkah Menjalankan Project

1. **Clone Repository Project**

    ```bash
    git clone https://github.com/bimaega15/fullstack-challenge.git
    ```

2. **Konfigurasi Variabel Lingkungan**

    - Ubah nama file `.env.example` menjadi `.env`.
    - File `.env` memiliki konfigurasi untuk verifikasi email menggunakan Gmail dan Socket.IO. Anda bisa menggunakan akun yang telah dikonfigurasi untuk keperluan pengujian.

3. **Install Dependensi PHP**

    ```bash
    composer install
    ```

    - Jika Anda mengalami kesalahan terkait `extension=zip`, edit file `php.ini` di direktori instalasi XAMPP Anda dan hapus tanda titik koma (;) di depan `extension=zip`.

4. **Install Dependensi Node.js**

    ```bash
    npm install
    ```

5. **Jalankan Migrasi Database**

    ```bash
    php artisan migrate
    ```

6. **Kompilasi Aset**

    ```bash
    npm start
    ```

7. **Jalankan Server Pengembangan Laravel**
    ```bash
    php artisan serve
    ```

## Kontak

Jika Anda memiliki pertanyaan atau memerlukan bantuan lebih lanjut, silakan hubungi saya:

-   **Nama:** Bima Ega Farizky
-   **Telepon:** 082277506232
-   **Email:** bimaega15@gmail.com

Terima kasih telah menggunakan project ini!

Salam,

Bima Ega Farizky
