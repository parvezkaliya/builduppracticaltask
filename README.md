# Setup Instructions for builduppracticaltask

## 1. Repository Clone karna

Repository ko clone karne ke liye niche command run karein:

```bash
git clone https://github.com/parvezkaliya/builduppracticaltask.git
cd builduppracticaltask
```

## 2. Dependencies install karna

Backend dependencies install karne ke liye:

```bash
composer install
```

Agar frontend dependencies chahiye ho to:

```bash
npm install
# ya
yarn install
```

## 3. Environment file set karna

```bash
cp .env.example .env
```

Phir `.env` file mein database details set karein:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 4. Application key generate karna

```bash
php artisan key:generate
```

## 5. Migrations aur Seeders chalana

Database migrate karne ke liye:

```bash
php artisan migrate
```

Seeders chalane ke liye:

```bash
php artisan db:seed
```

Ek saath migrate aur seed karne ke liye:

```bash
php artisan migrate --seed
```

## 6. Server run karna (local development)

```bash
php artisan serve
```

Is command ke baad application default port `8000` pe chalega. Browser mein open karein:

```
http://localhost:8000
```

---
