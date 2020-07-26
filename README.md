## TK 3 Team 4 Web Programming - Binus University
- EVAN ADRIAN
- MUHAMMAD AINUR ROZIQIN TAHITYA
- WILBERT GILCHRIST SYARANAMUAL
- FLORIBERTUS BASFIANTO

### Case 
Buatlah aplikasi perhitungan nilai menggunakan laravel untuk menghitung grade dengan komposisi inputan 
    - Nilai Quis
    - Nilai Tugas
    - Nilai Absensi
    - Nilai Praktek
    - Nilai UAS

- Ketentuan penilaian :
    - Nilai <= 65 = D
    - Nilai <= 75 = C
    - Nilai <= 85 = B
    - Nilai <=100 = A
    
- Hasil outputnya ditentukan dengan membagi 5 dari hasil inputan yang dilakukan.
   
### Step by step using this project
- Clone project ini
- Jalankan "php artisan serve" 
    - Jika error silahkan lakukan "composer install" 
    - Copy ".env.exampel" dan ubah nama menjadi ".env" kemudian ubah nama database menjadi "binusnilaimahasiswa"
    - Buat database baru dengan nama "binusnilaimahasiswa"
    - Lakukan generate key "php artisan key:generate"
    - Lakukan "php artisan migrate" 
