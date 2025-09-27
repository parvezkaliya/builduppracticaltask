# Setup Instructions for builduppracticaltask

## 1. Clone the Repository

Run the following commands to clone the repository:

```bash
git clone https://github.com/parvezkaliya/builduppracticaltask.git
cd builduppracticaltask
```

## 2. Install Dependencies

Install backend dependencies:

```bash
composer install
```

If frontend dependencies are required:

```bash
npm install
# or
yarn install
```

## 3. Setup Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

Then edit the `.env` file to set your database details:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 4. Generate Application Key

```bash
php artisan key:generate
```

## 5. Run Migrations and Seeders

To migrate the database:

```bash
php artisan migrate
```

To run seeders:

```bash
php artisan db:seed
```

To run both migrate and seed at once:

```bash
php artisan migrate --seed
```

## 6. Serve the Application

Run the local development server:

```bash
php artisan serve
```

The application will run on the default port `8000`. Open in your browser:

```
http://localhost:8000
```

