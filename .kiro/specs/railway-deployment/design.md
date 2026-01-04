# Design Document: Railway Deployment

## Overview

Deployment aplikasi Laravel Dioli ke Railway platform dengan MySQL database. Repository GitHub: https://github.com/AriscaPramalistyo05/Dioli.git

## Architecture

### Deployment Architecture
```
┌─────────────────────────────────────────────────────────┐
│                      Railway Platform                    │
│  ┌─────────────────┐      ┌─────────────────────────┐  │
│  │   PHP Service   │      │    MySQL Database       │  │
│  │   (Laravel)     │◄────►│    (Railway MySQL)      │  │
│  │                 │      │                         │  │
│  │  - Web Server   │      │  - projek database      │  │
│  │  - PHP 8.x      │      │  - Auto backups         │  │
│  │  - Composer     │      │                         │  │
│  └─────────────────┘      └─────────────────────────┘  │
│           ▲                                             │
│           │ Auto Deploy                                 │
│  ┌────────┴────────┐                                   │
│  │ GitHub Webhook  │                                   │
│  └─────────────────┘                                   │
└─────────────────────────────────────────────────────────┘
            ▲
            │ Push to main
┌───────────┴───────────┐
│   GitHub Repository   │
│ AriscaPramalistyo05/  │
│       Dioli.git       │
└───────────────────────┘
```

## Components and Interfaces

### 1. Railway Configuration Files

#### nixpacks.toml (Build Configuration)
```toml
[phases.setup]
nixPkgs = ["php83", "php83Extensions.pdo_mysql", "php83Extensions.mbstring", "php83Extensions.xml", "php83Extensions.curl", "php83Extensions.gd"]

[phases.install]
cmds = [
    "composer install --no-dev --optimize-autoloader",
    "npm install",
    "npm run build"
]

[phases.build]
cmds = [
    "php artisan config:cache",
    "php artisan route:cache",
    "php artisan view:cache"
]

[start]
cmd = "php artisan migrate --force && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=$PORT"
```

#### Procfile (Alternative)
```
web: php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
```

### 2. Environment Variables

Required environment variables for Railway:

```env
APP_NAME=Dioli
APP_ENV=production
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=false
APP_URL=https://your-app.up.railway.app

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

### 3. Database Migration Strategy

```php
// Deploy command sequence
1. php artisan migrate --force  // Run pending migrations
2. php artisan db:seed --force  // Optional: seed initial data
```

## Data Models

No changes to existing data models. Database schema from projek.sql will be migrated to Railway MySQL.

## Correctness Properties

*A property is a characteristic or behavior that should hold true across all valid executions of a system.*

### Property 1: Database Connection Validity

*For any* valid set of Railway MySQL credentials, the Laravel application SHALL successfully establish a database connection and execute queries.

**Validates: Requirements 2.3, 3.4**

### Property 2: Environment Configuration Completeness

*For any* Railway deployment, all required environment variables (APP_KEY, APP_ENV, DB_*) SHALL be set and accessible by the application.

**Validates: Requirements 3.1, 3.2, 3.3, 3.4, 3.5**

## Error Handling

### Database Connection Errors
- Log connection errors to Laravel log
- Display user-friendly error page (not stack trace in production)
- Retry connection with exponential backoff

### Migration Errors
- Stop deployment if migration fails
- Log detailed error for debugging
- Rollback to previous deployment

### Build Errors
- Railway will show build logs
- Deployment will not proceed if build fails

## Testing Strategy

### Pre-Deployment Checklist
1. Verify all environment variables are set
2. Test database connection
3. Run migrations on staging first
4. Verify storage link works

### Post-Deployment Verification
1. Access application URL
2. Login as admin
3. Verify dashboard loads with correct data
4. Test CRUD operations
5. Verify file uploads work

## Deployment Steps Summary

1. **Create Railway Account** → railway.app
2. **Create New Project** → From GitHub repo
3. **Add MySQL Service** → Railway MySQL plugin
4. **Configure Environment Variables** → Copy from .env.example, update values
5. **Deploy** → Automatic on push to main
6. **Verify** → Access Railway-provided URL
