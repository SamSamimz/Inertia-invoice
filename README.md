# Invoice System

This is a learning project created to explore and understand the use of Inertia.js with Laravel and Vue.js. It simulates an invoice management system to demonstrate how these technologies can be used together. The project showcases how to create, manage, send via gmail using Inertia.js and Vue.js with Laravel as the backend. 

## Features
- Create and manage invoices
- Track invoice status
- Generate PDF invoices
- User authentication and authorization

## Prerequisites

- PHP >= 8.0
- Composer
- Node.js >= 16.x
- NPM or Yarn

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/SamSamimz/Inertia-invoice.git
   cd Inertia-invoice
   ```

2. **Install PHP dependencies:**

   ```bash
   composer install
   ```

3. **Install JavaScript dependencies:**

   ```bash
   npm install
   ```

4. **Copy the environment file:**

   ```bash
   cp .env.example .env
   ```

5. **Generate the application key:**

   ```bash
   php artisan key:generate
   ```
   
6. **Configuration :**

Update the `.env` file with your database connection and other configuration settings.

- **Database**: Configure your database settings in the `.env` file:

  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=invoice_system
  DB_USERNAME=root
  DB_PASSWORD=
  ```

- **Mail Configuration**: Set up your mail configuration for sending invoices:

  ```env
  MAIL_MAILER=smtp
  MAIL_HOST=smtp.gmail.com
  MAIL_PORT=587
  MAIL_USERNAME=your user name
  MAIL_PASSWORD=app password form accounts.google
  MAIL_ENCRYPTION=tls
  MAIL_FROM_ADDRESS=email address
  MAIL_FROM_NAME="${APP_NAME}"
  ```


7. **Run migrations:**

   ```bash
   php artisan migrate
   ```
8. **Seeding the migration:**

   ```bash
   php artisan db:seed
   ```

9. **Build the assets:**

   ```bash
   npm run dev
   ```

10. **Start the development server:**

   ```bash
   php artisan serve
   ```

11. **Open your browser and visit:**

   ```
   http://127.0.0.1:8000/
   ```

