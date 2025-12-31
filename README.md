# Farmac

Farmac is a Laravel-based e-commerce and inventory management application focused on product, category, and contact management. This repository contains the application source, migrations, seeders, service classes, and frontend assets built with Vite and Tailwind.

Repository: https://github.com/Codes-Break-Ltd/farmac.git

## Overview

This project provides a simple inventory/catalog system tailored for pharmacy-style product listings, with an admin interface for managing categories, subcategories, products, and contacts. It follows a conventional Laravel application structure.

## Key Features

- Manage Categories, SubCategories and Products
- Contact management
- Database migrations and seeders for sample data
- Frontend assets using Vite + Tailwind
- Test scaffolding with Pest/PHPUnit

## Requirements

- PHP 8.0+ (check composer.json for exact constraint)
- Composer
- Node.js 14+ and npm
- A supported database (MySQL, MariaDB, Postgres)

## Quick Start

1. Clone the repository:

```
git clone https://github.com/Codes-Break-Ltd/farmac.git
cd farmac
```

2. Install PHP dependencies:

```
composer install
```

3. Copy environment file and configure:

```
cp .env.example .env
```

Edit `.env` and set your `DB_*` values and other credentials.

4. Generate the app key:

```
php artisan key:generate
```

5. Run migrations and seeders:

```
php artisan migrate
php artisan db:seed
```

6. Install frontend dependencies and run Vite:

```
npm install
npm run dev   # development
npm run build # production
```

7. Serve the application locally:

```
php artisan serve
```

Open `http://127.0.0.1:8000` in your browser.

## Running Tests

Execute tests with Pest or PHPUnit:

```
./vendor/bin/pest
```
or
```
./vendor/bin/phpunit
```

## Common Commands

- `composer install` — install PHP packages
- `npm install` — install frontend packages
- `php artisan migrate` — run migrations
- `php artisan db:seed` — run seeders
- `php artisan tinker` — interactive console
