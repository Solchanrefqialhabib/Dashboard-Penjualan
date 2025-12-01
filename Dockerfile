FROM php:8.2-cli

# Install dependencies yang diperlukan
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy seluruh file proyek ke container
COPY . .

# Install dependency Laravel via Composer
RUN composer install --no-dev --optimize-autoloader

# Atur permission folder storage agar bisa ditulisi
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Buat file database SQLite kosong
RUN touch database/database.sqlite
RUN chown www-data:www-data database/database.sqlite

# Expose port 8000
EXPOSE 8000

# Perintah yang dijalankan saat server nyala:
# 1. Migrasi database (force)
# 2. Isi data dummy (seeding)
# 3. Jalankan server Laravel
CMD php artisan migrate --force && \
    php artisan db:seed --class=PenjualanSeeder --force && \
    php artisan serve --host=0.0.0.0 --port=8000