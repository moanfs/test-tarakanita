## Codeigniter 4

Test programmer pada Yayasan Tarakanita, pada test ini dibuat menggunakan tech berikut:

- [Codeigniter 4](https://www.codeigniter.com/).
- [Mysql](https://www.mysql.com/).

## Installation

```
cd tarakanita-codeigniter

```

## Usege

1. pada folder root jalankan

```
composer install
```

2. setelah rename file dengan nama evn. menjasi .env dan konfirgurasi database di .env

```
copy env .env
```

```
database.default.hostname = localhost
database.default.database = tarakanita_ci4
database.default.username = root
database.default.password =
```

```
php spark db:create tarakanita_ci4
```

3. setelah itu generate key dengan copy dibawah

```
php spark key:generate
```

4. lanjut dengan migrasi database dan seeder

```
php spark migrate
php spark db:seed UserSeeder
```

5. lanjut dengan menjalankan project dengan (pada terminal)

```
php spark serve
```

## ss program

Login Sebagai admin dan tidak memiliki akses untuk kelolah admin
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/ci4/ci4_admin.png)

Login Sebagai Super admin dan memiliki akses untuk kelolah admin
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/ci4/ci4_superadmin.png)

Halaman form edit data pelamar
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/ci4/ci4_edit_pelamar.png)

Form Untuk menambah data pelamar
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/ci4/ci4_form_pelamat.png)

halaman form edit data role admin
![ss](https://github.com/moanfs/test-tarakanita/blob/main/image/ci4/ci4_form_pelamat.png)
