# Implementation Plan: Railway Deployment

## Overview

Step-by-step deployment aplikasi Laravel Dioli ke Railway platform.
Repository: https://github.com/AriscaPramalistyo05/Dioli.git

## Tasks

- [x] 1. Persiapan Repository untuk Deployment
  - [x] 1.1 Buat file nixpacks.toml untuk Railway build configuration
    - Konfigurasi PHP 8.3 dengan extensions yang diperlukan
    - Setup composer install dan npm build
    - _Requirements: 4.2, 4.3, 6.1, 6.2, 6.3_

  - [x] 1.2 Update .env.example dengan production variables
    - Tambahkan placeholder untuk Railway MySQL variables
    - Set default production values
    - _Requirements: 3.1, 3.2, 3.3, 3.4, 3.5_

  - [x] 1.3 Pastikan .gitignore sudah benar
    - Exclude .env, vendor/, node_modules/
    - Include storage/app/public/.gitkeep
    - _Requirements: 5.2_

  - [x] 1.4 Push perubahan ke GitHub
    - Commit nixpacks.toml dan perubahan lainnya
    - Push ke branch main
    - _Requirements: 4.1_

- [ ] 2. Setup Railway Account dan Project
  - [ ] 2.1 Buat akun Railway (jika belum ada)
    - Kunjungi https://railway.app
    - Sign up dengan GitHub account
    - _Requirements: 1.1_

  - [ ] 2.2 Buat project baru dari GitHub repository
    - Click "New Project" → "Deploy from GitHub repo"
    - Pilih repository AriscaPramalistyo05/Dioli
    - Railway akan auto-detect sebagai PHP/Laravel project
    - _Requirements: 1.2, 1.3_

- [ ] 3. Setup MySQL Database di Railway
  - [ ] 3.1 Tambahkan MySQL service ke project
    - Click "New" → "Database" → "MySQL"
    - Railway akan provision MySQL instance
    - _Requirements: 2.1_

  - [ ] 3.2 Catat connection credentials
    - Railway akan provide: MYSQLHOST, MYSQLPORT, MYSQLDATABASE, MYSQLUSER, MYSQLPASSWORD
    - Credentials tersedia di Variables tab
    - _Requirements: 2.2_

- [ ] 4. Konfigurasi Environment Variables
  - [ ] 4.1 Set Laravel environment variables
    - APP_NAME=Dioli
    - APP_ENV=production
    - APP_DEBUG=false
    - APP_KEY=(generate dengan php artisan key:generate --show)
    - _Requirements: 3.1, 3.2, 3.3_

  - [ ] 4.2 Set database connection variables
    - DB_CONNECTION=mysql
    - DB_HOST=${{MySQL.MYSQLHOST}}
    - DB_PORT=${{MySQL.MYSQLPORT}}
    - DB_DATABASE=${{MySQL.MYSQLDATABASE}}
    - DB_USERNAME=${{MySQL.MYSQLUSER}}
    - DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
    - _Requirements: 3.4_

  - [ ] 4.3 Set APP_URL ke Railway domain
    - APP_URL=https://[your-project].up.railway.app
    - _Requirements: 3.5_

- [ ] 5. Deploy dan Migrasi Database
  - [ ] 5.1 Trigger deployment
    - Railway akan auto-deploy setelah environment variables di-set
    - Monitor build logs untuk errors
    - _Requirements: 4.1, 4.2, 4.3_

  - [ ] 5.2 Verifikasi migrations berjalan
    - Check deployment logs untuk migration output
    - Pastikan semua tables ter-create
    - _Requirements: 4.4_

  - [ ] 5.3 Import initial data (optional)
    - Jika perlu, import data dari projek.sql
    - Atau jalankan seeders
    - _Requirements: 2.3_

- [ ] 6. Verifikasi Deployment
  - [ ] 6.1 Akses aplikasi via Railway URL
    - Buka https://[your-project].up.railway.app
    - Pastikan homepage loads
    - _Requirements: 1.1_

  - [ ] 6.2 Test login admin
    - Login dengan admin@gmail.com atau admin@dioli.com
    - Verifikasi dashboard accessible
    - _Requirements: 2.3_

  - [ ] 6.3 Test CRUD operations
    - Create, edit, delete menu item
    - Verifikasi data tersimpan di database
    - _Requirements: 2.3_

  - [ ] 6.4 Test file uploads
    - Upload gambar untuk menu atau koki
    - Verifikasi gambar tampil dengan benar
    - _Requirements: 5.1, 5.2, 5.3_

- [ ] 7. Final Checkpoint
  - Semua fitur berfungsi di production
  - Database terkoneksi dengan benar
  - File uploads berfungsi
  - Performance acceptable

## Notes

- Railway free tier: 500 hours/month, 512MB RAM
- MySQL free tier: 1GB storage
- Auto-deploy aktif setiap push ke main branch
- Untuk custom domain, upgrade ke paid plan atau gunakan Cloudflare tunnel
