# Deployment Guide - Dioli Restaurant App

## Railway Deployment

### Prerequisites
1. GitHub account dengan repository: https://github.com/AriscaPramalistyo05/Dioli.git
2. Railway account (daftar di https://railway.app)

### Step 1: Setup Railway Project
1. Login ke Railway
2. Click "New Project" → "Deploy from GitHub repo"
3. Pilih repository `AriscaPramalistyo05/Dioli`
4. Railway akan auto-detect sebagai PHP project

### Step 2: Add MySQL Database
1. Di Railway project dashboard, click "New" → "Database" → "MySQL"
2. Railway akan provision MySQL instance
3. Catat connection credentials dari Variables tab

### Step 3: Configure Environment Variables
Set environment variables berikut di Railway:

```
APP_NAME=Dioli
APP_ENV=production
APP_DEBUG=false
APP_KEY=[generate dengan: php artisan key:generate --show]
APP_URL=https://[your-project].up.railway.app

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### Step 4: Deploy
1. Push perubahan ke GitHub main branch
2. Railway akan auto-deploy
3. Monitor build logs untuk errors
4. Akses aplikasi via Railway-provided URL

### Step 5: Verify Deployment
1. Akses https://[your-project].up.railway.app
2. Login sebagai admin: admin@gmail.com atau admin@dioli.com
3. Test CRUD operations
4. Verify file uploads work

## Local Development

### Setup
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
```

### Development Server
```bash
# Terminal 1 - Laravel
php artisan serve

# Terminal 2 - Vite (for asset compilation)
npm run dev
```

### Build for Production
```bash
npm run build
```

## Notes
- Railway free tier: 500 hours/month, 512MB RAM
- MySQL free tier: 1GB storage
- Auto-deploy aktif setiap push ke main branch
- File uploads disimpan di storage/app/public (linked ke public/storage)