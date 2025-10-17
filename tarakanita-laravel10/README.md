## Laravel

Test programmer pada Yayasan Tarakanita, pada test ini dibuat menggunakan tech berikut:

-   [Laravel 10](https://laravel.com/docs/10.x).
-   [Mysql](https://www.mysql.com/).

## Pindah direktori setelah clone repository

```
cd tarakanita-laravel10

```

## Usege

1. pada folder root jalankan

```
composer install
```

```
npm install
```

2. setelah rename file dengan nama .evn.example menjasi .env dan konfirgurasi database

```
mv .env.example .env
```

```

```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tarakanita_laravel
DB_USERNAME=root
DB_PASSWORD=

```

```

3. setelah itu generate key dengan copy dibawah

```
php artisan key:generate
```

4. lanjut dengan migrasi database dan seeder

```
php artisan migrate --seed
```

5. lanjut dengan menjalankan project dengan (pada terminal)

```
php artisan serve
```

```
npm run dev
```

## ss program

Login Sebagai admin dan tidak memiliki akses untuk kelolah admin
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/admin.png)

Login Sebagai Super admin dan memiliki akses untuk kelolah admin
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/petugas.png)

Halaman form tambah data admin
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/petugas-form.png)

Form Untuk edit role admin
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/petugas-edit.png)

halaman table data pelamar
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/pelamar.png)

halaman form tambah data pelamar
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/pelamar-form.png)

halaman form edit data pelamar
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/pelamar-edit.png)

Konfirmasi delete data
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/laravel/delete.png)
