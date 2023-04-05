
## SIBONLABEL 
SIBONLABEL (Sistem Informasi Bon Label)

Deskripsi: SIBONLABEL merupakan Sistem Informasi Bon Label pada RSUD Blambangan, yang dimana sistem informasi ini bermanfaat bagi management Rumah Sakit seperti halnya tata cara user atau ruangan memesan/bon kertas label. Yang didalamnya memuat beberapa informasi Penting seperti halnya: Memuat jumlah stock label yang tersedia oleh admin, Dapat mencatat jumlah order yang dilakukan oleh user, melihat jumlalh user dan ruangan yang masi aktif, dan juga terdapat fitur laporan yang memperlihatkan log user yang sedang order dalam keadaan Pending, Ditolak, atau di terima. dan pada aplikasi SIBONLABEL juga terdapat fitur Export file laporan menjadi file berekstensi exel. 

5. Instrukksi penggunaan proyek
6. sertakan Rekognisi utk distributor
7. Lisensi
8. Lencana (badges) (opsional)
## Installation

Panduan Pemasangan:
1. copy project ke Directory anda di terminal dengan perintah:
```bash
 git clone https://github.com/muhammad637/sibonlabel.git
```
2. buka Directory yang sudah di clone dengan perintah: 
```bash
  cd sibonlabel 
```
3. copy file .env.example dengan perintah:
```bash
  cp .env.example .env
```
4. buat database dengan nama " bonlabel "
![ss4](https://user-images.githubusercontent.com/67191961/229972459-52a8e244-3e7e-41e1-ab2f-76ee32b9ad35.JPG)


5. aktifkan extension php gd di file php.ini dengan cara buka folder php di localDisk(C:) > xampp > php
![ss1](https://user-images.githubusercontent.com/67191961/229971292-0c2d6f0d-aa40-4826-9fef-a8cf8f92503c.JPG)


Lalu cari file php.ini seperti gambar di bawah dan buka
![ss2](https://user-images.githubusercontent.com/67191961/229971296-e4e4ab75-ca66-416c-8c86-ede53f46378a.JPG)


muncul halaman seperti dibawah, dan kita ketik ctrl + f lalu cari extension=gd dan enter. lalu hilahkan tanda titik koma didepan extension=gd.
![ss3](https://user-images.githubusercontent.com/67191961/229971301-5bdf406f-74c1-40cb-a205-7d23c98529d6.JPG)
6. jalankan di terminal
```bash
   composer update
```
7. jalankan perintah:
```bash
    php artisan migrate:fresh --seed
```
8. dan yang terakhir jalankan:
```bash
    php artisan serve 
```
 

## Features

#### Terdapat 4 menu Utama di sidenavbar dengan 3 sub menu tambahan pada salah satu menu. yaitu

- Dashboard
- Orderan
- Laporan
- Master
    - Master user
    - Master Ruangan
    - Master Produk

#### Dan fitur dari masing-masing menu tersebut di antaranya

- Dashboard (dapat melihat Jumlah produk. jumlah user, produk, ruangan yang masih aktif. dan dapat melihat user terakhir yang order)
- Orderan (menampilkan sebuah tabel dari user yang orderannya sedang pending, ditolak, atau di setujui orderannya.

    juga terdapat fitur untuk mengedit/mengatur jumlah kertas label yang diminta user oleh admin. juga admin dapat menolak atau menyetujui orderan dari user.)
- Laporan (menampilkan tabel yang berisi jumlah order yang dilakukan user yang di setujui maupun ditolak.

    dan terdapat fitur eksport data berupa exel.)
- Master (berisi menu utama untuk membuat, mengedit, dan menonaktifkan User, Produk, dan Ruangan)
    - Master user
    - Master Ruangan
    - Master Produk

## Demo for Admin

1. Login dengan username dan password yang sudah diberikan

2. Pada halaman depan dashboard akan langsung menampilkan informasi mengenai jumla stock tersedia.
Di bawahnya berisi  jumlah user, ruangan, dan produk yang masih aktif, Dan fitur terakhir dihalaman dashboard menampilkan List orderan dari User.

3. Pada halaman orderan akan menampilkan list user yang sedang merequest produk. 

    terdapat beberapa fitur untuk admin yaitu pada Kolom Aksi, terdapat Button yg digunakan untuk admin "Mengedit jumlah pesanan dan jenis kertas" lalu fitur "terima dan tolak" permintaan user oleh Admin.

4. Pada halaman laporan menampilkan data user yang telah proses.

    Pada pojok kanan atas konten merupakan fitur ekspor untuk kita dapat mendownload data berekstensi exel.

5. Berikut halaman Master dg 3 sub menu yaitu,
- Master User berisi fitur Tambah User yang berupa tampilan button warna biru berada pas dibawah judul list user.

    lalu terdapat 2 fitur pada kolom aksi yaitu fitur edit(button warna kuning) dan fitur active&nonActive user(button warna hijau jika user aktif dan warna merah bila user nonaktif).

- Master Produk yang isi dan fiturnya tak jauh berbeda dengan Mater User.

- Master Ruangan juga tidak berbeda dengan sub menu Master lainnya, fiturnya 2 yaitu edit dan active&nonaktif


## Demo For User
## Badges

Add badges from somewhere like: [shields.io](https://shields.io/) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) ![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)



## Authors

- [@faridMustakim](https://github.com/muhammad637)
- [@ilhamRosidi](https://github.com/Ilhamrsdi)
- [@aanTriambudi](https://github.com/Aan-Triambudi)
- [@dentaArtha](https://github.com/DentaArtha)

