<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Project Setup

This is a guide to set up a Laravel project. Follow these steps to install all necessary dependencies and get the project running.

## Prerequisites

- PHP (>=7.3)
- Composer
- Node.js with npm
- MySQL

## Installation Steps

1. **Clone the Repository**
    ```bash
    git clone [<repository-url>](https://github.com/Soufianeakif/carrent)
    cd carnet
    ```

2. **Install PHP Dependencies**
    ```bash
    composer install
    ```

3. **Copy `.env.example` to `.env`**
    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5. **Configure Environment Variables**

    Open the `.env` file and configure the necessary environment variables. Set your MySQL database connection settings:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6. **Run Database Migrations**
    ```bash
    php artisan migrate
    ```

7. **Install Node.js Dependencies**
    ```bash
    npm install
    ```

8. **Compile Assets**
    ```bash
    npm run dev
    ```

9. **Start the Development Server**
    ```bash
    php artisan serve
    ```

    The application should now be accessible at `http://localhost:8000`.

## Additional Commands

- **Build assets for production**
    ```bash
    npm run production
    ```

- **Run tests**
    ```bash
    php artisan test
    ```

## Troubleshooting

- Ensure that your PHP version is compatible with the Laravel version you are using.
- Ensure that the database service is running and the credentials in the `.env` file are correct.
- If you encounter permission issues, try running `composer install` and `npm install` with elevated privileges (e.g., using `sudo` on Unix-based systems).

## Useful Links

- [Laravel Documentation](https://laravel.com/docs)
- [Composer Documentation](https://getcomposer.org/doc/)
- [Node.js Documentation](https://nodejs.org/en/docs/)
- [NPM Documentation](https://docs.npmjs.com/)
- [MySQL Documentation](https://dev.mysql.com/doc/)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
