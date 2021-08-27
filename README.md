# Surat Online
[Surat Online](https://github.com/hatori901/surat_online) adalah situs aplikasi surat berbasis web yang ditujukan kepada siswa siswi sekolah.

## Latar Belakang
Adanya pandemi COVID-19, siswa siswi sekolah dilarang untuk keluar rumah untuk menjaga kesehatan mereka, sehingga sulit bagi mereka untuk mengantar surat izin ke sekolah, dengan memanfaatkan teknologi internet maka dibuatlah aplikasi bernama [Surat Online](https://github.com/hatori901/surat_online) untuk memudahkan siswa siswi sekolah mengirim surat ke sekolah tanpa keluar rumah.
Dengan dibuatnya aplikasi ini diharapkan bisa mempermudah siswa siswi mengirim surat izin ke sekolah.

## Tujuan
- Mempermudah Siswa mengirim surat ke sekolah tanpa keluar rumah.
- Membantu siswa dalam mengirim surat jika terkendala transportasi
- Membantu siswa yang tidak sempat membuat surat


## Instalasi

Requirements :
 - PHP V7.4+
 - [Composer](https://getcomposer.org/download/)
 - [Node JS](https://nodejs.org/en/download/) & Node Package Manager (NPM)
 - MYSQL Server
 
 ```bash
git clone git@github.com:hatori901/surat_online.git
cd surat_online
cp .env.example .env
composer install
php artisan key:generate
# Konfigurasi database pada .env
php artisan migrate --seed
npm install
npm run production
php artisan serve
# Open http://localhost:8000/
```

## Contributing

Surat Online dibuat untuk mengikuti event lomba IT Web Apps [TESTIFEST](https://drive.google.com/file/d/1n1jJ6ORmboWOVU5YiMy61IVtr_xnn9EO/view).
Surat Online dibuat menggunakan :

-   PHP [Laravel 8](https://laravel.com/docs/8.x/installation)
-   CSS [TailwindCSS](https://tailwindcss.com/docs/installation)
