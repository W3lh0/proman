# proman
PHP web application project as part of my Information Technology Bachelor's degree at Vaasa University of Applied Sciences.
# PHP Web Application Project: "Proman" - Vaasa University of Applied Sciences

---

## 🎯 Project Overview

This repository contains the source code for **"Proman"**, a **simple project management tool** developed as the **final assignment for the PHP course**, forming an integral part of my **Information Technology Bachelor's Degree program** at Vaasa University of Applied Sciences (VAMK).

The primary goal of "Proman" is to **demonstrate a solid understanding of the MVC (Model-View-Controller) architectural pattern** and **provide full CRUD (Create, Read, Update, Delete) functionality for managing projects and their associated tasks**, while illustrating secure database interaction using PDO.

---

## ✨ Key Features

This application includes the following functionalities:

* **Project Management:**
    * Ability to **create, view, edit, and delete** individual project entries.
    * Each project includes fields for name, description, start date, end date, and status.
* **Task Tracking:**
    * **Associating tasks with specific projects.**
    * Tasks can be assigned a name, description, due date, and completion status.
* **User Interface:**
    * **Intuitive and responsive design** for ease of use across different devices.
    * Features clear navigation, robust form validation for data integrity, and informative error messages.
* **Database Interaction:**
    * Utilizes a MySQL/MariaDB database for persistent storage of all project and task data.
    * All database operations are performed using **PDO (PHP Data Objects)** for secure, prepared statements, preventing SQL injection vulnerabilities.
* **Basic Reporting:**
    * Simple functionalities to view and filter projects based on their status or due dates.

---

## 🛠️ Technologies Used

The project is built entirely using **pure PHP** (without external frameworks like Laravel or Symfony) and strictly adheres to the **MVC architectural pattern**.

* **Server-side:** PHP 8.x (or higher)
* **Database:** MariaDB
* **Web Server:** Apache (or PHP's built-in development server for local setup)
* **Client-side:** HTML5, CSS3 (`public/css/style.css`), JavaScript (`public/js/app.js`)
* **Database Abstraction:** PHP Data Objects (PDO)
* **Version Control:** Git & GitHub

---

## 🚀 Installation and Setup Instructions

To get the "Proman" application running on your local development environment, please follow these steps:

1.  **Clone the Repository:**
    Open your terminal or command prompt, navigate to your web server's document root (e.g., `htdocs` for XAMPP, `www` for WAMP), and clone the project:

    ```bash
    git clone [https://github.com/W31h0/proman.git](https://github.com/W31h0/proman.git)
    cd proman
    ```

2.  **Database Configuration:**
    a.  **Create a New Database:**
        * Access your database management tool (e.g., phpMyAdmin, MySQL Workbench, or MySQL command-line client).
        * Create a new empty database named `proman_db`.
    b.  **Import SQL Schema and Data:**
        * The database schema (table structures) is located in `data/structure.sql`.
        * If initial data is provided, it's in `data/content.sql`.
        * Import these files into your newly created database.
            * **Via phpMyAdmin:** Select your database, navigate to the "Import" tab, choose the `.sql` file(s), and click "Go."
            * **Via Command Line (from the `proman` project root directory):**
                ```bash
                mysql -u [your_db_username] -p proman_db < data/structure.sql
                # If you have content.sql with initial data:
                # mysql -u [your_db_username] -p proman_db < data/content.sql
                ```
                (You will be prompted to enter your database password after each command.)
    c.  **Update `config.php`:**
        * Locate the `config.example.php` file in the root of the `proman` directory.
        * **Copy this file and rename the copy to `config.php`**. (Remember, `config.php` is ignored by Git for security reasons).
        * Open the newly created `config.php` file and update the database connection details to match your local setup:

            ```php
            <?php
            // Application general configuration settings
            // This file contains critical information like database credentials.
            // DO NOT ADD THIS FILE DIRECTLY TO GIT VERSION CONTROL FOR SECURITY REASONS!
            // Instead, create a copy of this file named 'config.example.php' and add it to version control.
            // Developers/users will copy 'config.example.php' to 'config.php' and fill in their local details.

            // Database settings
            define('DB_HOST', 'localhost');      // Your database host (e.g., 'localhost')
            define('DB_NAME', 'proman_db');      // The name of your database
            define('DB_USER', 'root');           // Your database username (e.g., 'root' for XAMPP/WAMP/Laragon)
            define('DB_PASS', '');               // Your database password (e.g., '' for XAMPP/WAMP/Laragon default)

            // Other application-specific settings (optional)
            // define('APP_NAME', 'Proman Project Management');
            // define('DEBUG_MODE', true); // Set to false in production
            // define('BASE_URL', 'http://localhost/proman'); // Base URL for the application
            ```

3.  **Run the Web Server:**
    a.  **Using XAMPP/WAMP/Laragon:**
        * Ensure your Apache/Nginx web server is running.
        * Open your web browser and navigate to `http://localhost/proman` (or `http://localhost:8080/proman` if you are using a non-standard port).
    b.  **Using PHP's Built-in Development Server (for quick testing, from the `proman` directory):**
        ```bash
        php -S localhost:8000
        ```
        Then, open your web browser and navigate to `http://localhost:8000`.

---

## 📸 Screenshots (Optional but Recommended for School Projects)

[Insert screenshots here to visually demonstrate key features of your application.
Example:
![Screenshot of Home Page](screenshots/homepage.png)
*Figure 1: Application Home Page*

![Screenshot of Project Listing](screenshots/project_list.png)
*Figure 2: Project Listing*
]

---

## 📂 Project Structure

The project strictly adheres to the **MVC (Model-View-Controller) architectural pattern**. This modular design promotes separation of concerns, making the codebase more organized, maintainable, and scalable.

## 👨‍💻 Author

**[Ilkka Ratilainen]**
Student Number: e2101506
Vaasa University of Applied Sciences (VAMK)
[Optional: Your GitHub profile link, e.g., https://github.com/W31h0]

---