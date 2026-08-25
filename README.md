# shorturl-app

ShortURL is a CodeIgniter 4 application for creating short links, generating QR codes, and tracking link usage statistics.

## Features

- Create short URLs from the homepage
- Support custom slugs in some cases
- Generate QR codes automatically for new short URLs
- Redirect short URLs to their original destinations
- Track link visits
- Provide admin pages for URL management, history, and statistics

## Tech Stack

- PHP 7.4
- PHP 8.1
- CodeIgniter 4
- MySQL
- Apache
- Docker / Docker Compose
- `endroid/qr-code` for QR code generation

## Important Structure

- `app/Controllers/Home.php` homepage, short URL creation, redirect handling, and statistics logging
- `app/Controllers/ShortURL.php` admin management for short URLs
- `app/Controllers/LogURL.php` short URL history page
- `app/Controllers/StatisticsURL.php` statistics page
- `app/Models/ShortUrlModel.php` data access for the `short_url` table
- `app/Models/StatisticsUrlModel.php` data access for the `statistics_url` table
- `app/Database/Migrations/` database schema definitions
- `public/js/` frontend scripts for home, admin, log, and statistics pages

## Database

This project uses two main tables:

- `short_url` stores the original URL, short URL, QR code, and timestamps
- `statistics_url` stores visit records for each short URL

## Installation with Docker

### Prerequisites

- Docker Desktop installed
- Docker engine running

### Setup Steps

1. Clone this repository or open the project locally.
2. Create a local environment file:

```bash
cp .env.example .env
```

3. Verify that `.env` contains the correct database configuration for your environment.
4. Start the containers:

```bash
docker-compose up -d
```

5. Start the application once and let the container install PHP dependencies automatically.

6. Run migrations to create the database tables:

```bash
docker exec shorturl_www /bin/bash -c 'php spark migrate'
```

7. Open the application in your browser:

```text
http://localhost:8080
```

## Default `.env.example` Values

The current project configuration includes:

```env
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/'
APP_PORT = 8080
database.default.hostname = db
database.default.database = shorturl
database.default.username = shorturl
database.default.password = 123456
database.default.DBDriver = MySQLi
MYSQL_DATABASE = shorturl
MYSQL_USER = shorturl
MYSQL_PASSWORD = 123456
MYSQL_ROOT_PASSWORD = 123456
```

## How It Works

1. A user submits a URL from the homepage.
2. The system checks whether that URL already exists.
3. If it does not exist, the system creates a short URL and QR code.
4. When the short URL is opened, the system records a visit.
5. The user is redirected to the original URL.

## Main Routes

- `GET /` homepage
- `POST /home/addurl` create a short URL
- `GET /shorturl` admin page for managing URLs
- `GET /logurl` URL history page
- `GET /statisticsurl` URL statistics page

## Notes

- The Docker image installs the PHP GD extension for QR code generation.
- This project is currently based on CodeIgniter 4.1.9, so the Docker image is pinned to PHP 8.1, which is the newest PHP line officially supported by this framework version.
- The container installs Composer dependencies automatically on startup if `vendor/autoload.php` is missing.
- This project currently enables CodeIgniter `AutoRoute`, so routes should be reviewed before production use.
- Local environment settings should stay in `.env`, which is now ignored by git.
