# AddressBookApp

A full-featured Address Book web application and RESTful API built with Laravel 8, Laravel UI, MySQL, and JWT authentication. Dockerized for local development with Nginx and MySQL support.

---

## 🚀 Features

- Laravel UI Bootstrap-based Auth (Login/Register)
- Address Book CRUD
- Default "From" and "To" address flags (only one of each per user)
- JWT-secured RESTful API
- Docker support (PHP-FPM, MySQL, Nginx)
- MySQL migrations + seeders
- Postman collection for testing API endpoints

---

## ⚙️ Tech Stack

- PHP 8.1
- Laravel 8
- MySQL 8
- Docker + Docker Compose
- Nginx
- JWT Auth (tymon/jwt-auth)

---

## 📦 Prerequisites

- Docker & Docker Compose
- Git
- Composer (for non-Docker setup)

---

## 🐳 Docker Setup (Recommended)

```bash
# Build and start containers
docker-compose up -d --build

# Run Laravel migrations inside app container
docker exec -it laravel-app php artisan migrate

# (Optional) Run seeders
docker exec -it laravel-app php artisan db:seed


git clone https://github.com/your-username/AddressBookApp.git
cd AddressBookApp

composer install
cp .env.example .env
php artisan key:generate

# Update .env with your MySQL DB details
php artisan migrate --seed
php artisan serve
