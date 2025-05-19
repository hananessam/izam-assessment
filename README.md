# Izam Assessment

A Laravel-based web application built with PHP 8+, MySQL, and frontend assets using Vite.

---

## Features

- Authentication system (Laravel Breeze/Jetstream/etc.)
- RESTful routing
- Database migrations and seeders
- MVC architecture
- API-ready

---

## Installation

### Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js and npm (for frontend assets, optional)

---

### 1. Clone the Repository
```bash
git clone https://github.com/hananessam/izam-assessment hananessam-izam-assessment

cd hananessam-izam-assessment
```

### Install dependencies

```bash
composer install
```

```bash
npm install
```

### 2. Set Up Environment
Copy `.env.example` to `.env` and configure your database settings.

```bash
cp .env.example .env
```
Generate an application key:

```bash
php artisan key:generate
```
Run migrations and seed the database:

```bash
php artisan migrate --seed
```

### 3. Run the Application

```bash
composer run dev
```