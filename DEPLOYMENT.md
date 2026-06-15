# Deployment & Operations Guide

## Pre-Deployment Checklist

### Code Quality

- [ ] All tests passing: `php artisan test`
- [ ] No PHP errors: `php -l app/` (recursive check all files)
- [ ] No security vulnerabilities: `composer audit`
- [ ] Code review completed
- [ ] All dependencies up to date: `composer update --dry-run`

### Security

- [ ] `.env.production` prepared with secure values
- [ ] Database password is strong (16+ characters, mixed case, numbers, symbols)
- [ ] APP_KEY is generated: `php artisan key:generate`
- [ ] APP_DEBUG=false in production
- [ ] CORS settings configured if API used
- [ ] SSL certificate ready
- [ ] Firewall rules prepared

### Database

- [ ] Backup taken of existing database (if migrating)
- [ ] Migration tested on staging: `php artisan migrate --pretend`
- [ ] Data migration scripts tested
- [ ] Rollback plan prepared

### Server Infrastructure

- [ ] Web server (Nginx/Apache) installed and configured
- [ ] PHP 8.1+ installed with required extensions
- [ ] MySQL 8.0+ installed and running
- [ ] File system permissions configured
- [ ] SSL certificate installed
- [ ] DNS records updated
- [ ] Email/SMTP configured

---

## Production Deployment Steps

### 1. Deploy Code

```bash
cd /var/www/cocoms

# Pull latest code
git pull origin main

# Or for first deployment
git clone <repository-url> .
```

### 2. Install Dependencies

```bash
composer install --no-dev --optimize-autoloader
npm install --production  # if applicable
npm run build  # if applicable
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env.production

# Edit with production values
nano .env.production

# Generate app key
php artisan key:generate --env=production

# Symlink environment file
ln -s .env.production .env
```

### 4. Database Migration

```bash
# Run migrations
php artisan migrate --force

# Seed initial data (optional)
php artisan db:seed --class=InitialSeeder
```

### 5. Caching

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize
```

### 6. Storage Setup

```bash
# Create storage symlink
php artisan storage:link

# Set permissions
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 7. Web Server Configuration

```bash
# Restart PHP-FPM
sudo systemctl restart php8.1-fpm

# Restart Nginx
sudo systemctl restart nginx

# Or Apache
sudo systemctl restart apache2
```

### 8. Verification

```bash
# Test application
curl -I https://your-domain.com/login

# Check application logs
tail -f storage/logs/laravel.log

# Verify file uploads work
# (manual test through UI)
```

---

## Server Configuration Examples

### Nginx Configuration

```nginx
server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    
    server_name cocoms.yourdomain.com;
    root /var/www/cocoms/public;

    # SSL configuration
    ssl_certificate /etc/letsencrypt/live/cocoms.yourdomain.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/cocoms.yourdomain.com/privkey.pem;
    ssl_protocols TLSv1.2 TLSv1.3;
    ssl_ciphers HIGH:!aNULL:!MD5;
    ssl_prefer_server_ciphers on;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;

    # Logging
    access_log /var/log/nginx/cocoms_access.log;
    error_log /var/log/nginx/cocoms_error.log;

    # Index file
    index index.php;

    # Routing
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # PHP handling
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Deny access to hidden files
    location ~ /\. {
        deny all;
    }

    # File upload limits
    client_max_body_size 50M;

    # Gzip compression
    gzip on;
    gzip_vary on;
    gzip_proxied any;
    gzip_comp_level 6;
    gzip_types text/plain text/css text/xml text/javascript 
               application/json application/javascript application/xml+rss 
               application/rss+xml font/truetype font/opentype 
               application/vnd.ms-fontobject image/svg+xml;
}

# HTTP redirect to HTTPS
server {
    listen 80;
    listen [::]:80;
    server_name cocoms.yourdomain.com;

    location /.well-known/acme-challenge/ {
        root /var/www/cocoms/public;
    }

    location / {
        return 301 https://$server_name$request_uri;
    }
}
```

### Apache Configuration

```apache
<VirtualHost *:443>
    ServerName cocoms.yourdomain.com
    DocumentRoot /var/www/cocoms/public

    # SSL
    SSLEngine on
    SSLCertificateFile /etc/letsencrypt/live/cocoms.yourdomain.com/fullchain.pem
    SSLCertificateKeyFile /etc/letsencrypt/live/cocoms.yourdomain.com/privkey.pem

    # Rewrite rules
    <Directory /var/www/cocoms/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted

        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule ^ index.php [QSA,L]
        </IfModule>
    </Directory>

    # Security headers
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-XSS-Protection "1; mode=block"

    # File upload
    php_value upload_max_filesize 50M
    php_value post_max_size 50M
</VirtualHost>

<VirtualHost *:80>
    ServerName cocoms.yourdomain.com
    Redirect permanent / https://cocoms.yourdomain.com/
</VirtualHost>
```

---

## Backup & Recovery

### Automated Backup Script

```bash
#!/bin/bash
# /opt/scripts/backup-cocoms.sh

BACKUP_DIR="/var/backups/cocoms"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
DB_NAME="cocoms_laravel"
DB_USER="cocoms_user"
DB_PASSWORD="$MYSQL_PASSWORD"
RETENTION_DAYS=30

mkdir -p $BACKUP_DIR

# Database backup
mysqldump -u $DB_USER -p$DB_PASSWORD $DB_NAME | gzip > \
    $BACKUP_DIR/db_backup_$TIMESTAMP.sql.gz

# Application files backup (optional)
tar -czf $BACKUP_DIR/app_backup_$TIMESTAMP.tar.gz \
    /var/www/cocoms

# Uploaded files backup (optional)
tar -czf $BACKUP_DIR/storage_backup_$TIMESTAMP.tar.gz \
    /var/www/cocoms/storage/app

# Remove old backups
find $BACKUP_DIR -name "*.sql.gz" -mtime +$RETENTION_DAYS -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +$RETENTION_DAYS -delete

# Log backup
echo "Backup completed: $TIMESTAMP" >> /var/log/cocoms-backup.log
```

Add to crontab:

```bash
# Daily backup at 2 AM
0 2 * * * /opt/scripts/backup-cocoms.sh
```

### Recovery Procedure

```bash
# 1. Stop application
sudo systemctl stop nginx
sudo systemctl stop php8.1-fpm

# 2. Restore database
mysql -u root -p cocoms_laravel < db_backup_YYYYMMDD_HHMMSS.sql

# 3. Restore files (if needed)
tar -xzf storage_backup_YYYYMMDD_HHMMSS.tar.gz -C /var/www/cocoms/

# 4. Restart services
sudo systemctl start php8.1-fpm
sudo systemctl start nginx

# 5. Verify
curl -I https://your-domain.com/login
```

---

## Monitoring & Maintenance

### Log Monitoring

```bash
# Real-time log monitoring
tail -f storage/logs/laravel.log

# Error logs
grep -i "error" storage/logs/laravel.log | tail -20

# Slow queries (if enabled)
tail -f storage/logs/slow-queries.log
```

### Database Optimization

```bash
# Analyze tables
ANALYZE TABLE letters, companies, work_packages, tags_tags;

# Optimize tables
OPTIMIZE TABLE letters, companies, work_packages, tags_tags;

# Check table integrity
CHECK TABLE letters, companies, work_packages, tags_tags;
```

### System Health Check

```bash
#!/bin/bash
# Check disk space
df -h | grep -E "^/dev/"

# Check memory usage
free -h

# Check CPU usage
top -bn1 | head -20

# Check active PHP processes
ps aux | grep php-fpm

# Check Nginx processes
ps aux | grep nginx

# Check MySQL status
mysql -u root -p -e "SHOW STATUS;"
```

---

## Troubleshooting

### Application won't start

```bash
# Check app key
grep "^APP_KEY=" .env

# Clear caches
php artisan cache:clear
php artisan view:clear

# Check permissions
ls -la storage/

# Check error logs
tail -50 storage/logs/laravel.log
```

### Database connection errors

```bash
# Test connection
mysql -u cocoms_user -p -h localhost -D cocoms_laravel

# Check credentials in .env
grep "^DB_" .env

# Verify database exists
mysql -u root -p -e "SHOW DATABASES;"

# Check user privileges
mysql -u root -p -e "SHOW GRANTS FOR 'cocoms_user'@'localhost';"
```

### File upload fails

```bash
# Check storage permissions
ls -la storage/app/

# Check symlink
ls -la public/storage

# Create symlink if missing
php artisan storage:link

# Check disk space
df -h storage/
```

### Slow application

```bash
# Check slow queries
SET GLOBAL slow_query_log = 'ON';
SET GLOBAL long_query_time = 2;

# Add indexes
CREATE INDEX idx_letters_docref ON letters(docref);
CREATE INDEX idx_companies_name ON companies(name);

# Optimize autoloader
composer dump-autoload --optimize
```

### High memory usage

```bash
# Increase PHP memory limit
php_value memory_limit = 512M

# Check for memory leaks
grep -i "memory" storage/logs/laravel.log | tail -10

# Restart PHP-FPM
sudo systemctl restart php8.1-fpm
```

---

## Performance Optimization

### PHP Configuration

```ini
; /etc/php/8.1/fpm/pool.d/www.conf
pm = dynamic
pm.max_children = 50
pm.start_servers = 10
pm.min_spare_servers = 5
pm.max_spare_servers = 20
pm.max_requests = 500

; /etc/php/8.1/mods-available/opcache.ini
opcache.enable=1
opcache.memory_consumption=256
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.validate_timestamps=0
```

### MySQL Configuration

```ini
; /etc/mysql/mysql.conf.d/mysqld.cnf
max_connections=1000
query_cache_type=1
query_cache_size=256M
key_buffer_size=256M
innodb_buffer_pool_size=512M
innodb_log_file_size=100M
```

### Nginx Configuration (performance)

```nginx
# Enable gzip compression
gzip on;
gzip_comp_level 6;
gzip_types text/plain text/css application/json;

# Cache static files
location ~* \.(jpg|jpeg|png|gif|ico|css|js)$ {
    expires 30d;
    add_header Cache-Control "public, immutable";
}
```

---

## Scaling Considerations

### For 10,000+ users

- Implement database replication
- Use Redis for caching
- Consider CDN for static files
- Implement load balancer
- Separate read/write databases
- Archive old data

### For high file volume

- Implement S3/cloud storage
- Use separate file server
- Implement cleanup/archival
- Monitor disk space

---

## Security Hardening

### Firewall Rules

```bash
# Allow SSH (admin only)
ufw allow from 203.0.113.0/24 to any port 22

# Allow HTTP/HTTPS
ufw allow 80/tcp
ufw allow 443/tcp

# Block MySQL externally (internal only)
ufw deny from any to any port 3306

# Enable firewall
ufw enable
```

### SSL/TLS Configuration

```bash
# Generate strong certificate
certbot certonly --webroot -w /var/www/cocoms/public \
    -d cocoms.yourdomain.com

# Auto-renewal
certbot renew --quiet --post-hook "systemctl reload nginx"

# Test SSL
curl -I https://cocoms.yourdomain.com
```

### Regular Updates

```bash
# Update OS
sudo apt update && sudo apt upgrade

# Update PHP dependencies
composer update

# Update Node dependencies (if applicable)
npm update

# Check vulnerabilities
composer audit
npm audit
```

---

## Support
For bugs and feature requests, please use the issues section of this repository.

Commercial support is also available; contact [Christakis Mina](mailto://christosmina+cocoms@gmail.com) for more information.

---

**Last Updated**: 2026-06-15  
**Version**: 2.0.1 (UI Redesign)
