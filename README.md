
# Laravel Student Management System

This project is a simple Student Management System built with Laravel 11. It allows the management of students, their qualifications, and courses they are enrolled in. It includes features such as CRUD operations for students, API development for student management, authentication using Laravel Sanctum, and dynamic course assignment using AJAX.

## Features

- **Student CRUD Operations:** Add, edit, delete, and list students.
- **Multiple Course Assignment:** Assign multiple courses to students.
- **API Development:** Expose a RESTful API to manage students.
- **Search Functionality:** Search students by name or email.
- **Authentication:** User authentication using Laravel Sanctum.
- **AJAX:** Dynamically add and delete courses for students.

## Installation

### Prerequisites

- PHP 8.0+ installed
- Composer installed
- MySQL or any other supported database
- Node.js and NPM (for frontend build process)

### Steps to Install

1. **Clone the Repository:**
   First, clone the repository to your local machine:
   ```bash
   git clone https://github.com/anushkaMadhushan/sms_laravel.git
   cd sms_laravel
   ```

2. **Install Composer Dependencies:**
   Run the following command to install all the required PHP dependencies for the project:
   ```bash
   composer install
   ```

3. **Set Up Environment File:**
   Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

4. **Configure Your Database:**
   Open the `.env` file and configure the database connection. Set the `DB_*` parameters to match your MySQL database configuration. Example:
   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sms_laravel
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate the Application Key:**
   Run the following command to generate an application key, which will be used for encrypting data:
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations:**
   This will create the necessary tables in the database:
   ```bash
   php artisan migrate
   ```

7. **Seed the Database (Optional):**
   If you want to populate the database with sample data, you can run:
   ```bash
   php artisan db:seed
   ```

8. **Install Frontend Dependencies:**
   Install frontend dependencies using NPM:
   ```bash
   npm install
   ```

9. **Compile Frontend Assets:**
   Build the frontend assets for production:
   ```bash
   npm run dev
   ```

10. **Run the Development Server:**
    Start the Laravel development server:
    ```bash
    php artisan serve
    ```

    This will start the server at http://127.0.0.1:8000.

11. **Access the Application:**
    Open your browser and go to http://127.0.0.1:8000 to view the application.
    You can also access the Student Management System at http://localhost/sms/students.

### Default Admin User

To log in as an admin, you can use the following credentials:

- **Username:** admin
- **Password:** 123456

You can insert the admin user into the database with the following SQL command:
```sql
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$69WK9yADCLccBGcZNNQMJ.ChHF8xi0PI7sK8uVSS0NeXDcZf9OBt6', '', NULL, NULL);
```