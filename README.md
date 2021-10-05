# Deskripsi

Aplikasi simple untuk mencatat keuangan berbasis web dan menggunakan framework PHP CodeIgniter.

# Versi

- PHP yang direkomendasikan >= 7.0
- CodeIgniter 3.1.11
- MySQL >= 5.0

# Konfigurasi

Untuk menggunakan aplikasi ini, silahkan import databasenya terlebih dahulu di folder `database`, kemudian buat file dan save menjadi `.env.development` di root folder project (sejajar dengan `.htaccess`) dengan isinya seperti berikut:

```
//database
DB_CONNECTION=mysqli
DB_HOST=localhost
DB_DATABASE=nama_database
DB_USERNAME=nama_user_database
DB_PASSWORD=password_user_database
```

# Fitur Aplikasi
Adapun beberapa fitur yang tersedia pada aplikasi ini adalah sebagai berikut:

- Dashboard statistik
- Kategori
- Transaksi masuk
- Transaksi keluar
