# Modul - CodeIgniter 4 Simple RBAC
[![Latest Stable Version](https://poser.pugx.org/skuadron45/ci4adminrbac/v/stable)](https://packagist.org/packages/skuadron45/ci4adminrbac) 
[![Total Downloads](https://poser.pugx.org/skuadron45/ci4adminrbac/downloads)](https://packagist.org/packages/skuadron45/ci4adminrbac) 
[![alt](https://img.shields.io/badge/package-skuadron45%2Fci4adminrbac%20-s)](https://packagist.org/packages/skuadron45/ci4adminrbac)
[![License](https://poser.pugx.org/skuadron45/ci4adminrbac/license)](https://packagist.org/packages/skuadron45/ci4adminrbac) 

# Fitur Tersedia
1. Implementasi Filters terkait Autentikasi
2. View Parser, View Renderer
3. ResponseTrait
4. Library Datatable Server Side.
5. Datatable Builder di file custom js.
6. Form Builder untuk modal.
7. Login User (Encrypt dan Decrypt)
8. Add, Edit By Reload Page
9. Add, Edit, Delete By Ajax Modal
10. Hak Akses Add, Delete, Edit, View tiap modul. (Grup Pengguna)
11. Template AdminLte3, Sweet Alert, Pace Js untuk loading bar.
12. Model yang ada masih menggunakan cara CI3 (belum extend CodeIgniter\Model)
13. CSRF Filter
14. Mengakali Dynamic BASE URL seperti CI3 di Config/App.php
15. Redirect Success Url/Home Modul tiap User setelah Login.
16. Stored Procedure di database
17. Function di database.

## Update 07-03-2020 !
18. Compiling Assets (Mix) menggunakan Laravel Mix, (1 js dan 1 css untuk template adminlte)
19. Ubah request login menggunakan ajax

## Next Update
1. Penggunaan Database Migration
2. Penggunaan Model dan Entity
3. Module Profil Pengguna
4. HMVC module agar memaksimalkan namespaces
5. ...


## Persiapan
Pastikan **codeigniter4/appstarter**  project siap digunakan, baca tutorial install [disini](https://github.com/codeigniter4/appstarter)

Sesuaikan Base URL di App/Config/Database.php atau .env file
Sesuaikan nama database yang akan digunakan di App/Config/Database.php atau .env file
*buat database baru bila database belum ada

Contoh via .env file:
```
app.baseURL = http://ci4fresh.test/

database.default.hostname = localhost
database.default.database = ci4fresh
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

## Instalasi module via composer
Buka CMD/Shell di root project, run command berikut:
```
composer require skuadron45/ci4adminrbac
```

Jalankan command berikut untuk instalasi module (include migration, seeder, dll)

```
php spark ci4adminrbac:install
```

## Routes List Modul
Untuk mengetahui url yang tersedia untuk module ini, silahkan jalankan command:
```
php spark routes
```
routes untuk module ini yang tersedia dengan kolom handler dimulai dengan namespace \Ci4adminrbac\\*

Berikut ini adalah routes path yang sudah tersedia:
```
GET     | admin/logout
GET     | admin
GET     | admin/dashboard
GET     | admin/user/user
GET     | admin/user/user/getdata
GET     | admin/user/user/delete
GET     | admin/user/user/find
GET     | admin/user/usergroup
GET     | admin/user/usergroup/getdata
GET     | admin/user/usergroup/create
GET     | admin/user/usergroup/edit/([0-9]+)
GET     | admin/user/usergroup/delete
GET     | login
POST    | admin/user/user/store
POST    | admin/user/usergroup/store
POST    | admin/user/usergroup/update/([0-9]+)
POST    | login
```

## Catatan

### **Membuat .env file**
Buka CMD/Shell di root project, run command berikut:
```
cp env .env
```
*perintah copy file env menjadi .env file secara command line (biasanya via GUI tidak dapat membuat .env file)

### **Codeigniter 4 Core System**

Karena saat ini codeigniter4 masih update terus perbaikannya, saya menggunakan repo github **codeigniter4/CodeIgniter4** untuk core system CI4-nya.
Hal tersebut dapat dilakukan dengan melakukan langkah berikut:

Run command berikut:
```
php builds development
```
Perintah ini akan mengubah isi composer.json pada bagian
```
"require": {
        ...
        "codeigniter4/framework": "^4"
}
```
menjadi:
```
"require": {
        ...
        "codeigniter4/codeigniter4": "dev-develop"
},
```
dan menambahkan baris:
```
"minimum-stability": "dev"
```
Silahkan tambahkan 1 property berikut ini:
```
"prefer-stable": true
```
Untuk penjelasan prefer-stable silahkan baca [di sini](https://getcomposer.org/doc/04-schema.md#prefer-stable)

Lalu jalankan kembali perintah:
```
composer update --no-dev
```