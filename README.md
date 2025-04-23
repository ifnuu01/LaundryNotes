### 1. Clone repositori

git clone https://github.com/username/nama-project.git
cd nama-project

### 2. Install semua dependency PHP

composer install

### 3. Copy file .env

cp .env.example .env

### 4. Generate APP_KEY

php artisan key:generate

### 5. (Opsional) Install dependency frontend (jika pakai Vite)

npm install && npm run dev

### 6. Atur konfigurasi database di file .env

### (Isi sesuai pengaturan lokal kamu)

### 7. Jalankan migrasi (buat tabel di database)

php artisan migrate

### 8. Jalankan server lokal (jika tidak pakai Herd)

php artisan serve
