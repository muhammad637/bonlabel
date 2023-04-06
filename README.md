
## SIBONLABEL 
SIBONLABEL (Sistem Informasi Bon Label)

Deskripsi: SIBONLABEL merupakan Sistem Informasi Bon Label pada RSUD Blambangan, yang dimana sistem informasi ini bermanfaat bagi management Rumah Sakit seperti halnya tata cara user atau ruangan memesan/bon kertas label. Yang didalamnya memuat beberapa informasi Penting seperti halnya: Memuat jumlah stock label yang tersedia oleh admin, Dapat mencatat jumlah order yang dilakukan oleh user, melihat jumlalh user dan ruangan yang masi aktif, dan juga terdapat fitur laporan yang memperlihatkan log user yang sedang order dalam keadaan Pending, Ditolak, atau di terima. dan pada aplikasi SIBONLABEL juga terdapat fitur Export file laporan menjadi file berekstensi exel. 





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

![Login](https://user-images.githubusercontent.com/67191961/230259456-b8863bc6-ab6c-4ea8-95ec-0148c3383d86.JPG)

2. Pada halaman depan dashboard akan langsung menampilkan informasi mengenai jumla stock tersedia. Di bawahnya berisi  jumlah user, ruangan, dan produk yang masih aktif.

![adm1](https://user-images.githubusercontent.com/67191961/230260627-c3557b3c-a75e-41a8-8b9e-9de22d82b577.JPG)

 Dan fitur terakhir dihalaman dashboard menampilkan List orderan dari User.

![adm2](https://user-images.githubusercontent.com/67191961/230260638-c8b858fc-8d59-4783-b0f0-c7a00a91a622.JPG)

3. Pada halaman orderan akan menampilkan list user yang sedang merequest produk. 

![adm3](https://user-images.githubusercontent.com/67191961/230260640-504967ec-df0c-4452-8a93-7e4aa6732484.JPG)

    terdapat beberapa fitur untuk admin yaitu pada Kolom Aksi, terdapat Button yg digunakan untuk admin Mengedit jumlah pesanan dan jenis kertas lalu fitur terima dan tolak permintaan user oleh Admin.

![adm4](https://user-images.githubusercontent.com/67191961/230260643-bc2bc09d-9df8-4aa1-abd8-f31d7175015d.JPG)

4. Pada halaman laporan menampilkan data user yang telah proses.
    Pada pojok kanan atas konten merupakan fitur ekspor untuk kita dapat mendownload data berekstensi exel.

![adm5](https://user-images.githubusercontent.com/67191961/230262710-f970c25b-9a6c-4233-bd7c-c8f79e7ca0a2.JPG)

5. Berikut halaman Master dengan 3 sub menu yaitu,

![adm6 1](https://user-images.githubusercontent.com/67191961/230262714-0fbcb9e6-1927-4093-814c-648e0e68772d.JPG)

- Master User berisi fitur Tambah User yang berupa tampilan button warna biru berada pas dibawah judul list user.

![adm6 2](https://user-images.githubusercontent.com/67191961/230262715-e873b498-72d8-4dfc-8808-31d32289319c.JPG)

- isi dari fitur tambah sebagai berikut

![adm6 3](https://user-images.githubusercontent.com/67191961/230262834-a058bad2-447c-4225-b5e2-943c9ba75fcc.JPG)

    - Dan pada List menu No. Hp, merupakan button yang jika di tekan akan langsung menuju aplikasi whatsApp

![adm6 4](https://user-images.githubusercontent.com/67191961/230262887-5529774f-574a-4857-87b9-18220eb8cb5f.JPG)

    lalu terdapat 2 fitur pada kolom aksi yaitu fitur edit(button warna kuning) yang berisi sbg berikut:
    
![adm6 5](https://user-images.githubusercontent.com/67191961/230263994-7bb65c01-4ccd-434e-b621-1334ce8ff713.JPG)    

    dan fitur active&nonActive user(button warna hijau jika user aktif dan warna merah bila user nonaktif). 

![adm6 6](https://user-images.githubusercontent.com/67191961/230263998-3bca8286-cca0-4a8c-8295-f0f94a8d4cb8.JPG)

- Master Produk berisi fitur yang tidak jauh berbeda dengan Master User.

- pada Master Ruangan juga tidak jauh berbeda dengan sub menu Master lainnya, adapun fiturnya 2 yaitu edit dan active&nonaktif


## Demo For User

1. Login dengan username dan password yang sudah diberikan

![Login](https://user-images.githubusercontent.com/67191961/230259456-b8863bc6-ab6c-4ea8-95ec-0148c3383d86.JPG)

2. Pada halaman depan dashboard akan langsung menampilkan informasi mengenai jumlah stock tersedia.

![usr1](https://user-images.githubusercontent.com/67191961/230259616-cd6ef330-b92b-4c91-b026-7fab44724200.JPG)

     Dan fitur terakhir dihalaman dashboard menampilkan List orderan dari User.

![usr2](https://user-images.githubusercontent.com/67191961/230259634-3ef1ac64-4a8b-40c1-bba1-9df8738245dd.JPG)

3. Pada menu Order terdapat 2 dropdown menu yang di gunakan untuk memilih produk dan ruangan, dan satu kolom untuk menentukan jumlah produk yang di order.

![usr3](https://user-images.githubusercontent.com/67191961/230259641-2162b3f3-b2b3-41ce-a300-787030570bec.JPG)

4. Dan menu terakhir yaitu menu History yang berisi list laporan user yang order serta statusnya.

![usr4](https://user-images.githubusercontent.com/67191961/230259654-7a0d71f8-7a27-49bf-a775-390e18e0bd95.JPG)
### Menu Setting Admin & User
1. Untuk menu setting berada pada bagian pojok kanan atas yang terdapat nama user atau admin.
    Terdapat 2 menu yaitu : 
    - My Profil 
    - Log-Out
2. Pada hal My Profil terdapat 3 fitur menu yaitu
    - Profil (berisi data diri)
    - Edit My Profil (tempat mengedit data diri kita)
    - Ubah Password (tempat kita mengubah password)
## Badges

Technology used:

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) ![GitHub](https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)



## Authors

- [@faridMustakim](https://github.com/muhammad637)
- [@ilhamRosidi](https://github.com/Ilhamrsdi)
- [@aanTriambudi](https://github.com/Aan-Triambudi)
- [@dentaArtha](https://github.com/DentaArtha)

