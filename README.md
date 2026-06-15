![CoCoMS Logo](https://raw.githubusercontent.com/chrmina/cocoms/main/public/img/main.png)

# CoCoMS - Construction Correspondence Management System

## Overview

**CoCoMS** is a modern Laravel 12 application for managing construction project correspondence, documents, and communications. It provides role-based access control, file management, full-text search, and organized tagging of documents.

**Project Type**: Document Management System  
**Framework**: Laravel 12  
**Database**: MySQL 8.0+  
**PHP**: 8.1+  
**License**: F/OSS (GNU GPL)

Refer to [Docs](https://raw.githubusercontent.com/chrmina/cocoms/main/Docs/home.md) for details about usage, etc.

---

## Features

### Core Functionality
- **Letter Management**: Create, read, update, delete correspondence letters
- **File Management**: Upload, download, and organize project files
- **Sender & Recipient Management**: Maintain contact databases
- **Work Packages**: Organize letters by project work packages
- **Tagging System**: Categorize and tag documents for easy retrieval
- **Full-Text Search**: Search across all resources (letters, senders, recipients, tags, packages)
- **Excel Export**: Export data to Excel for reporting

### Security Features
- **Role-Based Access Control**: Three roles (User, Editor, Admin)
- **Authentication**: Secure login with password hashing
- **Authorization**: Fine-grained permissions per resource
- **CSRF Protection**: Built-in Laravel CSRF tokens
- **SQL Injection Prevention**: Parameterized queries via Eloquent ORM

### User Roles
- **User (Viewer)**: Can view letters, senders, recipients, work packages, and tags
- **Editor**: Can create and update letters, senders, recipients, work packages, and tags
- **Admin**: Can perform all operations including deletion

---

## Installation & Setup

### Prerequisites
- PHP 8.1 or higher
- MySQL 8.0 or higher
- Composer 2.0+
- Git
- Node.js 16+ (for assets, if applicable)

### Step 1: Clone Repository
```bash
git clone <repository-url> cocoms
cd cocoms
```

### Step 2: Install Dependencies
```bash
composer install
npm install  # if asset compilation needed
```

### Step 3: Environment Configuration
```bash
# Copy example environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Update .env with your database credentials
nano .env
```

**Required .env variables:**
```env
APP_NAME=CoCoMS
APP_ENV=production
APP_KEY=<generated-by-key:generate>
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cocoms_laravel
DB_USERNAME=cocoms_user
DB_PASSWORD=<strong-password>

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<mailtrap-username>
MAIL_PASSWORD=<mailtrap-password>
MAIL_FROM_ADDRESS=no-reply@cocoms.local
```

### Step 4: Database Setup
```bash
# Create database
mysql -u root -p -e "CREATE DATABASE cocoms_laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Run migrations
php artisan migrate

# (Optional) Seed initial data
php artisan db:seed --class=InitialSeeder
```

### Step 5: Cache Configuration
```bash
# Cache config for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Clear if needed during development
php artisan cache:clear
php artisan view:clear
```

### Step 6: Storage & Permissions
```bash
# Create storage symlink for file downloads
php artisan storage:link

# Set permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Step 7: Start Application
```bash
# Development
php artisan serve

# Production (use web server like Nginx or Apache)
# Configure web server to point to public/ directory
```

---

## Deployment Guide

### Production Environment Setup

#### Server Configuration (Nginx Example)
```nginx
server {
    listen 80;
    server_name cocoms.yourdomain.com;
    
    root /var/www/cocoms/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

#### SSL Certificate (Let's Encrypt)
```bash
sudo certbot certonly --webroot -w /var/www/cocoms/public -d cocoms.yourdomain.com
sudo certbot renew --dry-run  # Test auto-renewal
```

#### PHP-FPM Configuration
```bash
# Check PHP version
php -v

# Ensure PHP-FPM is running
sudo systemctl status php8.1-fpm
sudo systemctl start php8.1-fpm
```

### Database Backup Strategy

**Automated Backup Script** (`scripts/backup-database.sh`):
```bash
#!/bin/bash
BACKUP_DIR="/var/backups/cocoms"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
DB_NAME="cocoms_laravel"
DB_USER="cocoms_user"

mkdir -p $BACKUP_DIR

mysqldump -u $DB_USER -p $DB_NAME | gzip > $BACKUP_DIR/cocoms_$TIMESTAMP.sql.gz

# Keep only last 30 days
find $BACKUP_DIR -name "cocoms_*.sql.gz" -mtime +30 -delete
```

Add to crontab:
```bash
0 2 * * * /path/to/scripts/backup-database.sh
```

### Deployment Checklist

- [ ] Code deployed to server
- [ ] `.env` configured with production values
- [ ] Database created and migrations run
- [ ] Storage directory permissions set (775)
- [ ] Web server configured (Nginx/Apache)
- [ ] SSL certificate installed
- [ ] Firewall rules configured (allow 80, 443; restrict others)
- [ ] PHP opcache enabled
- [ ] Log rotation configured
- [ ] Backup system tested
- [ ] Monitoring setup (error logs, performance)
- [ ] Health check endpoint tested

---

## Usage Guide

### Login
1. Navigate to `https://your-domain.com/login`
2. Enter username and password
3. Click "Login"

### Managing Letters
1. **Create**: Dashboard → Letters → Create Letter
2. **View**: Dashboard → Letters → Click letter title
3. **Edit**: Letters → Select letter → Edit
4. **Delete**: Letters → Select letter → Delete (Admin only)

### File Upload
1. When creating/editing a letter, scroll to "File"
2. Click "Choose File"
3. Select file (supports PDF, DOC, DOCX, XLS, XLSX, JPG, PNG, TXT)
4. Max size: 50MB

### Search
1. Click "Search" in navigation or on resource index page
2. Enter search term
3. Results show across matching fields

### Export to Excel
1. On any index page (Letters, Senders, Recipients, Work Packages)
2. Click "Export to Excel" button

### Tag Management
1. View any letter
2. Scroll to "Tags" section
3. To add: Select tag from dropdown, click "Add Tag"
4. To remove: Click × next to tag name

---

## Authorization Model

### Role Capabilities

| Action | User | Editor | Admin |
|--------|------|--------|-------|
| View Letters | ✓ | ✓ | ✓ |
| Create Letter | ✗ | ✓ | ✓ |
| Update Letter | ✗ | ✓ | ✓ |
| Delete Letter | ✗ | ✗ | ✓ |
| Create Resources | ✗ | ✓ | ✓ |
| Update Resources | ✗ | ✓ | ✓ |
| Delete Resources | ✗ | ✗ | ✓ |
| Manage Users | ✗ | ✗ | ✓ |

---

## Database Schema

### Core Tables

**letters**
- id (UUID) - Primary key
- sender_id (UUID) - FK to senders
- recipient_id (UUID) - FK to recipients
- work_package_id (UUID) - FK to work_packages
- docref (string) - Document reference
- subject (string) - Letter subject
- contents (text) - Letter body
- docdate (date) - Document date
- confidential (boolean) - Confidentiality flag
- replyreq (boolean) - Reply required flag
- filelink (string) - File path in storage
- file_dir (string) - Directory name
- tag_count (integer) - Count of tags

**senders** / **recipients**
- id (UUID)
- name (string)
- email (string, nullable)
- address (text, nullable)
- representative, contact, telephone, mobile, fax (optional)

**work_packages**
- id (UUID)
- number, name (string)
- wp_coordinator, wp_qs (optional)

**tags_tags** (Tag definitions)
- id (UUID)
- namespace, slug, label (string)
- counter (integer)
- tag_key (string)

**tags_tagged** (Tag associations)
- tag_id (FK)
- fk_id (UUID)
- fk_table (string)

**users**
- id (UUID)
- username, email (unique)
- password (hashed)
- first_name, last_name (optional)
- role (admin, editor, user)
- active (boolean)

---

## Troubleshooting

### Common Issues

#### 1. "404 Not Found" on all routes
Configure web server to point document root to `public/` directory

#### 2. "SQLSTATE[HY000]: General error"
Ensure database exists and migrations have run:
```bash
php artisan migrate
```

#### 3. File upload fails
Check:
- Storage directory is writable: `chmod -R 775 storage`
- Storage is symlinked: `php artisan storage:link`
- Max upload size in php.ini

#### 4. "Unauthorized" even with correct password
Check:
- User active status
- User role is one of: admin, editor, user
- Authorization policies

#### 5. Slow search queries
Add database indexes:
```sql
CREATE INDEX idx_letters_subject ON letters(subject);
CREATE INDEX idx_senders_name ON senders(name);
```

---

## Maintenance

### Regular Tasks

#### Daily
- Monitor error logs: `storage/logs/laravel.log`

#### Weekly
- Test backup restoration

#### Monthly
- Database optimization
- SSL certificate expiry check

### Updates
```bash
composer update
php artisan cache:clear
php artisan view:clear
composer dump-autoload --optimize
```

---

## Support
For bugs and feature requests, please use the issues section of this repository.

Commercial support is also available; contact [Christakis Mina](mailto://christosmina+cocoms@gmail.com) for more information.

## Contributing

If you'd like to contribute new features, enhancements or bug fixes to CoCoMS, please read the [Contribution Guidelines](Docs/contributing.md) for detailed instructions.

## Disclaimer ##
CoCoMS is distributed in the hope that it will be useful, but without any warranty: without even the implied warranty of merchantability or fitness for a particular purpose. While every precaution has been taken in the creation of CoCoMS, in no event shall the creators and contributors of CoCoMS be liable to any party for direct, indirect, special, incidental, or consequential damages, including lost profits, arising out of the use of CoCoMS and/or of information contained in CoCoMS documents and/or from the use of programs and source code that may accompany it, even if the creators of CoCoMS have been advised of the possibility of such damage. CoCoMS is provided on as "as is" basis, and its creators have no obligations to provide maintenance, support, updates, enhancements, or modifications.

## License ##
Copyright [Christakis Mina](https://chrmina.com).

CoCoMS is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

CoCoMS is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the [GNU General Public License](https://www.gnu.org/licenses/gpl-3.0.en.html) for more details.

---

## Version History

- **v2.0.1** (2026-06-15): UI redesign
- **v2.0.0** (2026-06-14): Laravel 12 refactor complete
- **v1.0.0**: Original CakePHP version
