# Advisor Zaroori Hai (AZH)

Advisor Zaroori Hai is a web-based platform that connects users with financial advisors. It allows users to register, book appointments with advisors, and access educational resources. Advisors can register, manage their profiles, and approve booking requests.

## Table of Contents

- [Features](#features)
- [Project Structure](#project-structure)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Documentation](#documentation)

## Features

*   **User Module**:
    *   User Registration and Login.
    *   Browse Advisors by expertise and location.
    *   Book appointments with advisors.
    *   View booking status.
    *   Post general financial queries.
    *   Access E-Learning and Knowledge Base resources.
    *   Provide feedback and receive E-Certificates.

*   **Advisor Module**:
    *   Advisor Registration (with SEBI Registration Number validation) and Login.
    *   Profile Management (Bio, Experience, Expertise, Profile Picture).
    *   View and Approve booking requests from users.
    *   Email notifications for bookings and approvals.

*   **Admin Module**:
    *   Manage Users and Advisors (Approve/Disapprove Advisor accounts).
    *   Manage Dynamic Pages.
    *   Manage Solutions/Services offered.
    *   Manage Feedback Forms and View Feedback.

## Project Structure

The project is organized as follows:

*   **`/` (Root)**: Contains main public-facing pages (Home, User Account, Advisor Listing, Registration, etc.).
*   **`admin/`**: Contains the administration panel for managing the site.
*   **`advisor/`**: Contains the advisor dashboard and profile management pages.
*   **`config/`**: Contains configuration files (Database connection, Mail functions, Certificate generation).
*   **`assets/`**: Contains static assets like CSS, JavaScript, and Images.

## Prerequisites

*   **Web Server**: Apache (XAMPP/WAMP/MAMP recommended).
*   **PHP**: Version 7.4 or higher.
*   **Database**: MySQL or MariaDB.
*   **Composer** (Optional, if external dependencies are added later).

## Installation

1.  **Clone the Repository**:
    ```bash
    git clone <repository_url>
    ```

2.  **Move to Web Root**:
    Move the project folder to your web server's document root (e.g., `htdocs` in XAMPP or `/var/www/html` in Apache).

3.  **Database Setup**:
    *   Create a new MySQL database named `AdvisorZarooriHai`.
    *   Import the database schema (SQL file not provided in repo, but structure implies tables: `users`, `advisors`, `admins`, `bookings`, `pages`, `solutions`, `feedbacks`, `feedback_forms`, `elearning`).

4.  **Configuration**:
    *   Open `config/db.php` and verify the database credentials:
        ```php
        $conn = mysqli_connect('localhost', 'root', '', 'AdvisorZarooriHai');
        ```
    *   Ensure the `advisor/images/` directory is writable for profile picture uploads.
    *   Ensure paths in `config/certificate.php` point to the correct font and image resources on your system.

## Configuration

*   **Database**: `config/db.php` handles the database connection.
*   **Mail**: `config/mail.php` contains functions for sending emails. Ensure your server is configured to send emails or configure an SMTP server if necessary.
*   **Certificates**: `config/certificate.php` handles the generation of E-Certificates.

## Usage

1.  **Start Services**: Start Apache and MySQL via your control panel (e.g., XAMPP Control Panel).
2.  **Access the Application**: Open your browser and navigate to `http://localhost/AdvisorZarooriHai/` (adjust path based on your installation).
3.  **Admin Access**: Navigate to `http://localhost/AdvisorZarooriHai/admin/login.php` to access the admin panel.

## Documentation

The codebase is fully documented with PHPDoc comments.
*   **Core Logic**: See `config/` for utility functions.
*   **Public Interfaces**: See root PHP files.
*   **Dashboards**: See `admin/` and `advisor/` directories.
