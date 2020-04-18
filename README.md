# CodeIgniter 4 Simple RBAC Module
[![Latest Stable Version](https://poser.pugx.org/skuadron45/ci4adminrbac/v/stable)](https://packagist.org/packages/skuadron45/ci4adminrbac) 
[![Total Downloads](https://poser.pugx.org/skuadron45/ci4adminrbac/downloads)](https://packagist.org/packages/skuadron45/ci4adminrbac) 
[![alt](https://img.shields.io/badge/package-skuadron45%2Fci4adminrbac%20-s)](https://packagist.org/packages/skuadron45/ci4adminrbac)
[![License](https://poser.pugx.org/skuadron45/ci4adminrbac/license)](https://packagist.org/packages/skuadron45/ci4adminrbac) 

## Persiapan
Pastikan **codeigniter4/appstarter**  project siap digunakan, baca tutorial install [disini](https://github.com/codeigniter4/appstarter)

## Instalasi module via composer
Buka CMD/Shell di root project, run command berikut:
```
composer require skuadron45/ci4adminrbac
```

Jalankan command:
```
php spark ci4adminrbac:install
```

## Akses
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

## Catatan Development
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